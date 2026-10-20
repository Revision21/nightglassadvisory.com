---
title: Talk with Mike
description: Pick 30 minutes or an hour with Mike Faas.
noindex: true
minimal: true
---
@extends('_layouts.studio')

@section('body')
    {{-- Warm 1:1 lane: sent directly to connectors, peers, and partners. Unlisted, noindex, sitemap-excluded. --}}
    {{-- Published CTAs belong on /schedule, not here. --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-24 sm:mt-32">
        <div class="st-fade max-w-3xl">
            <span class="st-display st-eyebrow mb-6 block text-base font-semibold text-st-gold-ink">Talk with Mike</span>
            <h1 class="st-display text-5xl font-medium tracking-tight text-balance text-st-ink sm:text-6xl">Let&rsquo;s find a time.</h1>
            <p class="mt-6 text-xl text-st-text">Catching up, comparing notes, or working through something. Pick 30 minutes or an hour, whatever the conversation needs. Google Meet, direct with Mike.</p>
        </div>
    </div>

    {{-- GHL "Talk with Mike" group: 30 and 60 minute calendars. Leave the 800px min height (GHL's resizer reports ~785px on every step). --}}
    <section class="mt-16 border-y border-st-indigo/10 bg-st-indigo-tint py-16 sm:mt-20 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="st-fade overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-st-ink/10">
                <iframe src="https://apicrm.ctox.com/widget/groups/talk-with-mike"
                    style="width: 100%; min-height: 800px; border: none; overflow: hidden;" scrolling="no"
                    id="talk-with-mike-group" title="Book time with Mike Faas"></iframe>
            </div>
            <p class="mt-8 text-center text-sm text-st-text">
                None of these times work? Email <a href="mailto:{{ $page->email }}" class="font-semibold text-st-gold-ink hover:text-st-ink">{{ $page->email }}</a> and we&rsquo;ll find one.
            </p>
            <script src="https://apicrm.ctox.com/js/form_embed.js" type="text/javascript"></script>
        </div>
    </section>
@stop
