// Netlify Function: Newsletter subscription (ported from echocyber.io 2026-10-12)
// Env on the Netlify site: BEEHIIV_API_KEY (required), TURNSTILE_SECRET_KEY (optional; when set,
// a Turnstile token is required), BEEHIIV_PUB_ID (optional; defaults to Signal vs. Noise).
// Accepts { email, source?, hp?, ts?, turnstileToken? }, runs anti-spam checks,
// subscribes to Beehiiv on success.

const BEEHIIV_API_KEY = process.env.BEEHIIV_API_KEY;
const BEEHIIV_PUB_ID = process.env.BEEHIIV_PUB_ID || 'pub_4aa9e626-adfb-44d3-991a-ba8cbdd146fa';
const TURNSTILE_SECRET = process.env.TURNSTILE_SECRET_KEY;

const MIN_FILL_TIME_MS = 2000;

// Canonical-email dedupe within a sliding window. In-memory per Lambda instance —
// not bulletproof on serverless cold starts, but combined with Turnstile + honeypot
// is sufficient to defeat the dot-trick burst pattern we're seeing.
const recentCanonicals = new Map();
const CANON_WINDOW_MS = 60 * 60 * 1000;

// Per-IP throttle as defense in depth.
const ipSubmissions = new Map();
const IP_LIMIT = 5;
const IP_WINDOW_MS = 30 * 60 * 1000;

function canonicalizeEmail(email) {
  const lower = email.toLowerCase();
  const at = lower.indexOf('@');
  if (at < 1) return lower;
  let local = lower.slice(0, at);
  let domain = lower.slice(at + 1);
  if (domain === 'googlemail.com') domain = 'gmail.com';
  local = local.split('+')[0];
  if (domain === 'gmail.com') local = local.replace(/\./g, '');
  return `${local}@${domain}`;
}

function isIpThrottled(ip) {
  const now = Date.now();
  const record = ipSubmissions.get(ip);
  if (!record || now - record.firstAt > IP_WINDOW_MS) {
    ipSubmissions.set(ip, { count: 1, firstAt: now });
    return false;
  }
  record.count++;
  return record.count > IP_LIMIT;
}

function sweepCanonicals() {
  const now = Date.now();
  for (const [k, v] of recentCanonicals) {
    if (now - v > CANON_WINDOW_MS) recentCanonicals.delete(k);
  }
}

async function verifyTurnstile(token, ip) {
  if (!TURNSTILE_SECRET) return { ok: true, skipped: true };
  if (!token) return { ok: false, reason: 'missing-token' };
  try {
    const res = await fetch('https://challenges.cloudflare.com/turnstile/v0/siteverify', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ secret: TURNSTILE_SECRET, response: token, remoteip: ip }),
    });
    const data = await res.json();
    return { ok: !!data.success, reason: (data['error-codes'] || []).join(',') };
  } catch (err) {
    return { ok: false, reason: `fetch-error: ${err.message}` };
  }
}

export default async (req, context) => {
  const ALLOWED_ORIGINS = ['https://nightglassadvisory.com', 'https://www.nightglassadvisory.com', 'https://nightglassadvisory.netlify.app'];
  const origin = req.headers.get('origin') || '';
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Allow-Origin': ALLOWED_ORIGINS.includes(origin) ? origin : ALLOWED_ORIGINS[0],
    'Access-Control-Allow-Methods': 'POST, OPTIONS',
    'Access-Control-Allow-Headers': 'Content-Type',
  };

  if (req.method === 'OPTIONS') return new Response(null, { status: 204, headers });
  if (req.method !== 'POST') {
    return new Response(JSON.stringify({ error: 'Method not allowed' }), { status: 405, headers });
  }

  const ip = context.ip || req.headers.get('x-forwarded-for') || 'unknown';

  let data;
  try { data = await req.json(); }
  catch { return new Response(JSON.stringify({ error: 'Invalid JSON' }), { status: 400, headers }); }

  const { email, source, hp, ts, turnstileToken } = data;

  // Honeypot — bots fill, humans never see. Pretend success so bots don't learn.
  if (hp) {
    console.warn(`[subscribe] honeypot tripped (ip=${ip})`);
    return new Response(JSON.stringify({ ok: true }), { status: 200, headers });
  }

  // Min-form-fill time — humans take >2s to type an email; instant POSTs are scripts.
  if (typeof ts === 'number') {
    const elapsed = Date.now() - ts;
    if (elapsed < MIN_FILL_TIME_MS) {
      console.warn(`[subscribe] too-fast submission (${elapsed}ms, ip=${ip})`);
      return new Response(JSON.stringify({ ok: true }), { status: 200, headers });
    }
  }

  if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    return new Response(JSON.stringify({ error: 'Valid email required' }), { status: 400, headers });
  }

  if (isIpThrottled(ip)) {
    return new Response(JSON.stringify({ error: 'Too many submissions' }), { status: 429, headers });
  }

  const turnstile = await verifyTurnstile(turnstileToken, ip);
  if (!turnstile.ok) {
    console.warn(`[subscribe] turnstile failed (ip=${ip}, reason=${turnstile.reason})`);
    return new Response(JSON.stringify({ error: 'Verification failed. Please try again.' }), { status: 403, headers });
  }

  // Canonical-email dedupe — defeats Gmail dot-trick + plus-tag list-bombing.
  sweepCanonicals();
  const canonical = canonicalizeEmail(email);
  if (recentCanonicals.has(canonical)) {
    console.warn(`[subscribe] duplicate canonical (canonical=${canonical}, raw=${email}, ip=${ip})`);
    return new Response(JSON.stringify({ ok: true }), { status: 200, headers });
  }
  recentCanonicals.set(canonical, Date.now());

  if (!BEEHIIV_API_KEY) {
    console.error('[subscribe] BEEHIIV_API_KEY not configured');
    return new Response(JSON.stringify({ error: 'Newsletter unavailable' }), { status: 503, headers });
  }

  try {
    const res = await fetch(
      `https://api.beehiiv.com/v2/publications/${BEEHIIV_PUB_ID}/subscriptions`,
      {
        method: 'POST',
        headers: {
          'Authorization': `Bearer ${BEEHIIV_API_KEY}`,
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          email,
          reactivate_existing: true,
          send_welcome_email: true,
          utm_source: source || 'nightglassadvisory.com',
          utm_medium: 'website',
        }),
      }
    );

    if (!res.ok) {
      const text = await res.text();
      console.error(`[subscribe] Beehiiv error: ${res.status} ${text}`);
      return new Response(JSON.stringify({ error: 'Subscription failed' }), { status: 502, headers });
    }

    const turnstileNote = turnstile.skipped ? ' [turnstile-skipped]' : '';
    console.log(`[subscribe] ${email} subscribed (canonical=${canonical}, source=${source || 'nightglassadvisory.com'})${turnstileNote}`);
    return new Response(JSON.stringify({ ok: true }), { status: 200, headers });
  } catch (err) {
    console.error(`[subscribe] fetch error: ${err.message}`);
    return new Response(JSON.stringify({ error: 'Subscription failed' }), { status: 502, headers });
  }
};

export const config = { method: ['POST', 'OPTIONS'] };
