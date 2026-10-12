---
title: Book a 30-minute call
description: Book a free 30-minute call with Mike Faas about the security question in front of you. If the diagnostic isn't the right fit, you'll hear that on the call.
---
@extends('_layouts.main')

@section('body')
    <header class="bg-night-950">
        <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
            <a href="/" class="-m-1.5 p-1.5">@include('_partials.wordmark')</a>
            <a href="/" class="text-sm/6 font-semibold text-white hover:text-star-300"><span aria-hidden="true">&larr;</span> Back to the site</a>
        </nav>
    </header>

    <main class="relative isolate overflow-hidden bg-night-950">
        @include('_partials.starfield')
        <section class="mx-auto max-w-3xl px-6 pt-10 pb-6 text-center lg:px-8">
            <p class="text-base/7 font-semibold text-star-400">Book a call</p>
            <h1 class="mt-2 font-display text-4xl font-semibold tracking-tight text-balance text-white sm:text-6xl">Bring the question. We&rsquo;ll find the answer.</h1>
            <p class="mx-auto mt-6 max-w-xl text-lg/8 text-pretty text-night-300">Thirty minutes, free, on Google Meet. Bring the questionnaire, the SOC 2 ask or the renewal form. If the diagnostic isn&rsquo;t the right fit, you&rsquo;ll hear that on the call.</p>
        </section>

        {{-- GHL "Strategy Session" calendar (same one echocyber.io/schedule uses). --}}
        <section class="pb-16 lg:pb-24">
            <div class="mx-auto max-w-5xl px-4">
                <iframe src="https://apicrm.ctox.com/widget/booking/KjGTZUQdoqLZpU5NtmNL"
                    style="width: 100%; min-height: 800px; border: none; overflow: hidden;" scrolling="no"
                    id="ng-schedule-calendar" title="Book a 30-minute call with Mike Faas" class="rounded-2xl bg-white"></iframe>
                <p class="mt-8 text-center text-sm text-night-400">
                    None of these times work? Email <a href="mailto:{{ $page->email }}" class="font-semibold text-star-400 hover:text-star-300">{{ $page->email }}</a> and we&rsquo;ll find one.
                </p>
                <script src="https://apicrm.ctox.com/js/form_embed.js" type="text/javascript"></script>
            </div>
        </section>
    </main>

    @include('_partials.footer')
@stop
