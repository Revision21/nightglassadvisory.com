---
title:
---
@extends('_layouts.spotlight')

{{--
    Home, in the Tailwind Plus "Spotlight" layout (2026-10-12).
    The previous full-bleed layout (_layouts/main + _partials/home/*) is kept in
    git and still used by nothing; delete once Mike signs off on this one.
--}}
@php
    $open = '<div class="sm:px-8"><div class="mx-auto w-full max-w-7xl lg:px-8"><div class="relative px-4 sm:px-8 lg:px-12"><div class="mx-auto max-w-2xl lg:max-w-5xl">';
    $close = '</div></div></div></div>';
    $badge = fn ($r) => ['cto' => 'CTO', 'ciso' => 'CISO', 'both' => 'CTO + CISO'][$r];
    $btn = 'inline-flex items-center justify-center gap-2 rounded-md px-3 py-2 text-sm font-semibold outline-offset-2 transition active:transition-none';
    $box = 'rounded-2xl border border-sp-line p-6';
    $boxTitle = 'flex items-center text-sm font-semibold text-sp-ink';
@endphp

@section('body')

    {{-- Hero --}}
    {!! $open !!}
        <div class="mt-9 max-w-2xl">
            <img src="/assets/img/mike-faas-square.jpg" alt="Mike Faas" class="h-16 w-16 rounded-full bg-sp-raise object-cover ring-1 ring-sp-line">
            <h1 class="mt-8 font-display text-4xl font-bold tracking-tight text-sp-ink sm:text-5xl">Fractional CTO and CISO for <span class="whitespace-nowrap">founder-led</span> companies.</h1>
            <p class="mt-6 text-base text-sp-text">{{ $page->tagline }}</p>
            <div class="mt-6 flex flex-wrap items-center gap-6">
                <a href="{{ $page->bookingUrl }}" class="{{ $btn }} bg-sp-btn text-sp-btn-fg hover:opacity-90">Book a 30-minute call</a>
                <a href="{{ $page->linkedin }}" aria-label="LinkedIn" class="group -m-1 p-1">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-sp-muted transition group-hover:fill-sp-accent"><path d="M18.335 18.339H15.67v-4.177c0-.996-.02-2.278-1.39-2.278-1.389 0-1.601 1.084-1.601 2.205v4.25h-2.666V9.75h2.56v1.17h.035c.358-.674 1.228-1.387 2.528-1.387 2.7 0 3.2 1.778 3.2 4.091v4.715zM7.003 8.575a1.546 1.546 0 01-1.548-1.549 1.548 1.548 0 111.547 1.549zm1.336 9.764H5.666V9.75H8.34v8.589zM19.67 3H4.329C3.593 3 3 3.58 3 4.297v15.406C3 20.42 3.594 21 4.328 21h15.338C20.4 21 21 20.42 21 19.703V4.297C21 3.58 20.4 3 19.666 3h.003z"/></svg>
                </a>
                <a href="mailto:{{ $page->email }}" aria-label="Email" class="group -m-1 p-1 text-sp-muted transition hover:text-sp-accent">
                    @include('_partials.icon', ['name' => 'envelope'])
                </a>
            </div>
        </div>
    {!! $close !!}

    @include('_partials.sp.paperwork')

    {{-- Body: situations (left) and sidebar boxes (right) --}}
    <div class="mt-24 md:mt-28">{!! $open !!}
        <div class="mx-auto grid max-w-xl grid-cols-1 gap-y-20 lg:max-w-none lg:grid-cols-2">
            <div>
                <h2 class="text-sm font-semibold text-sp-ink">When founders call</h2>
                <p class="mt-2 text-sm text-sp-text">A question lands that nobody inside can answer, and it&rsquo;s attached to money. Half are technology. Half are security. Most are both.</p>
                <div class="mt-12 flex flex-col gap-14">
                    @foreach ($page->triggers as $t)
                        <article class="group relative flex flex-col items-start">
                            <h3 class="text-base font-semibold tracking-tight text-sp-ink">
                                <div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-sp-raise opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl"></div>
                                <a href="{{ $page->bookingUrl }}">
                                    <span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                                    <span class="relative z-10">{{ $t['title'] }}</span>
                                </a>
                            </h3>
                            <p class="relative z-10 order-first mb-3 flex items-center pl-3.5 text-sm text-sp-muted">
                                <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true"><span class="h-4 w-0.5 rounded-full bg-sp-gold"></span></span>
                                {{ $badge($t['role']) }}
                            </p>
                            <p class="relative z-10 mt-2 text-sm text-sp-text">{{ $t['body'] }}</p>
                            <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-sm font-medium text-sp-accent">
                                Talk it through
                                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current"><path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="space-y-10 lg:pl-16 xl:pl-24">
                {{-- Book a call (Spotlight's newsletter box) --}}
                <div class="{{ $box }}">
                    <h2 class="{{ $boxTitle }}">
                        @include('_partials.icon', ['name' => 'calendar-days', 'class' => 'h-6 w-6 flex-none text-sp-muted'])
                        <span class="ml-3">Start with 30 minutes</span>
                    </h2>
                    <p class="mt-2 text-sm text-sp-text">Free, on Google Meet. Bring the question: the contract, the app, the questionnaire or the renewal form. If it&rsquo;s not the right fit, I&rsquo;ll point you to who is.</p>
                    <a href="{{ $page->bookingUrl }}" class="{{ $btn }} mt-6 w-full bg-sp-btn text-sp-btn-fg hover:opacity-90">Book a call</a>
                </div>

                {{-- The Diagnostic (Spotlight's resume box) --}}
                <div class="{{ $box }}">
                    <h2 class="{{ $boxTitle }}">
                        @include('_partials.icon', ['name' => 'briefcase', 'class' => 'h-6 w-6 flex-none text-sp-muted'])
                        <span class="ml-3">{{ $page->diagnostic['name'] }}</span>
                    </h2>
                    <ol class="mt-6 space-y-4">
                        @foreach ($page->steps as $i => $s)
                            <li class="flex gap-4">
                                <div class="relative mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-full bg-sp-paper font-display text-sm font-semibold text-sp-accent shadow-md ring-1 shadow-black/5 ring-sp-line">{{ $i + 1 }}</div>
                                <dl class="flex flex-auto flex-wrap gap-x-2">
                                    <dt class="sr-only">Step</dt>
                                    <dd class="w-full flex-none text-sm font-medium text-sp-ink">{{ $s['title'] }}</dd>
                                    <dt class="sr-only">When</dt>
                                    <dd class="text-xs text-sp-muted">{{ $s['week'] }}</dd>
                                </dl>
                            </li>
                        @endforeach
                    </ol>
                    <p class="mt-6 flex items-baseline gap-x-2 border-t border-sp-line pt-5">
                        <span class="font-display text-2xl font-semibold tracking-tight text-sp-ink">{{ $page->diagnostic['priceLabel'] }}</span>
                        <span class="text-sm text-sp-muted">fixed, {{ $page->diagnostic['weeks'] }} weeks</span>
                    </p>
                    <a href="#diagnostic" class="{{ $btn }} group mt-5 w-full bg-sp-raise font-medium text-sp-ink hover:bg-sp-line">
                        How it works
                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="h-4 w-4 stroke-sp-muted"><path d="M4.75 8.75 8 12.25m0 0 3.25-3.5M8 12.25v-8.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </a>
                </div>

                {{-- Track record --}}
                <div class="{{ $box }}">
                    <h2 class="{{ $boxTitle }}">
                        @include('_partials.icon', ['name' => 'chart-bar', 'class' => 'h-6 w-6 flex-none text-sp-muted'])
                        <span class="ml-3">Track record</span>
                    </h2>
                    <dl class="mt-6 grid grid-cols-2 gap-x-4 gap-y-5">
                        @foreach ([['25 years', 'leading technology and security'], ['50 to 5,000', 'people at the companies I&rsquo;ve led in'], ['Up to 30', 'people on teams I&rsquo;ve built'], ['CISSP', 'certified security professional']] as [$v, $l])
                            <div>
                                <dd class="font-display text-xl font-semibold tracking-tight text-sp-ink">{{ $v }}</dd>
                                <dt class="mt-0.5 text-xs text-sp-muted">{!! $l !!}</dt>
                            </div>
                        @endforeach
                    </dl>
                    <ul class="mt-6 space-y-2 border-t border-sp-line pt-5 text-sm text-sp-text">
                        <li><span class="mr-2 text-xs font-semibold tracking-wider text-sp-accent uppercase">Speaking</span>Triangle InfoSeCon 2026</li>
                        <li><span class="mr-2 text-xs font-semibold tracking-wider text-sp-accent uppercase">Writing</span>Signal vs. Noise, weekly</li>
                    </ul>
                </div>
            </div>
        </div>
    {!! $close !!}</div>

    {{-- Long-form sections, Spotlight "Section" style (left rule, title column) --}}
    @php
        $secOpen = fn ($id, $title) => '<section id="' . $id . '" aria-labelledby="' . $id . '-t" class="scroll-mt-24 md:border-l md:border-sp-line md:pl-6"><div class="grid grid-cols-1 items-baseline gap-y-8 md:grid-cols-4"><h2 id="' . $id . '-t" class="text-sm font-semibold text-sp-ink">' . $title . '</h2><div class="md:col-span-3">';
        $secClose = '</div></div></section>';
    @endphp
    <div class="mt-24 md:mt-32">{!! $open !!}
        <div class="space-y-20">

            {!! $secOpen('why', 'How companies get stuck') !!}
                <p class="font-display text-2xl font-semibold tracking-tight text-sp-ink sm:text-3xl">Technology and security don&rsquo;t fail in silos. They fail in cascades.</p>
                <p class="mt-4 text-base text-sp-text">Most companies run technology and security as a list: the IT contract, the apps, the cloud bill, the questionnaire, the insurance form. Each has its own owner and its own vendor. But they depend on each other, and the insurance question is usually an IT question in disguise. Fix them one at a time and you buy three tools and hire three consultants. Find the missing piece first, and the rest gets easier.</p>
                <div class="mx-auto mt-10 max-w-md">@include('_partials.cascade-diagram')</div>
            {!! $secClose !!}

            {!! $secOpen('diagnostic', $page->diagnostic['name']) !!}
                <p class="font-display text-2xl font-semibold tracking-tight text-sp-ink sm:text-3xl">Three weeks. Fixed price. A clear answer.</p>
                <p class="mt-4 text-base text-sp-text">Start with the question that&rsquo;s keeping you up, technology or security. Leave with the answer, and a plan for everything it touches.</p>
                <ol class="mt-8 space-y-8">
                    @foreach ($page->steps as $s)
                        <li class="relative pl-6">
                            <span class="absolute inset-y-1 left-0 w-0.5 rounded-full bg-sp-gold"></span>
                            <p class="text-xs font-semibold tracking-wider text-sp-accent uppercase">{{ $s['week'] }}</p>
                            <p class="mt-1 text-base font-semibold text-sp-ink">{{ $s['title'] }}</p>
                            <p class="mt-1 text-sm text-sp-text">{{ $s['body'] }}</p>
                        </li>
                    @endforeach
                </ol>
                <div class="mt-10 rounded-2xl border border-sp-line p-6">
                    <h3 class="text-sm font-semibold text-sp-ink">What you walk away with</h3>
                    <ul class="mt-4 grid grid-cols-1 gap-3 text-sm text-sp-text sm:grid-cols-2">
                        @foreach ($page->included as $item)
                            <li class="flex gap-x-3">@include('_partials.icon', ['name' => 'check', 'set' => '20/solid', 'class' => 'h-5 w-5 flex-none text-sp-accent']){{ $item }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-6 flex flex-wrap items-center justify-between gap-4 border-t border-sp-line pt-5">
                        <p class="flex items-baseline gap-x-2"><span class="font-display text-2xl font-semibold text-sp-ink">{{ $page->diagnostic['priceLabel'] }}</span><span class="text-sm text-sp-muted">USD, fixed</span></p>
                        <a href="{{ $page->bookingUrl }}" class="{{ $btn }} bg-sp-btn text-sp-btn-fg hover:opacity-90">Start with a 30-minute call</a>
                    </div>
                </div>
            {!! $secClose !!}

            {!! $secOpen('about', 'About') !!}
                <p class="font-display text-2xl font-semibold tracking-tight text-sp-ink sm:text-3xl">I translate how systems behave into decisions a founder can make.</p>
                <p class="mt-4 text-base text-sp-text">I&rsquo;ve spent 25 years leading technology and security at companies from 50 people to 5,000: through acquisitions, building teams of up to 30, and finding six-figure savings along the way.</p>
                <dl class="mt-8 space-y-6">
                    @foreach ([
                        ['Both chairs.', 'Most companies get technology advice from one person and security advice from another, and then the two disagree. I sit in both, so the technology plan and the security plan are the same plan.'],
                        ['Wide field, low magnification.', 'I look across the whole company before I zoom in, because the problem is rarely where it first shows up.'],
                        ['No jargon in the readout.', 'If I can&rsquo;t explain it to your CFO in five minutes, I haven&rsquo;t finished the work.'],
                        ['CISSP, based in Raleigh.', 'Most of the work happens remotely. In the Triangle, I&rsquo;m glad to meet in person.'],
                    ] as [$k, $v])
                        <div><dt class="text-sm font-semibold text-sp-ink">{{ $k }}</dt><dd class="mt-1 text-sm text-sp-text">{!! $v !!}</dd></div>
                    @endforeach
                </dl>
                <a href="{{ $page->linkedin }}" class="mt-8 inline-flex items-center text-sm font-medium text-sp-accent">Find me on LinkedIn<svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current"><path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg></a>
            {!! $secClose !!}

            {!! $secOpen('faq', 'Questions founders ask') !!}
                <dl class="-mt-2 divide-y divide-sp-line">
                    @foreach ($page->faqs as $i => $f)
                        <div class="py-5 first:pt-0">
                            <dt>
                                <button type="button" command="--toggle" commandfor="faq-{{ $i }}" class="flex w-full items-start justify-between text-left text-sp-ink">
                                    <span class="text-base font-semibold">{{ $f['q'] }}</span>
                                    <span class="ml-6 flex h-7 items-center text-sp-accent">
                                        @include('_partials.icon', ['name' => 'plus-small', 'class' => 'size-6 in-aria-expanded:hidden'])
                                        @include('_partials.icon', ['name' => 'minus-small', 'class' => 'size-6 not-in-aria-expanded:hidden'])
                                    </span>
                                </button>
                            </dt>
                            <el-disclosure id="faq-{{ $i }}" hidden class="contents">
                                <dd class="mt-2 pr-12 text-sm text-sp-text">{{ $f['a'] }}</dd>
                            </el-disclosure>
                        </div>
                    @endforeach
                </dl>
            {!! $secClose !!}

        </div>
    {!! $close !!}</div>

    {{-- Closing call to action --}}
    <div class="mt-24">{!! $open !!}
        <div class="rounded-2xl border border-sp-line bg-sp-raise/60 px-6 py-12 text-center sm:px-12">
            <h2 class="font-display text-2xl font-semibold tracking-tight text-sp-ink sm:text-3xl">Got a question nobody inside can answer?</h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-sp-text">Thirty minutes is enough to tell whether the diagnostic fits. If it&rsquo;s not the right fit, I&rsquo;ll point you to who is.</p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-6">
                <a href="{{ $page->bookingUrl }}" class="{{ $btn }} bg-sp-btn text-sp-btn-fg hover:opacity-90">Book a 30-minute call</a>
                <a href="mailto:{{ $page->email }}" class="text-sm font-medium text-sp-accent">{{ $page->email }}</a>
            </div>
        </div>
    {!! $close !!}</div>
@stop
