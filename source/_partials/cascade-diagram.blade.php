{{--
    Hero visual: one gap, five symptoms. Lines draw out from the root, then each
    symptom lights up. Original artwork (no third-party data). Colors come from
    the theme tokens, so it works on both grounds. Honors prefers-reduced-motion.
--}}
@php
    // $colorful (Studio): indigo root, gold edges, white symptom cards with role pills matching the situation cards.
    $colorful = $colorful ?? false;
    $root = ['eyebrow' => 'One gap', 'label' => 'Nobody owns the backups'];
    $nodes = [
        ['x' => 50, 'y' => 9,  'role' => 'CISO', 'label' => 'Insurance form you can&rsquo;t sign'],
        ['x' => 83, 'y' => 32, 'role' => 'CTO',  'label' => 'IT contract says &ldquo;out of scope&rdquo;'],
        ['x' => 75, 'y' => 85, 'role' => 'CISO', 'label' => 'Questionnaire stalls the deal'],
        ['x' => 25, 'y' => 85, 'role' => 'CTO',  'label' => 'Restore time: unknown'],
        ['x' => 17, 'y' => 32, 'role' => 'BOTH', 'label' => 'Board asks &ldquo;are we OK?&rdquo;'],
    ];
@endphp
<div class="ng-cascade relative mx-auto aspect-square w-full max-w-md lg:max-w-none" role="img" aria-label="Diagram: one gap, nobody owns the backups, shows up as five problems: an insurance form you can't sign, an IT contract that says out of scope, a questionnaire that stalls a deal, an unknown restore time, and a board asking whether the company is OK.">
    <svg viewBox="0 0 100 100" class="absolute inset-0 size-full" aria-hidden="true">
        @if ($colorful)
            <circle cx="50" cy="50" r="46" class="fill-st-gold-tint" />
            <circle cx="50" cy="50" r="46" class="fill-none stroke-st-gold/60" stroke-width="0.3" stroke-dasharray="0.8 1.6" />
            <circle cx="50" cy="50" r="29" class="fill-st-indigo-tint stroke-st-indigo/15" stroke-width="0.3" />
        @else
            <circle cx="50" cy="50" r="44" class="fill-none stroke-white/10" stroke-width="0.25" stroke-dasharray="0.8 1.6" />
            <circle cx="50" cy="50" r="27" class="fill-none stroke-white/5" stroke-width="0.25" />
        @endif
        @foreach ($nodes as $i => $n)
            <line x1="50" y1="50" x2="{{ $n['x'] }}" y2="{{ $n['y'] }}" pathLength="100"
                  class="ng-edge {{ $colorful ? 'stroke-st-gold' : 'stroke-star-400' }}" stroke-width="{{ $colorful ? 0.7 : 0.45 }}" stroke-linecap="round"
                  style="animation-delay: {{ 0.5 + $i * 0.35 }}s" />
        @endforeach
    </svg>

    <div class="absolute top-1/2 left-1/2 w-[38%] -translate-x-1/2 -translate-y-1/2">
        <div class="ng-root rounded-2xl px-3 py-4 text-center {{ $colorful ? 'bg-st-indigo shadow-xl shadow-st-indigo/30 ring-2 ring-st-gold' : 'bg-star-400 shadow-lg shadow-star-400/20 ring-1 ring-star-300' }}">
            <p class="text-[0.65rem] font-semibold tracking-[0.2em] uppercase {{ $colorful ? 'text-st-gold' : 'text-night-950/70' }}">{{ $root['eyebrow'] }}</p>
            <p class="mt-1 font-display text-sm/5 font-semibold sm:text-base/6 {{ $colorful ? 'text-white' : 'text-night-950' }}">{{ $root['label'] }}</p>
        </div>
    </div>

    @foreach ($nodes as $i => $n)
        <div class="ng-node absolute w-[34%] -translate-x-1/2 -translate-y-1/2" style="left: {{ $n['x'] }}%; top: {{ $n['y'] }}%; animation-delay: {{ 0.85 + $i * 0.35 }}s">
            @if ($colorful)
                @php $rp = ['CTO' => 'bg-st-indigo text-white', 'CISO' => 'bg-st-gold text-st-ink', 'BOTH' => 'bg-st-indigo text-st-gold ring-2 ring-st-gold'][$n['role']]; @endphp
                <div class="rounded-xl bg-white px-2.5 pt-2.5 pb-2 text-center shadow-md ring-1 ring-st-ink/10">
                    <span class="inline-block rounded-full px-2 py-0.5 text-[0.55rem] font-semibold tracking-wider uppercase {{ $rp }}">{{ $n['role'] === 'BOTH' ? 'CTO + CISO' : $n['role'] }}</span>
                    <p class="mt-1.5 text-xs/4 font-medium text-st-ink sm:text-[0.8rem]/5">{!! $n['label'] !!}</p>
                </div>
            @else
                <div class="rounded-xl bg-night-800/90 px-2.5 py-2 text-center ring-1 ring-white/10 backdrop-blur-sm">
                    <p class="text-[0.6rem] font-semibold tracking-[0.18em] text-star-400 uppercase">{{ $n['role'] === 'BOTH' ? 'CTO + CISO' : $n['role'] }}</p>
                    <p class="mt-0.5 text-xs/4 font-medium text-white sm:text-[0.8rem]/5">{!! $n['label'] !!}</p>
                </div>
            @endif
        </div>
    @endforeach
</div>
