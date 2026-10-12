---
title: Book a 30-minute call
description: Book a free 30-minute call with Mike Faas about the technology or security question in front of you. If it's not the right fit, he'll point you to who is.
---
@extends('_layouts.spotlight')

@section('body')
    <div class="sm:px-8"><div class="mx-auto w-full max-w-7xl lg:px-8"><div class="relative px-4 sm:px-8 lg:px-12"><div class="mx-auto max-w-2xl lg:max-w-5xl">
        <header class="mt-16 max-w-2xl sm:mt-24">
            <h1 class="font-display text-4xl font-bold tracking-tight text-sp-ink sm:text-5xl">Bring the question. We&rsquo;ll find the answer.</h1>
            <p class="mt-6 text-base text-sp-text">Thirty minutes, free, on Google Meet. Bring the question: the contract, the app, the questionnaire or the renewal form. If it&rsquo;s not the right fit, I&rsquo;ll point you to who is.</p>
        </header>

        {{-- GHL "Strategy Session" calendar (same one echocyber.io/schedule uses). --}}
        <div class="mt-12 overflow-hidden rounded-2xl ring-1 ring-sp-line">
            <iframe src="https://apicrm.ctox.com/widget/booking/KjGTZUQdoqLZpU5NtmNL"
                style="width: 100%; min-height: 800px; border: none; overflow: hidden;" scrolling="no"
                id="ng-schedule-calendar" title="Book a 30-minute call with Mike Faas" class="bg-white"></iframe>
        </div>
        <p class="mt-8 text-sm text-sp-muted">
            None of these times work? Email <a href="mailto:{{ $page->email }}" class="font-medium text-sp-accent">{{ $page->email }}</a> and we&rsquo;ll find one.
        </p>
        <script src="https://apicrm.ctox.com/js/form_embed.js" type="text/javascript"></script>
    </div></div></div></div>
@stop
