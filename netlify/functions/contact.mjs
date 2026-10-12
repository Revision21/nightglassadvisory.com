// Netlify Function: Contact form proxy with bot protection (ported from echocyber.io 2026-10-12)
// Hides the GHL webhook URL server-side, adds honeypot + heuristics + rate limiting.
// Needs env var GHL_WEBHOOK_URL on the Netlify site (Site configuration > Environment variables).

const GHL_WEBHOOK_URL = process.env.GHL_WEBHOOK_URL;

if (!GHL_WEBHOOK_URL) {
  console.error('[contact] GHL_WEBHOOK_URL env var not set');
}

// In-memory rate limiting (resets on cold start — fine for this traffic level)
const submissions = new Map();
const RATE_LIMIT = 3;
const RATE_WINDOW_MS = 10 * 60 * 1000; // 10 minutes

function isRateLimited(ip) {
  const now = Date.now();
  const record = submissions.get(ip);
  if (!record) {
    submissions.set(ip, { count: 1, firstAt: now });
    return false;
  }
  if (now - record.firstAt > RATE_WINDOW_MS) {
    submissions.set(ip, { count: 1, firstAt: now });
    return false;
  }
  record.count++;
  return record.count > RATE_LIMIT;
}

function looksLikeBot(data) {
  const signals = [];

  // Honeypot filled
  if (data.website && data.website.trim() !== '') {
    signals.push('honeypot');
  }

  // Name too short or too long
  const fullName = `${data.first_name || ''} ${data.last_name || ''}`.trim();
  if (fullName.length < 3) signals.push('name-too-short');
  if (fullName.length > 100) signals.push('name-too-long');

  // Message too short
  if (!data.message || data.message.trim().length < 10) {
    signals.push('message-too-short');
  }

  // Message has suspicious patterns (URLs, markdown links, HTML tags)
  if (data.message) {
    const urlCount = (data.message.match(/https?:\/\//g) || []).length;
    if (urlCount > 2) signals.push('too-many-urls');
    if (/<[^>]+>/.test(data.message)) signals.push('html-in-message');
    if (/\[url[=\]]/i.test(data.message)) signals.push('bbcode-in-message');
  }

  // Email looks fake — disposable/temp patterns
  const email = (data.email || '').toLowerCase();
  const disposable = ['mailinator', 'guerrillamail', 'tempmail', 'throwaway', 'yopmail', 'sharklasers', 'grr.la', 'guerrillamailblock'];
  if (disposable.some(d => email.includes(d))) {
    signals.push('disposable-email');
  }

  // Gmail dot-trick detection (e.g., f.i.r.s.t.l.a.s.t@gmail.com)
  if (email.endsWith('@gmail.com')) {
    const local = email.split('@')[0];
    const dotCount = (local.match(/\./g) || []).length;
    if (dotCount >= 4) signals.push('gmail-dot-trick');
  }

  // Submission timing — if time field present and filled too fast (< 3 seconds)
  if (data._form_loaded && data._form_submitted) {
    const elapsed = parseInt(data._form_submitted) - parseInt(data._form_loaded);
    if (elapsed < 3000) signals.push('too-fast');
  }

  return signals;
}

export default async (req, context) => {
  // Only POST
  if (req.method !== 'POST') {
    return new Response(JSON.stringify({ error: 'Method not allowed' }), {
      status: 405,
      headers: { 'Content-Type': 'application/json' },
    });
  }

  // CORS headers
  const ALLOWED_ORIGINS = ['https://nightglassadvisory.com', 'https://www.nightglassadvisory.com', 'https://nightglassadvisory.netlify.app'];
  const origin = req.headers.get('origin') || '';
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Allow-Origin': ALLOWED_ORIGINS.includes(origin) ? origin : ALLOWED_ORIGINS[0],
    'Access-Control-Allow-Methods': 'POST',
    'Access-Control-Allow-Headers': 'Content-Type',
  };

  let data;
  try {
    data = await req.json();
  } catch {
    return new Response(JSON.stringify({ error: 'Invalid JSON' }), { status: 400, headers });
  }

  // Rate limiting
  const ip = context.ip || req.headers.get('x-forwarded-for') || 'unknown';
  if (isRateLimited(ip)) {
    console.log(`[contact] Rate limited: ${ip}`);
    // Silent success — don't tip off bots
    return new Response(JSON.stringify({ ok: true }), { status: 200, headers });
  }

  // Bot detection
  const botSignals = looksLikeBot(data);
  if (botSignals.length > 0) {
    console.log(`[contact] Bot blocked (${botSignals.join(', ')}): ${data.email || 'no-email'} from ${ip}`);
    // Silent success
    return new Response(JSON.stringify({ ok: true }), { status: 200, headers });
  }

  // Basic email validation
  if (!data.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
    return new Response(JSON.stringify({ error: 'Valid email required' }), { status: 400, headers });
  }

  // Required fields
  if (!data.first_name?.trim() || !data.last_name?.trim() || !data.message?.trim()) {
    return new Response(JSON.stringify({ error: 'Required fields missing' }), { status: 400, headers });
  }

  // Fail if webhook URL not configured
  if (!GHL_WEBHOOK_URL) {
    console.error('[contact] GHL_WEBHOOK_URL not configured — cannot forward submission');
    return new Response(JSON.stringify({ error: 'Server configuration error' }), { status: 500, headers });
  }

  // Forward clean submission to GHL
  try {
    const ghlPayload = {
      first_name: data.first_name.trim(),
      last_name: data.last_name.trim(),
      email: data.email.trim().toLowerCase(),
      company_name: (data.company_name || '').trim(),
      phone: (data.phone || '').trim(),
      message: data.message.trim(),
      source: 'nightglassadvisory.com',
    };

    const ghlResponse = await fetch(GHL_WEBHOOK_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(ghlPayload),
    });

    if (ghlResponse.ok) {
      console.log(`[contact] Forwarded: ${data.email} from ${ip}`);
      return new Response(JSON.stringify({ ok: true }), { status: 200, headers });
    } else {
      console.error(`[contact] GHL error: ${ghlResponse.status}`);
      return new Response(JSON.stringify({ error: 'Submission failed' }), { status: 502, headers });
    }
  } catch (err) {
    console.error(`[contact] GHL fetch error: ${err.message}`);
    return new Response(JSON.stringify({ error: 'Submission failed' }), { status: 502, headers });
  }
};

// Handle CORS preflight
export const config = {
  method: ['POST', 'OPTIONS'],
};
