---
title: Book a 30-minute call
description: Book a free 30-minute call with Mike Faas about the technology or security question in front of you. If it's not the right fit, he'll point you to who is.
---
@extends('_layouts.studio')

@section('body')
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="st-fade max-w-3xl">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">Book a call</span>
            <h1 class="st-display text-5xl font-medium tracking-tight text-balance text-st-ink sm:text-6xl">Bring the question. We&rsquo;ll find the answer.</h1>
            <p class="mt-6 text-xl text-st-text">Thirty minutes, free, on Google Meet. Bring the question: the contract, the app, the questionnaire or the renewal form. If it&rsquo;s not the right fit, I&rsquo;ll point you to who is.</p>
        </div>
    </div>

    {{-- GHL "Strategy Session" calendar (same one echocyber.io/schedule uses). --}}
    <section class="mt-16 border-y border-st-indigo/10 bg-st-indigo-tint py-16 sm:mt-20 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="st-fade overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-st-ink/10">
                <iframe src="https://apicrm.ctox.com/widget/booking/KjGTZUQdoqLZpU5NtmNL"
                    style="width: 100%; min-height: 800px; border: none; overflow: hidden;" scrolling="no"
                    id="ng-schedule-calendar" title="Book a 30-minute call with Mike Faas"></iframe>
            </div>
            <p class="mt-8 text-center text-sm text-st-text">
                None of these times work? Email <a href="mailto:{{ $page->email }}" class="font-semibold text-st-gold-ink hover:text-st-ink">{{ $page->email }}</a> and we&rsquo;ll find one.
            </p>
            <script src="https://apicrm.ctox.com/js/form_embed.js" type="text/javascript"></script>
        </div>
    </section>
@stop
