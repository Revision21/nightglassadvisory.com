---
title: Contact
description: Send Mike Faas a note about the technology or security question in front of you. Prefer to talk? Book 30 minutes.
---
@extends('_layouts.studio')

{{--
    Studio's contact page pattern. Posts JSON to /.netlify/functions/contact,
    which screens bots (honeypot, timing, heuristics, rate limit) and forwards
    to the GHL inbound webhook (env GHL_WEBHOOK_URL). Field names match the
    function and the echocyber.io form, so the GHL workflow sees the same shape.
--}}
@php
    $label = 'block text-sm font-semibold text-st-ink';
    $input = 'mt-2 block w-full rounded-xl bg-white px-4 py-3 text-base text-st-ink ring-1 ring-st-ink/15 outline-none placeholder:text-st-muted focus:ring-2 focus:ring-st-gold';
@endphp

@section('body')
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="st-fade max-w-3xl">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">Contact</span>
            <h1 class="st-display text-5xl font-medium tracking-tight text-balance text-st-ink sm:text-6xl">Tell me what&rsquo;s going on.</h1>
            <p class="mt-6 text-xl text-st-text">A few sentences is plenty: the question, the deadline, and what&rsquo;s riding on it. I read every message myself.</p>
        </div>
    </div>

    <div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 lg:px-8">
        <div class="grid grid-cols-1 gap-x-8 gap-y-24 lg:grid-cols-2">

            {{-- Form --}}
            <div class="st-fade lg:order-last">
                <form id="contact-form" class="rounded-3xl bg-st-wash p-6 ring-1 ring-st-ink/10 sm:p-10" novalidate>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="first_name" class="{{ $label }}">First name</label>
                            <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="{{ $input }}">
                        </div>
                        <div>
                            <label for="last_name" class="{{ $label }}">Last name</label>
                            <input id="last_name" name="last_name" type="text" autocomplete="family-name" required class="{{ $input }}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="{{ $label }}">Work email</label>
                            <input id="email" name="email" type="email" autocomplete="email" required class="{{ $input }}">
                        </div>
                        <div>
                            <label for="company_name" class="{{ $label }}">Company</label>
                            <input id="company_name" name="company_name" type="text" autocomplete="organization" class="{{ $input }}">
                        </div>
                        <div>
                            <label for="phone" class="{{ $label }}">Phone <span class="font-normal text-st-muted">(optional)</span></label>
                            <input id="phone" name="phone" type="tel" autocomplete="tel" class="{{ $input }}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="{{ $label }}">What&rsquo;s going on?</label>
                            <textarea id="message" name="message" rows="5" required minlength="10" class="{{ $input }}" placeholder="A customer sent us a security questionnaire and the deal is waiting on it..."></textarea>
                        </div>
                        {{-- Honeypot: hidden from people, irresistible to bots. --}}
                        <div class="absolute -left-[9999px]" aria-hidden="true">
                            <label for="website">Website</label>
                            <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
                        </div>
                    </div>
                    <p id="contact-error" class="mt-6 hidden rounded-xl bg-white px-4 py-3 text-sm text-st-ink ring-1 ring-st-gold" role="alert"></p>
                    <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4">
                        <button type="submit" id="contact-submit" class="inline-flex rounded-full bg-st-ink px-5 py-2 text-sm font-semibold text-st-page transition hover:bg-st-panel-2 disabled:opacity-60"><span class="relative top-px">Send message</span></button>
                        <p class="text-sm text-st-text">Prefer to talk? <a href="{{ $page->bookingUrl }}" class="font-semibold text-st-gold-ink hover:text-st-ink">Book 30 minutes &rarr;</a></p>
                    </div>
                </form>

                <div id="contact-thanks" class="hidden rounded-3xl bg-st-indigo-tint p-6 ring-1 ring-st-indigo/10 sm:p-10" role="status">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-st-indigo">
                        @include('_partials.icon', ['name' => 'check', 'set' => '20/solid', 'class' => 'h-6 w-6 text-st-gold'])
                    </span>
                    <h2 class="st-display mt-6 text-3xl font-medium text-st-ink">Got it. Thank you.</h2>
                    <p class="mt-4 text-base text-st-text">I&rsquo;ll read it and reply from <a href="mailto:{{ $page->email }}" class="font-semibold text-st-ink">{{ $page->email }}</a>. If it&rsquo;s time-sensitive, grab a slot on the <a href="{{ $page->bookingUrl }}" class="font-semibold text-st-gold-ink">calendar</a>.</p>
                </div>
            </div>

            {{-- Other ways to reach me --}}
            <div class="st-fade">
                <h2 class="st-display text-base font-semibold text-st-ink">Other ways to reach me</h2>
                <dl class="mt-6 space-y-8 text-base text-st-text">
                    @foreach ([
                        ['calendar-days', 'Book a call', 'Thirty minutes, free, on Google Meet.', $page->bookingUrl, 'Pick a time'],
                        ['envelope', 'Email', 'Straight to my inbox.', 'mailto:' . $page->email, $page->email],
                        ['user', 'LinkedIn', 'Connect, or send a message there.', $page->linkedin, 'linkedin.com/in/mfaas'],
                    ] as [$icon, $k, $sub, $href, $cta])
                        <div class="st-border flex gap-x-5 pt-8 first:before:hidden first:after:hidden first:pt-0">
                            <span class="flex h-11 w-11 flex-none items-center justify-center rounded-xl bg-st-indigo shadow-sm">
                                @include('_partials.icon', ['name' => $icon, 'class' => 'h-5 w-5 text-st-gold'])
                            </span>
                            <div>
                                <dt class="font-semibold text-st-ink">{{ $k }}</dt>
                                <dd class="mt-1">{{ $sub }}</dd>
                                <dd class="mt-2"><a href="{{ $href }}" class="font-semibold text-st-gold-ink hover:text-st-ink">{{ $cta }} <span aria-hidden="true">&rarr;</span></a></dd>
                            </div>
                        </div>
                    @endforeach
                </dl>
                <p class="mt-10 text-sm text-st-muted">Based in Raleigh, North Carolina.</p>
            </div>
        </div>
    </div>

    <script>
        (function () {
            var form = document.getElementById('contact-form');
            var err = document.getElementById('contact-error');
            var btn = document.getElementById('contact-submit');
            var loaded = Date.now();
            function showError(msg) { err.textContent = msg; err.classList.remove('hidden'); }
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                err.classList.add('hidden');
                if (!form.checkValidity()) { form.reportValidity(); return; }
                var data = Object.fromEntries(new FormData(form).entries());
                data._form_loaded = String(loaded);
                data._form_submitted = String(Date.now());
                btn.disabled = true; btn.firstElementChild.textContent = 'Sending...';
                fetch('/.netlify/functions/contact', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
                    .then(function (r) { return r.json().then(function (j) { return { ok: r.ok, j: j }; }); })
                    .then(function (res) {
                        if (res.ok && res.j.ok) {
                            form.classList.add('hidden');
                            document.getElementById('contact-thanks').classList.remove('hidden');
                        } else {
                            showError('That didn’t go through. Email me directly at {{ $page->email }} and I’ll take it from there.');
                        }
                    })
                    .catch(function () { showError('That didn’t go through. Email me directly at {{ $page->email }} and I’ll take it from there.'); })
                    .finally(function () { btn.disabled = false; btn.firstElementChild.textContent = 'Send message'; });
            });
        })();
    </script>
@stop
