{{-- Tailwind Plus: Bento Grids / Three column bento grid (dark, v4), extended to 3x3 for six triggers. --}}
@php
    $t = $page->triggers; // order matters: see config.php
    $badge = fn ($r) => ['cto' => 'CTO', 'ciso' => 'CISO', 'both' => 'CTO + CISO'][$r];
    // Grid placement per tile (lg). Tall tiles 0 and 3 carry the illustrations.
    $place = [
        0 => 'lg:col-start-1 lg:row-start-1 lg:row-span-2',
        1 => 'lg:col-start-2 lg:row-start-1',
        2 => 'lg:col-start-2 lg:row-start-2',
        3 => 'lg:col-start-3 lg:row-start-1 lg:row-span-2',
        4 => 'lg:col-start-1 lg:row-start-3 lg:col-span-2',
        5 => 'lg:col-start-3 lg:row-start-3',
    ];
    // Illustrative only, labeled as examples on the tile.
    $decisions = [
        ['what' => 'Customer portal', 'call' => 'Build'],
        ['what' => 'AI help desk', 'call' => 'Buy'],
        ['what' => 'Second CRM nobody uses', 'call' => 'Stop'],
        ['what' => 'Data warehouse', 'call' => 'Wait'],
    ];
    $questions = [
        ['q' => 'MFA enforced for every user?', 'a' => 'Yes'],
        ['q' => 'Backups tested in the last 90 days?', 'a' => '?'],
        ['q' => 'Incident response plan on file?', 'a' => '?'],
        ['q' => 'Vendors reviewed annually?', 'a' => 'No'],
        ['q' => 'Data encrypted at rest?', 'a' => 'Yes'],
    ];
@endphp
<section id="when" class="bg-night-950 py-24 sm:py-32">
    <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-center text-base/7 font-semibold text-star-400">When founders call</h2>
        <p class="mx-auto mt-2 max-w-2xl text-center font-display text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">It usually starts with one of these.</p>
        <p class="mx-auto mt-6 max-w-2xl text-center text-lg/8 text-night-300">A question lands that nobody inside can answer, and it&rsquo;s attached to money: a deal, a contract, a renewal or a hire. Half are technology. Half are security. Most are both.</p>

        <div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-3 lg:grid-rows-[auto_auto_auto]">
            @foreach ($t as $i => $tile)
                <div class="relative {{ $place[$i] }}">
                    <div class="absolute inset-px rounded-2xl bg-night-900"></div>
                    <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(1rem+1px)]">
                        <div class="px-8 pt-8 pb-6 sm:px-10 sm:pt-10">
                            <div class="flex items-center gap-x-3">
                                <span class="flex size-9 flex-none items-center justify-center rounded-lg bg-night-800 ring-1 ring-white/10">
                                    @include('_partials.icon', ['name' => $tile['icon'], 'class' => 'size-5 text-star-400'])
                                </span>
                                <span class="inline-flex items-center rounded-md bg-star-400/10 px-2 py-1 text-xs font-medium text-star-400 inset-ring inset-ring-star-400/20">{{ $badge($tile['role']) }}</span>
                            </div>
                            <p class="mt-5 text-lg font-medium tracking-tight text-white">{{ $tile['title'] }}</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-night-300">{{ $tile['body'] }}</p>
                        </div>

                        @if ($i === 0)
                            {{-- Build / buy / stop: the CTO call --}}
                            <div class="mt-auto px-8 pb-8 sm:px-10 sm:pb-10">
                                <div class="rounded-xl bg-night-950/60 p-4 ring-1 ring-white/10">
                                    <p class="text-[0.65rem] font-semibold tracking-[0.18em] text-night-400 uppercase">Example decisions</p>
                                    <ul role="list" class="mt-3 divide-y divide-white/5">
                                        @foreach ($decisions as $d)
                                            <li class="flex items-center justify-between gap-x-3 py-2.5 text-sm">
                                                <span class="text-night-200">{{ $d['what'] }}</span>
                                                <span class="rounded-md px-2 py-0.5 text-xs font-semibold {{ $d['call'] === 'Stop' ? 'bg-white/10 text-white' : ($d['call'] === 'Wait' ? 'text-night-400 ring-1 ring-white/10' : 'bg-star-400/15 text-star-400') }}">{{ $d['call'] }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @elseif ($i === 3)
                            {{-- A half-answered questionnaire: the CISO call --}}
                            <div class="mt-auto px-8 pb-8 sm:px-10 sm:pb-10">
                                <div class="rounded-xl bg-night-950/60 p-4 ring-1 ring-white/10">
                                    <div class="flex items-center justify-between">
                                        <p class="text-[0.65rem] font-semibold tracking-[0.18em] text-night-400 uppercase">Example questionnaire</p>
                                        <p class="text-xs text-night-400">14 of 38</p>
                                    </div>
                                    <div class="mt-2 h-1.5 w-full rounded-full bg-white/10"><div class="h-1.5 w-[37%] rounded-full bg-star-400"></div></div>
                                    <ul role="list" class="mt-3 divide-y divide-white/5">
                                        @foreach ($questions as $q)
                                            <li class="flex items-center justify-between gap-x-3 py-2.5 text-sm">
                                                <span class="text-night-200">{{ $q['q'] }}</span>
                                                <span class="w-9 flex-none rounded-md py-0.5 text-center text-xs font-semibold {{ $q['a'] === 'Yes' ? 'bg-star-400/15 text-star-400' : ($q['a'] === '?' ? 'text-white ring-1 ring-star-400/40' : 'bg-white/10 text-white') }}">{{ $q['a'] }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="pointer-events-none absolute inset-px rounded-2xl shadow-sm outline outline-white/10"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
