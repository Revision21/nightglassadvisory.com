---
title: When Everything Depends on Everything
description: Slides, sources and the Monday-morning moves from Mike Faas's Triangle InfoSeCon 2026 Leadership-track talk on why security fails in cascades, not silos.
---
@extends('_layouts.studio')

{{--
    The page the talk's SLIDES QR opens (migration plan step 2; QR flip decided 10/25). Ported from echocyber.io/infosecon2026.
    Off-stage, so Nightglass branding is fine here; the slides themselves stay vendor-neutral.
    Content must match the deck: Monday moves, references and graph numbers mirror deck/reveal/build.py (checked 2026-10-12).
    The PDF is a COPY of projects/infosecon-2026/deck/reveal/When-Everything-Depends-on-Everything.pdf. Re-copy after any
    re-export (BR #210 theme swap, slide fixes) or this page serves stale slides.
    One ask (Jane 10/12): the newsletter. The room is mostly practitioners, not buyers; "Book a call" stays in the header.
--}}
@php
    $pdf = '/assets/downloads/when-everything-depends-on-everything-infosecon-2026.pdf';
    $moves = [
        ['Draw one edge.', 'Take your worst-scored domain. Write down, by hand, three things in other domains that break if it stays broken. Hand the page to whoever owns the other end of each line and ask: did you know this depended on you?'],
        ['Find the tokens.', 'Ask whoever runs your data platform for every integration, service account and API key that can read your top two data stores. Ask your security lead which of those they recognize by name. The difference between the two lists is your Anodot.'],
        ['Change the board slide.', 'Retire the eight-squares slide. Replace it with one cascade path and what it costs when it fires. The question changes from "are we secure" to "what fails first."'],
    ];
    $link = 'font-semibold text-st-gold-ink underline underline-offset-4 hover:text-st-ink';
@endphp

@section('body')
    {{-- Hero --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="st-fade max-w-3xl">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">Triangle InfoSeCon 2026 &middot; Leadership track</span>
            <h1 class="st-display text-5xl font-medium tracking-tight text-balance text-st-ink sm:text-6xl">When everything depends on everything.</h1>
            <p class="mt-6 text-xl text-st-text">Security doesn&rsquo;t fail in silos. It fails in cascades. {{ $page->talkSlidesLive ? 'Here are the slides' : 'The slides go up here after the talk. For now:' }} the sources behind every claim, and three things to do Monday morning.</p>
            <ul role="list" class="mt-6 flex flex-wrap gap-2">
                @foreach (['Raleigh Convention Center', 'October 30, 2026', 'Mike Faas'] as $tag)
                    <li class="rounded-full bg-st-indigo-tint px-3 py-1 text-sm font-medium text-st-indigo">{{ $tag }}</li>
                @endforeach
            </ul>
            <div class="mt-10">
                @if ($page->talkSlidesLive)
                    <a href="{{ $pdf }}" class="inline-flex items-center gap-x-2 rounded-full bg-st-ink px-5 py-2.5 text-base font-semibold text-st-page transition hover:bg-st-panel-2">
                        @include('_partials.icon', ['name' => 'arrow-down-tray', 'class' => 'h-5 w-5'])
                        <span class="relative top-px">Download the slides (PDF, 10 MB)</span>
                    </a>
                @else
                    <p class="inline-flex items-center gap-x-3 rounded-full bg-st-wash px-5 py-2.5 text-base font-semibold text-st-ink ring-1 ring-st-ink/10">
                        @include('_partials.icon', ['name' => 'calendar-days', 'class' => 'h-5 w-5 text-st-gold-ink'])
                        <span class="relative top-px">Slides posted here after the talk on October 30</span>
                    </p>
                    <p class="mt-3 text-sm text-st-text">Subscribe below and you&rsquo;ll get a note when they&rsquo;re up.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Monday morning (gold band) --}}
    <section class="relative isolate mt-24 bg-st-gold-tint py-20 sm:mt-32 sm:py-28">
        @include('_partials.studio-grid', ['id' => 'st-grid-monday', 'class' => 'absolute inset-0 -z-10 h-full w-full mask-[linear-gradient(to_bottom_left,white_50%,transparent_60%)] fill-st-gold/25 stroke-st-gold-ink/15'])
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="st-fade max-w-2xl">
                <h2>
                    <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">Monday morning</span>
                    <span class="st-display block text-4xl font-medium tracking-tight text-balance text-st-ink sm:text-5xl">Three moves you can make without buying anything.</span>
                </h2>
            </div>
            <ol role="list" class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-3">
                @foreach ($moves as $i => [$title, $body])
                    <li class="st-fade flex flex-col rounded-3xl bg-white p-6 shadow-sm ring-1 ring-st-ink/10 sm:p-8" style="transition-delay: {{ $i * 80 }}ms">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full {{ $i === 0 ? 'bg-st-gold text-st-ink' : 'bg-st-indigo text-st-gold' }} text-base font-semibold">{{ $i + 1 }}</span>
                        <p class="st-display mt-6 text-2xl font-semibold text-st-ink">{{ $title }}</p>
                        <p class="mt-3 text-base text-st-text">{{ $body }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- References --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="st-fade st-border max-w-3xl pt-12">
            <h2>
                <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">References</span>
                <span class="st-display block text-4xl font-medium tracking-tight text-st-ink sm:text-5xl">The sources behind the claims.</span>
            </h2>
            <ul role="list" class="mt-10 space-y-5 text-base text-st-text">
                <li><strong class="font-semibold text-st-ink">Sidekick Security, <em>The Trust Map</em> (2026).</strong> The public dependency model the talk&rsquo;s graph is built on. <a class="{{ $link }}" href="https://trust-map.sidekicksecurity.io" rel="noopener">trust-map.sidekicksecurity.io</a></li>
                <li><strong class="font-semibold text-st-ink">Vimeo security incident, disclosed April 28, 2026.</strong> Third-party analytics provider Anodot, stolen authentication tokens, Snowflake and BigQuery. <a class="{{ $link }}" href="https://www.bleepingcomputer.com/news/security/video-service-vimeo-confirms-anodot-breach-exposed-user-data/" rel="noopener">BleepingComputer coverage</a></li>
                <li><strong class="font-semibold text-st-ink">Same shape, different logos:</strong> MOVEit Transfer (2023), the Snowflake customer credential campaign (2024), Cleo (2024 to 2025).</li>
                <li><strong class="font-semibold text-st-ink">Obligations named in the cascade math:</strong> AICPA SOC 2 Trust Services Criteria (CC6, CC7, CC9.2); PCI DSS v4.0 (12.8, 12.10); HIPAA, 45 CFR 164.308(b), 164.404, 164.410; N.C. Gen. Stat. &sect; 75-65; GDPR Art. 28 and 33.</li>
            </ul>
            <p class="mt-10 rounded-2xl bg-st-wash p-6 text-sm text-st-text ring-1 ring-st-ink/5">The graph numbers in the talk (76 practices depending on Policies &amp; RACI; 19 on Third-Party Risk across 8 domains) are derived from the Trust Map&rsquo;s public dependency data and were re-verified against the source in September 2026. Version one treats every dependency as equal; weighting the edges is the next piece of work.</p>
        </div>
    </div>

    {{-- Who's talking: the declaration, one line, and the way home --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="st-fade st-border max-w-3xl pt-12">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">The speaker</span>
            <p class="st-display text-2xl/9 font-medium text-st-ink">I&rsquo;m Mike Faas. {{ $page->declaration }}</p>
            <p class="mt-6 text-base text-st-text"><a href="/" class="{{ $link }}">How I work</a> &middot; <a href="{{ $page->linkedin }}" class="{{ $link }}">LinkedIn</a></p>
        </div>
    </div>

    {{-- The one ask --}}
    @include('_partials.newsletter', [
        'nlHeading' => 'Liked the talk? There\'s one of these every Sunday.',
        'nlBody' => 'Signal vs. Noise: one short email a week on the security and technology news worth your attention, and the one question to ask your team about it. No vendor hype, no fear-mongering.',
        'nlSource' => 'infosecon-2026',
    ])
@stop
