---
title: Studio preview
noindex: true
---
@extends('_layouts.studio')

{{--
    PREVIEW (2026-10-12): the home page in the Tailwind Plus "Studio" layout, for
    Mike to compare against the Spotlight home at /. Same copy, same config.
    Hidden from search (noindex + sitemap exclusion). Delete whichever loses.
--}}
@php
    $c = 'mx-auto max-w-7xl px-6 lg:px-8';
    $badge = fn ($r) => ['cto' => 'CTO', 'ciso' => 'CISO', 'both' => 'CTO + CISO'][$r];
    $pill = 'inline-flex rounded-full px-4 py-1.5 text-sm font-semibold transition';
    $topics = [
        ['document-check', 'Security questionnaires'], ['clipboard-document-list', 'IT contracts'],
        ['shield-check', 'Cyber insurance and SOC 2'], ['scale', 'Build, buy or stop'],
        ['cpu-chip', 'AI tools and agents'], ['banknotes', 'The cloud bill'],
        ['user-plus', 'First senior hires'], ['presentation-chart-line', '"Are we secure?"'],
    ];
@endphp

@section('body')

    {{-- Hero --}}
    <div class="{{ $c }} mt-24 sm:mt-32 md:mt-48">
        <div class="st-fade max-w-3xl">
            <h1 class="st-display text-5xl font-medium tracking-tight text-balance text-st-ink sm:text-7xl">Fractional CTO and CISO for <span class="whitespace-nowrap">founder-led</span> companies.</h1>
            <p class="mt-6 text-xl text-st-text">{{ $page->tagline }}</p>
        </div>
    </div>

    {{-- Was a dark 'where the questions come from' panel; Mike: bland. Spotlight's paperwork strip instead. --}}
    <div class="mt-16 sm:mt-24 lg:mt-32">
        @include('_partials.sp.paperwork')
    </div>

    {{-- Case-study cards -> founder situations --}}
    <div id="why" class="{{ $c }} mt-24 scroll-mt-12 sm:mt-32 lg:mt-40">
        <div class="st-fade max-w-2xl">
            <h2>
                <span class="st-display mb-6 block text-base font-semibold text-st-ink">When founders call</span>
                <span class="st-display block text-4xl font-medium tracking-tight text-balance text-st-ink sm:text-5xl">It usually starts with a question nobody inside can answer.</span>
            </h2>
            <p class="mt-6 text-xl text-st-text">And it&rsquo;s attached to money: a deal, a contract, a renewal or a hire. Half are technology. Half are security. Most are both.</p>
        </div>
    </div>
    <div class="{{ $c }} mt-16">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            @foreach ($page->triggers as $i => $t)
                <article class="st-fade relative flex w-full flex-col rounded-3xl p-6 ring-1 ring-st-ink/10 transition hover:bg-st-wash sm:p-8" style="transition-delay: {{ ($i % 3) * 80 }}ms">
                    <a href="{{ $page->bookingUrl }}" class="absolute inset-0 rounded-3xl" aria-label="{{ $t['title'] }}: book a call"></a>
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-st-wash ring-1 ring-st-ink/10">
                        @include('_partials.icon', ['name' => $t['icon'], 'class' => 'h-6 w-6 text-st-gold-ink'])
                    </span>
                    <p class="mt-6 flex gap-x-2 text-sm text-st-ink">
                        <span class="font-semibold">{{ $badge($t['role']) }}</span>
                        <span class="text-st-muted" aria-hidden="true">/</span>
                        <span>Situation</span>
                    </p>
                    <p class="st-display mt-6 text-2xl font-semibold text-st-ink">{{ $t['title'] }}</p>
                    <p class="mt-4 text-base text-st-text">{{ $t['body'] }}</p>
                </article>
            @endforeach
        </div>
    </div>

    {{-- Testimonial band -> the thesis, as a pull quote --}}
    <div class="relative isolate mt-24 bg-st-wash py-16 sm:mt-32 sm:py-28 md:py-32 lg:mt-40">
        @include('_partials.studio-grid', ['id' => 'st-grid-quote', 'class' => 'absolute inset-0 -z-10 h-full w-full mask-[linear-gradient(to_bottom_left,white_50%,transparent_60%)] fill-st-ink/[0.04] stroke-st-ink/10'])
        <div class="{{ $c }}">
            <figure class="st-fade mx-auto max-w-4xl">
                <blockquote class="st-display relative text-3xl font-medium tracking-tight text-st-ink sm:text-4xl">
                    <p class="before:content-['\201C'] after:content-['\201D'] sm:before:absolute sm:before:right-full">Technology and security don&rsquo;t fail in silos. They fail in cascades.</p>
                </blockquote>
                <figcaption class="mt-10 text-sm text-st-text"><span class="font-semibold text-st-ink">Mike Faas</span>, from &ldquo;When Everything Depends on Everything,&rdquo; Triangle InfoSeCon 2026</figcaption>
            </figure>
        </div>
    </div>

    {{-- Services -> how it fails (diagram) --}}
    <div class="{{ $c }} mt-24 sm:mt-32 lg:mt-40">
        <div class="st-fade max-w-2xl">
            <h2>
                <span class="st-display mb-6 block text-base font-semibold text-st-ink">How companies get stuck</span>
                <span class="st-display block text-4xl font-medium tracking-tight text-balance text-st-ink sm:text-5xl">One missing piece shows up in five places.</span>
            </h2>
            <p class="mt-6 text-xl text-st-text">The insurance question is usually an IT question in disguise. Fix the symptoms one at a time and you buy three tools and hire three consultants. Find the missing piece first, and the rest gets easier.</p>
        </div>
        <div class="mt-16 lg:flex lg:items-center lg:justify-between lg:gap-x-16">
            <div class="st-fade mx-auto w-full max-w-md lg:mx-0 lg:w-1/2 lg:max-w-none" data-theme="light">
                @include('_partials.cascade-diagram')
            </div>
            <ul role="list" class="mt-16 text-base text-st-text lg:mt-0 lg:w-1/2">
                @foreach ([
                    ['Build, buy or stop', 'Most of the answer is a decision, not a project: what to build, what to buy, and what to stop paying for.'],
                    ['Find the root, not the symptoms', 'The app nobody tested is a security finding. The contract nobody read is why nobody owns the backups.'],
                    ['Order beats volume', 'A short list in the order that unlocks the most, not a findings report you file and forget.'],
                    ['Plain language', 'Every recommendation says what it costs, what it fixes and what happens if you wait.'],
                ] as $i => [$k, $v])
                    <li class="st-fade mt-10 first:mt-0">
                        <div class="st-border pt-10 {{ $i === 0 ? 'pt-0 before:hidden after:hidden' : '' }}"><strong class="font-semibold text-st-ink">{{ $k }}.</strong> {{ $v }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Services with the stylized image -> The Diagnostic --}}
    <div id="diagnostic" class="{{ $c }} mt-24 scroll-mt-12 sm:mt-32 lg:mt-40">
        <div class="st-fade max-w-2xl">
            <h2>
                <span class="st-display mb-6 block text-base font-semibold text-st-ink">{{ $page->diagnostic['name'] }}</span>
                <span class="st-display block text-4xl font-medium tracking-tight text-balance text-st-ink sm:text-5xl">Three weeks. Fixed price. A clear answer.</span>
            </h2>
            <p class="mt-6 text-xl text-st-text">Start with the question that&rsquo;s keeping you up, technology or security. Leave with the answer, and a plan for everything it touches.</p>
        </div>
    </div>
    <div class="{{ $c }} mt-16">
        <div class="lg:flex lg:items-center lg:justify-end">
            <div class="flex justify-center lg:w-1/2 lg:justify-end lg:pr-12">
                <div class="st-fade w-full max-w-[33rem] flex-none lg:max-w-[40rem]">
                    @include('_partials.studio-image', ['src' => '/assets/img/mike-faas.jpg'])
                </div>
            </div>
            <ul role="list" class="mt-16 text-base text-st-text lg:mt-0 lg:w-1/2 lg:pl-4">
                @foreach ($page->steps as $i => $s)
                    <li class="st-fade mt-10 first:mt-0">
                        <div class="st-border pt-10 {{ $i === 0 ? 'pt-0 before:hidden after:hidden' : '' }}"><strong class="font-semibold text-st-ink">{{ $s['week'] }}: {{ $s['title'] }}.</strong> {{ $s['body'] }}</div>
                    </li>
                @endforeach
                <li class="st-fade mt-10">
                    <div class="st-border pt-10">
                        <strong class="font-semibold text-st-ink">{{ $page->diagnostic['priceLabel'] }}, fixed.</strong> Agreed before we begin. No retainer to start and no open-ended hours.
                        <div class="mt-6"><a href="{{ $page->bookingUrl }}" class="{{ $pill }} bg-st-ink text-st-page hover:bg-st-panel-2"><span class="relative top-px">Start with a 30-minute call</span></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- About: stats (Studio's StatList) --}}
    <div id="about" class="{{ $c }} mt-24 scroll-mt-12 sm:mt-32 lg:mt-40">
        <div class="st-fade max-w-2xl">
            <h2>
                <span class="st-display mb-6 block text-base font-semibold text-st-ink">About</span>
                <span class="st-display block text-4xl font-medium tracking-tight text-balance text-st-ink sm:text-5xl">Both chairs. One plan.</span>
            </h2>
            <p class="mt-6 text-xl text-st-text">I&rsquo;m Mike Faas. Most companies get technology advice from one person and security advice from another, and then the two disagree. I sit in both, so the technology plan and the security plan are the same plan.</p>
            <p class="mt-4 text-base text-st-text">I&rsquo;ve spent 25 years leading technology and security at companies from 50 people to 5,000: through acquisitions, building teams of up to 30, and finding six-figure savings along the way. CISSP, based in Raleigh.</p>
        </div>
        <dl class="mt-16 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([['25 years', 'leading technology and security'], ['50 to 5,000', 'people at the companies I&rsquo;ve led in'], ['Up to 30', 'people on teams I&rsquo;ve built'], ['CISSP', 'certified security professional']] as [$v, $l])
                <div class="st-fade st-border-left flex flex-col-reverse pl-8">
                    <dt class="mt-2 text-base text-st-text">{!! $l !!}</dt>
                    <dd class="st-display text-3xl font-semibold text-st-ink sm:text-4xl">{{ $v }}</dd>
                </div>
            @endforeach
        </dl>
    </div>

    {{-- FAQ --}}
    <div id="faq" class="{{ $c }} mt-24 scroll-mt-12 sm:mt-32 lg:mt-40">
        <div class="st-fade max-w-2xl">
            <h2 class="st-display text-4xl font-medium tracking-tight text-st-ink sm:text-5xl">Questions founders ask</h2>
        </div>
        <dl class="mt-12 max-w-3xl">
            @foreach ($page->faqs as $i => $f)
                <div class="st-fade st-border mt-8 pt-8 first:mt-0">
                    <dt>
                        <button type="button" command="--toggle" commandfor="faq-{{ $i }}" class="flex w-full items-start justify-between text-left">
                            <span class="st-display text-lg font-semibold text-st-ink">{{ $f['q'] }}</span>
                            <span class="ml-6 flex h-7 items-center text-st-gold-ink">
                                @include('_partials.icon', ['name' => 'plus-small', 'class' => 'size-6 in-aria-expanded:hidden'])
                                @include('_partials.icon', ['name' => 'minus-small', 'class' => 'size-6 not-in-aria-expanded:hidden'])
                            </span>
                        </button>
                    </dt>
                    <el-disclosure id="faq-{{ $i }}" hidden class="contents">
                        <dd class="mt-3 pr-12 text-base text-st-text">{{ $f['a'] }}</dd>
                    </el-disclosure>
                </div>
            @endforeach
        </dl>
    </div>

    {{-- Contact panel --}}
    <div class="{{ $c }} mt-24 sm:mt-32 lg:mt-40">
        <div class="st-fade -mx-6 rounded-4xl bg-st-panel px-6 py-20 sm:mx-0 sm:py-32 md:px-12">
            <div class="mx-auto max-w-4xl">
                <div class="max-w-xl">
                    <h2 class="st-display text-3xl font-medium text-balance text-white sm:text-4xl">Got a question nobody inside can answer?</h2>
                    <p class="mt-4 text-base text-white/70">Thirty minutes is enough to tell whether the diagnostic fits. If it&rsquo;s not the right fit, I&rsquo;ll point you to who is.</p>
                    <div class="mt-6 flex">
                        <a href="{{ $page->bookingUrl }}" class="{{ $pill }} bg-st-gold text-st-ink hover:bg-white"><span class="relative top-px">Book a 30-minute call</span></a>
                    </div>
                    <div class="st-border st-border-invert mt-10 pt-10">
                        <h3 class="st-display text-base font-semibold text-white">Reach me directly</h3>
                        <ul role="list" class="mt-6 grid grid-cols-1 gap-8 text-sm text-white/70 sm:grid-cols-2">
                            <li><strong class="block font-semibold text-white">Email</strong><a href="mailto:{{ $page->email }}" class="hover:text-st-gold">{{ $page->email }}</a></li>
                            <li><strong class="block font-semibold text-white">LinkedIn</strong><a href="{{ $page->linkedin }}" class="hover:text-st-gold">linkedin.com/in/mfaas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
