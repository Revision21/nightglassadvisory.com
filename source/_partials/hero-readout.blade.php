{{-- Hero art option B: the week-3 readout, drawn as paperwork (illustrative). Ties to the cascade diagram's "Nobody owns the backups". --}}
@php $label = 'text-[0.6rem] font-semibold tracking-[0.18em] text-st-gold-ink uppercase'; $line = 'h-1.5 rounded-full bg-st-ink/10'; @endphp
<div class="relative mx-auto w-full max-w-md py-6" aria-hidden="true">
    <div class="absolute inset-x-6 inset-y-2 -rotate-3 rounded-2xl bg-st-wash shadow-sm ring-1 ring-st-ink/10"></div>
    <div class="relative rotate-1 rounded-2xl bg-white p-6 shadow-lg ring-1 ring-st-ink/10 sm:p-8">
        <div class="flex items-baseline justify-between">
            <p class="{{ $label }}">The readout &middot; week 3</p>
            <img src="/assets/brand/nightglass-mark-header.svg" alt="" class="h-6 w-6">
        </div>
        <p class="mt-4 text-[0.65rem] font-semibold tracking-wider text-st-muted uppercase">The answer</p>
        <p class="st-display mt-1 text-lg/6 font-semibold text-st-ink">The questionnaire stalls on one gap: <span class="st-mark">nobody owns the backups.</span></p>
        <div class="mt-6 grid grid-cols-3 gap-3 border-y border-st-ink/10 py-4 text-[0.7rem] sm:text-xs">
            @foreach ([['Build', 'Offboarding checklist'], ['Buy', 'Managed backups'], ['Stop', 'Second file-share tool']] as [$k, $v])
                <div><p class="font-semibold tracking-wider text-st-gold-ink uppercase">{{ $k }}</p><p class="mt-1 text-st-ink">{{ $v }}</p></div>
            @endforeach
        </div>
        <p class="mt-5 text-[0.65rem] font-semibold tracking-wider text-st-muted uppercase">The plan, in order</p>
        <ol class="mt-3 space-y-2.5 text-sm text-st-ink">
            @foreach (['Name an owner for backups', 'MFA on every account', 'Answer questionnaire §4', 'Renewal form, ready'] as $i => $step)
                <li class="flex items-center gap-3">
                    <span class="flex size-6 flex-none items-center justify-center rounded-full text-xs font-semibold {{ $i === 0 ? 'bg-st-gold text-st-ink' : 'bg-st-indigo-tint text-st-indigo' }}">{{ $i + 1 }}</span>
                    <span>{{ $step }}</span>
                </li>
            @endforeach
        </ol>
        <div class="mt-6 space-y-2"><div class="{{ $line }} w-full"></div><div class="{{ $line }} w-3/4"></div></div>
    </div>
</div>
