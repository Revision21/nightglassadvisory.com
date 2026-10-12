{{-- Spotlight's tilted photo strip, re-cast as the paperwork founders bring to the first call. Illustrative only. --}}
@php
    $rot = ['rotate-2', '-rotate-2', 'rotate-2', 'rotate-2', '-rotate-2'];
    $label = 'text-[0.6rem] font-semibold tracking-[0.18em] text-sp-accent uppercase';
    $line = 'h-1.5 rounded-full bg-sp-ink/10';
@endphp
<div class="mt-16 sm:mt-20" aria-hidden="true">
    <div class="-my-4 flex justify-center gap-5 overflow-hidden py-4 sm:gap-8">

        {{-- 1. Security questionnaire --}}
        <div class="relative w-44 flex-none overflow-hidden rounded-xl bg-sp-paper shadow-sm ring-1 ring-sp-line sm:w-72 sm:rounded-2xl {{ $rot[0] }}">
            <div class="flex aspect-9/10 flex-col p-4 sm:p-6">
                <p class="{{ $label }}">Security questionnaire</p>
                <p class="mt-1 font-display text-sm font-semibold text-sp-ink sm:text-base">Vendor assessment</p>
                <div class="mt-3 h-1 w-full rounded-full bg-sp-ink/10"><div class="h-1 w-[37%] rounded-full bg-sp-gold"></div></div>
                <p class="mt-1 text-[0.65rem] text-sp-muted">14 of 38 answered</p>
                <ul class="mt-3 space-y-2.5 sm:mt-4 sm:space-y-3">
                    @foreach ([[1, 'Yes'], [0, '?'], [0, '?'], [1, 'No'], [1, 'Yes']] as [$done, $a])
                        <li class="flex items-center gap-2">
                            <span class="size-3 flex-none rounded-sm {{ $done ? 'bg-sp-gold' : 'ring-1 ring-sp-ink/25' }}"></span>
                            <span class="{{ $line }} flex-auto"></span>
                            <span class="text-[0.6rem] font-semibold {{ $a === '?' ? 'text-sp-accent' : 'text-sp-muted' }}">{{ $a }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- 2. IT services agreement --}}
        <div class="relative w-44 flex-none overflow-hidden rounded-xl bg-sp-paper shadow-sm ring-1 ring-sp-line sm:w-72 sm:rounded-2xl {{ $rot[1] }}">
            <div class="flex aspect-9/10 flex-col p-4 sm:p-6">
                <p class="{{ $label }}">IT services agreement</p>
                <p class="mt-1 font-display text-sm font-semibold text-sp-ink sm:text-base">&sect;12.3 Out of scope</p>
                <div class="mt-4 space-y-2">
                    <div class="{{ $line }} w-full"></div><div class="{{ $line }} w-11/12"></div><div class="{{ $line }} w-4/5"></div>
                </div>
                <div class="mt-4 rounded-md bg-sp-gold/20 px-2 py-1.5 ring-1 ring-sp-gold/50">
                    <p class="text-[0.6rem] font-medium text-sp-ink sm:text-xs">Email backup, line-of-business apps, website hosting</p>
                </div>
                <div class="mt-4 space-y-2">
                    <div class="{{ $line }} w-full"></div><div class="{{ $line }} w-2/3"></div>
                </div>
            </div>
        </div>

        {{-- 3. Cloud bill --}}
        <div class="relative w-44 flex-none overflow-hidden rounded-xl bg-sp-paper shadow-sm ring-1 ring-sp-line sm:w-72 sm:rounded-2xl {{ $rot[2] }}">
            <div class="flex aspect-9/10 flex-col p-4 sm:p-6">
                <p class="{{ $label }}">Cloud bill</p>
                <p class="mt-1 font-display text-sm font-semibold text-sp-ink sm:text-base">October <span class="text-sp-accent">+38%</span></p>
                <div class="mt-auto flex h-2/3 items-end gap-1.5 sm:gap-2">
                    @foreach ([38, 40, 42, 41, 45, 47, 52, 58, 71, 100] as $i => $h)
                        <div class="flex-1 rounded-t-sm {{ $i === 9 ? 'bg-sp-gold' : 'bg-sp-ink/15' }}" style="height: {{ $h }}%"></div>
                    @endforeach
                </div>
                <p class="mt-2 text-[0.6rem] text-sp-muted">Owner: <span class="text-sp-accent">(none)</span></p>
            </div>
        </div>

        {{-- 4. Cyber insurance application --}}
        <div class="relative w-44 flex-none overflow-hidden rounded-xl bg-sp-paper shadow-sm ring-1 ring-sp-line sm:w-72 sm:rounded-2xl {{ $rot[3] }}">
            <div class="flex aspect-9/10 flex-col p-4 sm:p-6">
                <p class="{{ $label }}">Cyber insurance</p>
                <p class="mt-1 font-display text-sm font-semibold text-sp-ink sm:text-base">Renewal application &sect;4</p>
                <ul class="mt-4 space-y-3 sm:space-y-4">
                    @foreach (['Offline backups tested quarterly?', 'MFA on all email?', 'Incident plan on file?'] as $q)
                        <li>
                            <p class="text-[0.6rem] text-sp-text sm:text-xs">{{ $q }}</p>
                            <div class="mt-1.5 flex gap-2">
                                <span class="rounded px-1.5 py-0.5 text-[0.55rem] ring-1 ring-sp-ink/20 text-sp-muted">Yes</span>
                                <span class="rounded px-1.5 py-0.5 text-[0.55rem] ring-1 ring-sp-ink/20 text-sp-muted">No</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <p class="mt-auto text-[0.6rem] text-sp-muted">Signature: ____________</p>
            </div>
        </div>

        {{-- 5. Board deck --}}
        <div class="relative w-44 flex-none overflow-hidden rounded-xl bg-sp-paper shadow-sm ring-1 ring-sp-line sm:w-72 sm:rounded-2xl {{ $rot[4] }}">
            <div class="flex aspect-9/10 flex-col p-4 sm:p-6">
                <p class="{{ $label }}">Board deck, slide 9</p>
                <p class="mt-1 font-display text-sm font-semibold text-sp-ink sm:text-base">&ldquo;Are we secure?&rdquo;</p>
                <div class="mt-4 grid grid-cols-4 gap-1.5 sm:gap-2">
                    @foreach (['B', 'B', 'C', 'B', 'B', 'A', 'B', 'B'] as $g)
                        <div class="flex aspect-square items-center justify-center rounded-md bg-sp-raise font-display text-sm font-semibold ring-1 ring-sp-line sm:text-lg {{ $g === 'C' ? 'text-sp-accent' : 'text-sp-ink' }}">{{ $g }}</div>
                    @endforeach
                </div>
                <p class="mt-auto text-[0.6rem] text-sp-muted">Mostly Bs. Nothing on fire.</p>
            </div>
        </div>

    </div>
</div>
