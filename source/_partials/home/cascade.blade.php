{{-- Tailwind Plus: Marketing / Feature Sections / Offset with feature list (dark, v4) --}}
@php
    $points = [
        ['name' => 'Find the root, not the symptoms.', 'body' => 'A missing policy shows up as an audit finding, an onboarding gap and an incident nobody planned for. That is one problem, not three.'],
        ['name' => 'Order beats volume.', 'body' => 'You get a short list in the order that unlocks the most, not a findings report you file and forget.'],
        ['name' => 'Plain language.', 'body' => 'Every recommendation says what it costs, what it fixes and what happens if you wait.'],
        ['name' => 'Build, buy or stop.', 'body' => 'Sometimes the best security decision is to stop paying for a tool nobody uses. That&rsquo;s on the list too.'],
    ];
@endphp
<section id="cascade" class="relative isolate overflow-hidden bg-night-900 py-24 sm:py-32">
    <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-star-400/30 to-transparent"></div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-5">
            <div class="col-span-2">
                <h2 class="text-base/7 font-semibold text-star-400">How security actually fails</h2>
                <p class="mt-2 font-display text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">It doesn&rsquo;t fail in silos. It fails in cascades.</p>
                <p class="mt-6 text-base/7 text-night-300">Most assessments grade a handful of categories and hand you a report card. Mostly Bs. Nothing on fire. But the questionnaire you can&rsquo;t answer, the SOC 2 gap and the insurance question are usually one missing piece showing up in three places.</p>
                <p class="mt-4 text-base/7 text-night-300">Fix the categories one at a time and you buy three tools and hire three consultants. Find the missing piece first, and the rest gets easier.</p>
            </div>
            <dl class="col-span-3 grid grid-cols-1 gap-x-8 gap-y-10 text-base/7 text-night-300 sm:grid-cols-2 lg:gap-y-16">
                @foreach ($points as $p)
                    <div class="relative pl-9">
                        <dt class="font-semibold text-white">
                            @include('_partials.icon', ['name' => 'check', 'set' => '20/solid', 'class' => 'absolute top-1 left-0 size-5 text-star-400'])
                            {{ $p['name'] }}
                        </dt>
                        <dd class="mt-2">{!! $p['body'] !!}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>
