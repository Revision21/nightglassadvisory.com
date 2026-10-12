{{-- Tailwind Plus: Marketing / Feature Sections / Offset with feature list (dark, v4) --}}
@php
    $points = [
        ['name' => 'Build, buy or stop.', 'body' => 'Most of the answer is a decision, not a project: what to build, what to buy, and what to stop paying for.'],
        ['name' => 'Find the root, not the symptoms.', 'body' => 'The app nobody tested is a security finding. The contract nobody read is why nobody owns the backups. One gap, several symptoms.'],
        ['name' => 'Order beats volume.', 'body' => 'You get a short list in the order that unlocks the most, not a findings report you file and forget.'],
        ['name' => 'Plain language.', 'body' => 'Every recommendation says what it costs, what it fixes and what happens if you wait.'],
    ];
@endphp
<section id="cascade" class="relative isolate overflow-hidden bg-night-900 py-24 sm:py-32">
    <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-star-400/30 to-transparent"></div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-16 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div>
                <h2 class="text-base/7 font-semibold text-star-400">How companies actually get stuck</h2>
                <p class="mt-2 font-display text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Technology and security don&rsquo;t fail in silos. They fail in cascades.</p>
                <p class="mt-6 text-base/7 text-night-300">Most companies run technology and security as a list: the IT contract, the apps, the cloud bill, the questionnaire, the insurance form. Each has its own owner and its own vendor. But they depend on each other, and the insurance question is usually an IT question in disguise.</p>
                <p class="mt-4 text-base/7 text-night-300">Fix them one at a time and you buy three tools and hire three consultants. Find the missing piece first, and the rest gets easier.</p>
                <dl class="mt-10 grid grid-cols-1 gap-x-8 gap-y-8 text-base/7 text-night-300 sm:grid-cols-2">
                    @foreach ($points as $p)
                        <div class="relative pl-9">
                            <dt class="font-semibold text-white">
                                @include('_partials.icon', ['name' => 'check', 'set' => '20/solid', 'class' => 'absolute top-1 left-0 size-5 text-star-400'])
                                {{ $p['name'] }}
                            </dt>
                            <dd class="mt-2 text-sm/6">{!! $p['body'] !!}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
            <div class="mx-auto w-full max-w-md lg:max-w-lg">
                @include('_partials.cascade-diagram')
            </div>
        </div>
    </div>
</section>
