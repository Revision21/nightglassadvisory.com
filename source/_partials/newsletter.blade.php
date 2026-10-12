{{--
    Newsletter signup (Tailwind Plus: Newsletter Sections / Simple side-by-side, Studio style).
    Posts to /.netlify/functions/subscribe -> Beehiiv (Signal vs. Noise). Turnstile renders only
    when config 'turnstileSiteKey' is set (the widget must list this site's hostnames in Cloudflare).
--}}
<section id="newsletter" class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
    <div class="st-fade st-border grid grid-cols-1 gap-10 pt-12 lg:grid-cols-12 lg:gap-8">
        <div class="lg:col-span-6">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">Signal vs. Noise</span>
            <h2 class="st-display text-3xl font-medium tracking-tight text-balance text-st-ink sm:text-4xl">Not ready to talk? Read along.</h2>
            <p class="mt-4 text-lg text-st-text">One short email every Sunday: the security and technology news worth your attention, and the one question to ask your team about it. No fluff, no vendor hype, no fear-mongering.</p>
        </div>
        <div class="lg:col-span-5 lg:col-start-8 lg:self-end">
            <form id="nl-form" class="flex flex-col gap-3 sm:flex-row" novalidate>
                <label for="nl-email" class="sr-only">Email address</label>
                <input id="nl-email" name="email" type="email" autocomplete="email" required placeholder="you@company.com"
                       class="min-w-0 flex-auto rounded-full bg-white px-5 py-2.5 text-base text-st-ink ring-1 ring-st-ink/15 outline-none placeholder:text-st-muted focus:ring-2 focus:ring-st-gold">
                <button type="submit" id="nl-submit" class="inline-flex flex-none items-center justify-center rounded-full bg-st-ink px-5 py-2.5 text-sm font-semibold text-st-page transition hover:bg-st-panel-2 disabled:opacity-60"><span class="relative top-px">Subscribe</span></button>
                <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-5000px;width:1px;height:1px;opacity:0">
            </form>
            @if ($page->turnstileSiteKey)
                <div class="mt-3"><div class="cf-turnstile" data-sitekey="{{ $page->turnstileSiteKey }}" data-callback="ngTurnstileOk" data-error-callback="ngTurnstileReset" data-expired-callback="ngTurnstileReset" data-theme="light" data-size="flexible"></div></div>
                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
            @endif
            <div id="nl-thanks" class="hidden rounded-2xl bg-st-indigo-tint px-5 py-4 ring-1 ring-st-indigo/10" role="status">
                <p class="font-semibold text-st-ink">You&rsquo;re in.</p>
                <p class="mt-1 text-sm text-st-text">Check your inbox to confirm.</p>
            </div>
            <p id="nl-error" class="mt-3 hidden text-sm text-st-ink" role="alert"></p>
            <p class="mt-4 text-sm text-st-text">Weekly. Unsubscribe anytime. <a href="https://signal.echocyber.io" target="_blank" rel="noopener noreferrer" class="font-semibold text-st-gold-ink hover:text-st-ink">Browse past issues &rarr;</a></p>
        </div>
    </div>
</section>
<script>
    (function () {
        var form = document.getElementById('nl-form'), btn = document.getElementById('nl-submit');
        var err = document.getElementById('nl-error'), loaded = Date.now(), token = '';
        window.ngTurnstileOk = function (t) { token = t; };
        window.ngTurnstileReset = function () { token = ''; };
        form.addEventListener('submit', function (e) {
            e.preventDefault(); err.classList.add('hidden');
            var email = form.email.value.trim();
            if (!form.checkValidity()) { form.reportValidity(); return; }
            btn.disabled = true; btn.firstElementChild.textContent = 'Subscribing...';
            fetch('/.netlify/functions/subscribe', { method: 'POST', headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email: email, source: 'nightglassadvisory.com', hp: form.company_website.value, ts: loaded, turnstileToken: token }) })
                .then(function (r) { return r.json().then(function (j) { return { ok: r.ok, j: j }; }); })
                .then(function (res) {
                    if (res.ok && res.j.ok) { form.classList.add('hidden'); document.getElementById('nl-thanks').classList.remove('hidden'); var t = document.querySelector('.cf-turnstile'); if (t) t.classList.add('hidden'); }
                    else { err.textContent = (res.j && res.j.error) || 'That didn’t go through. Try again in a minute.'; err.classList.remove('hidden'); if (window.turnstile) window.turnstile.reset(); }
                })
                .catch(function () { err.textContent = 'That didn’t go through. Try again in a minute.'; err.classList.remove('hidden'); })
                .finally(function () { btn.disabled = false; btn.firstElementChild.textContent = 'Subscribe'; });
        });
    })();
</script>
