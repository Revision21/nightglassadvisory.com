{{-- Tailwind Plus: Marketing / Feature Sections / Simple three column with small icons (dark, v4) --}}
<section id="when" class="bg-night-950 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-base/7 font-semibold text-star-400">When founders call</h2>
            <p class="mt-2 font-display text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">It usually starts with one of these.</p>
            <p class="mt-6 text-lg/8 text-night-300">A question lands that nobody inside the company can answer, and it&rsquo;s attached to money: a deal, a contract, a renewal or a hire. Half of them are technology questions. Half are security. Most are both.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                @foreach ($page->triggers as $t)
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base/7 font-semibold text-white">
                            <span class="flex size-9 flex-none items-center justify-center rounded-lg bg-night-800 ring-1 ring-white/10">
                                @include('_partials.icon', ['name' => $t['icon'], 'class' => 'size-5 text-star-400'])
                            </span>
                            {{ $t['title'] }}
                        </dt>
                        <dd class="mt-3">
                            @php $badge = ['cto' => 'CTO', 'ciso' => 'CISO', 'both' => 'CTO + CISO'][$t['role']]; @endphp
                            <span class="inline-flex items-center rounded-md bg-star-400/10 px-2 py-1 text-xs font-medium text-star-400 inset-ring inset-ring-star-400/20">{{ $badge }}</span>
                        </dd>
                        <dd class="mt-3 flex flex-auto flex-col text-base/7 text-night-300">
                            <p class="flex-auto">{{ $t['body'] }}</p>
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>
