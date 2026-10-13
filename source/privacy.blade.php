---
title: Privacy
description: What Nightglass Advisory collects when you subscribe, book a call or email, who processes it, and how to have it removed. No ad tracking, and your data is never sold.
---
@extends('_layouts.studio')

{{--
    Privacy page (review #11b, drafted by Jane 2026-10-12; Mike to approve; attorney-hour item, not a launch blocker).
    Written to match what the site ACTUALLY does. When something changes, change this page in the same commit:
      - Turnstile turned on (BR #240): add the Cloudflare spam-protection line (marked below).
      - Analytics added: add the analytics line (marked below). Cloudflare Web Analytics = no cookies.
      - Legal entity: DBA/rename not filed yet (migration plan step 5). Then name "Revision21, LLC d/b/a Nightglass Advisory".
--}}
@php
    $h2 = 'st-display mt-16 text-2xl font-semibold tracking-tight text-st-ink first:mt-0';
    $p = 'mt-4 text-base text-st-text';
    $li = 'flex gap-x-3';
@endphp

@section('body')
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="max-w-3xl">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">Privacy</span>
            <h1 class="st-display text-5xl font-medium tracking-tight text-balance text-st-ink sm:text-6xl">Short version: very little, and never sold.</h1>
            <p class="mt-6 text-xl text-st-text">This site collects only what you give it: your email if you subscribe, and your details if you book a call. No ad tracking, no data brokers, no selling your information. Here&rsquo;s the longer version.</p>
            <p class="mt-4 text-sm text-st-muted">Last updated October 2026.</p>
        </div>

        <div class="st-border mt-16 max-w-3xl pt-12">
            <h2 class="{{ $h2 }}">What I collect, and why</h2>
            <ul role="list" class="mt-6 space-y-5 text-base text-st-text">
                <li class="{{ $li }}">
                    @include('_partials.icon', ['name' => 'envelope', 'class' => 'mt-0.5 h-6 w-6 flex-none text-st-gold-ink'])
                    <span><strong class="font-semibold text-st-ink">If you subscribe to Signal vs. Noise:</strong> your email address, and a note that you signed up here. It&rsquo;s used to send the newsletter and nothing else.</span>
                </li>
                <li class="{{ $li }}">
                    @include('_partials.icon', ['name' => 'calendar-days', 'class' => 'mt-0.5 h-6 w-6 flex-none text-st-gold-ink'])
                    <span><strong class="font-semibold text-st-ink">If you book a call:</strong> what you enter in the booking form, such as your name, email, company and the time you pick. It&rsquo;s used to hold the call, send the invite and reminders, and follow up about what we discussed.</span>
                </li>
                <li class="{{ $li }}">
                    @include('_partials.icon', ['name' => 'chat-bubble-left-right', 'class' => 'mt-0.5 h-6 w-6 flex-none text-st-gold-ink'])
                    <span><strong class="font-semibold text-st-ink">If you email me:</strong> your message and address, kept like any business correspondence.</span>
                </li>
                <li class="{{ $li }}">
                    @include('_partials.icon', ['name' => 'shield-check', 'class' => 'mt-0.5 h-6 w-6 flex-none text-st-gold-ink'])
                    <span><strong class="font-semibold text-st-ink">To keep out spam:</strong> when you submit the newsletter form, your IP address is checked against a short rate limit and then discarded. It&rsquo;s only written to a log when a submission looks automated.</span>
                </li>
            </ul>

            <h2 class="{{ $h2 }}">Who else handles it</h2>
            <p class="{{ $p }}">A few services do the work behind the site. Each gets only what it needs for its job:</p>
            <ul role="list" class="mt-4 list-disc space-y-2 pl-5 text-base text-st-text marker:text-st-gold">
                <li><strong class="font-semibold text-st-ink">Beehiiv</strong> sends the newsletter and keeps the subscriber list. Like most newsletters, it counts opens and link clicks so I can see whatsends the newsletter and keeps the subscriber list.</li>rsquo;s worth writing about.</li>
                <li><strong class="font-semibold text-st-ink">HighLevel</strong> runs the booking calendar and keeps booking and follow-up records. The calendar may set its own cookies when you use it.</li>
                <li><strong class="font-semibold text-st-ink">Google Workspace</strong> handles email and calendar invites.</li>
                <li><strong class="font-semibold text-st-ink">Netlify</strong> hosts the site and the newsletter form, and keeps standard server logs.</li>
                {{-- ADD when Turnstile is on (BR #240): <li><strong>Cloudflare</strong> checks that newsletter sign-ups come from a person, not a bot.</li> --}}
                {{-- ADD when analytics are on: <li><strong>Cloudflare Web Analytics</strong> counts visits without cookies and without tracking you across sites.</li> --}}
            </ul>

            <h2 class="{{ $h2 }}">What this site doesn&rsquo;t do</h2>
            <ul role="list" class="mt-4 list-disc space-y-2 pl-5 text-base text-st-text marker:text-st-gold">
                <li>No advertising or retargeting pixels.</li>
                <li>No selling or renting your information, ever.</li>
                <li>No cookies set by this site itself. The only ones come from the booking calendar, and only if you use it.</li>
            </ul>

            <h2 class="{{ $h2 }}">Getting out, or getting it back</h2>
            <p class="{{ $p }}">Every newsletter has an unsubscribe link at the bottom. To see what I hold about you, correct it or have it deleted, email <a href="mailto:{{ $page->email }}" class="font-semibold text-st-gold-ink hover:text-st-ink">{{ $page->email }}</a>. You&rsquo;ll get a reply from me, not a ticket number.</p>

            <h2 class="{{ $h2 }}">How long it&rsquo;s kept</h2>
            <p class="{{ $p }}">Newsletter addresses stay until you unsubscribe. Booking and correspondence records stay as long as they&rsquo;re useful for the work, or as long as the law and good bookkeeping require.</p>

            <h2 class="{{ $h2 }}">Changes</h2>
            <p class="{{ $p }}">If this changes, this page changes with it, and the date at the top moves.</p>
        </div>
    </div>
@stop
