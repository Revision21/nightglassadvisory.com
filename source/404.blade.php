---
title: Page not found
permalink: 404.html
noindex: true
---
@extends('_layouts.studio')

{{-- Tailwind Plus: Marketing / Feedback / 404 Pages / With popular pages, in the Studio style. Netlify serves /404.html for any miss. --}}
@php
    $links = [
        ['icon' => 'question-mark-circle', 'title' => 'When founders call', 'body' => 'The questions that usually start the conversation.', 'href' => '/#why'],
        ['icon' => 'chart-bar', 'title' => 'Results', 'body' => 'Anonymized engagements and what changed.', 'href' => '/#track-record'],
        ['icon' => 'briefcase', 'title' => 'How it works', 'body' => 'The Intensive: three weeks, fixed price, a clear answer.', 'href' => '/#how-it-works'],
        ['icon' => 'calendar-days', 'title' => 'Book a call', 'body' => 'Thirty minutes, free, on Google Meet.', 'href' => '/schedule'],
    ];
@endphp

@section('body')
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="max-w-2xl">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">404</span>
            <h1 class="st-display text-5xl font-medium tracking-tight text-balance text-st-ink sm:text-6xl">Even a night glass can&rsquo;t find this page.</h1>
            <p class="mt-6 text-xl text-st-text">The link may be old or mistyped. Here&rsquo;s where most people are headed.</p>
        </div>

        <ul role="list" class="mt-12 max-w-2xl divide-y divide-st-ink/10 border-y border-st-ink/10">
            @foreach ($links as $l)
                <li class="group relative flex items-center gap-x-6 py-5">
                    <span class="flex h-11 w-11 flex-none items-center justify-center rounded-xl bg-st-indigo shadow-sm">
                        @include('_partials.icon', ['name' => $l['icon'], 'class' => 'h-5 w-5 text-st-gold'])
                    </span>
                    <div class="flex-auto">
                        <h3 class="text-base font-semibold text-st-ink"><a href="{{ $l['href'] }}"><span class="absolute inset-0" aria-hidden="true"></span>{{ $l['title'] }}</a></h3>
                        <p class="mt-1 text-sm text-st-text">{{ $l['body'] }}</p>
                    </div>
                    <span aria-hidden="true" class="flex-none text-st-gold-ink transition group-hover:translate-x-1">&rarr;</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-10">
            <a href="/" class="inline-flex rounded-full bg-st-ink px-4 py-1.5 text-sm font-semibold text-st-page transition hover:bg-st-panel-2"><span class="relative top-px">Back to the home page</span></a>
        </div>
    </div>
@stop
