{{-- Tailwind Plus: Stats / Simple (dark, v4), four up, plus a text credibility strip (Logo Clouds idiom, no logos). --}}
@php
    // Every figure here is from Mike's own About (LinkedIn, 2026-10-09). Don't add one that isn't.
    $stats = [
        ['value' => '25 years', 'label' => 'leading technology and security'],
        ['value' => '50 to 5,000', 'label' => 'people at the companies I&rsquo;ve led in'],
        ['value' => 'Up to 30', 'label' => 'people on teams I&rsquo;ve built'],
        ['value' => 'CISSP', 'label' => 'certified security professional'],
    ];
    $credits = [
        ['k' => 'Speaking', 'v' => 'Triangle InfoSeCon 2026, Leadership track'],
        ['k' => 'Writing', 'v' => 'Signal vs. Noise, a weekly newsletter and podcast for founders'],
    ];
@endphp
<section aria-label="Track record" class="relative bg-night-950">
    <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-white/10 to-transparent"></div>
    <div class="mx-auto max-w-7xl px-6 py-16 sm:py-20 lg:px-8">
        <dl class="grid grid-cols-2 gap-x-8 gap-y-12 text-center lg:grid-cols-4">
            @foreach ($stats as $s)
                <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                    <dt class="text-sm/6 text-night-400">{!! $s['label'] !!}</dt>
                    <dd class="order-first font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">{{ $s['value'] }}</dd>
                </div>
            @endforeach
        </dl>
        <div class="mx-auto mt-14 flex max-w-4xl flex-col items-center justify-center gap-4 border-t border-white/10 pt-10 sm:flex-row sm:gap-10">
            @foreach ($credits as $c)
                <p class="text-center text-sm/6 text-night-300">
                    <span class="mr-2 text-xs font-semibold tracking-[0.18em] text-star-400 uppercase">{{ $c['k'] }}</span>{{ $c['v'] }}
                </p>
            @endforeach
        </div>
    </div>
</section>
