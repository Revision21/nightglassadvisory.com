{{--
    Hero option B: the night glass. A field of everyday paperwork (questionnaire
    items, contract clauses, the cloud bill) sits blurred across the hero. Inside
    the lens it comes into focus, and the lens has found the one gap that shows
    up everywhere. The blurred and sharp layers are the SAME markup; the sharp copy
    is clipped to a circle driven by --lx/--ly/--lr, which also place the ring.
    Bezel ticks only: no crosshair (cut in logo round 1, read as a rifle scope).
--}}
@php
    $rows = [
        '4.2  Is multi-factor authentication enforced for all remote access?   [ ] Yes  [ ] No',
        '§12.3  Out of scope: email backup, line-of-business applications, website hosting',
        'AWS monthly: $14,212   change vs. last month: +38%   owner: (none)',
        '7.1  Describe your backup retention and restore testing schedule.',
        'Vendor: CloudCRM   seats: 85   active users: 31   renewal: 03/2027',
        'Q18  Has the company experienced a security incident in the past 36 months?',
        'Exhibit B  Response times: Priority 1 within 4 business hours',
        'Help desk AI pilot   data access: full mailbox   approved by: (blank)',
        '9.4  List all third parties with access to customer data.',
        'Insurance app §4  Are offline backups tested at least quarterly?',
        'Domain renewals: 3 domains   registrar login: former employee',
        '2.6  Provide your most recent penetration test summary.',
        'Laptop fleet: 42   encrypted: unknown   MDM: partial',
        '§8.1  Client responsibilities: maintain current backups of all data',
        'Q31  Who is responsible for information security? Name and title.',
        'Customer portal v2   built by: contractor   last security review: never',
    ];
    $field = collect(range(1, 3))->flatMap(fn () => $rows)->all();
@endphp
<div class="ng-lens-hero relative isolate overflow-hidden">
    {{-- Paper field: blurred everywhere --}}
    <div aria-hidden="true" class="ng-field ng-field-blur pointer-events-none absolute inset-0 -z-10">
        @foreach ($field as $i => $r)
            <p style="padding-left: {{ ($i * 37) % 9 }}rem">{{ $r }}</p>
        @endforeach
    </div>
    {{-- Paper field: sharp, clipped to the lens --}}
    <div aria-hidden="true" class="ng-field ng-field-sharp pointer-events-none absolute inset-0 -z-10">
        @foreach ($field as $i => $r)
            <p style="padding-left: {{ ($i * 37) % 9 }}rem">{{ $r }}</p>
        @endforeach
    </div>
    {{-- Fade the field out under the headline so the copy stays readable --}}
    <div aria-hidden="true" class="ng-veil pointer-events-none absolute inset-0 -z-10"></div>

    {{-- The lens: double ring and bezel ticks --}}
    <div aria-hidden="true" class="ng-lens pointer-events-none absolute -z-10">
        <svg viewBox="0 0 200 200" class="size-full overflow-visible">
            <circle cx="100" cy="100" r="99" class="fill-none stroke-star-400" stroke-width="1.1" />
            <circle cx="100" cy="100" r="93" class="fill-none stroke-star-400/40" stroke-width="0.5" />
            @for ($a = 0; $a < 360; $a += 6)
                @php $long = $a % 30 === 0; $r1 = 99; $r2 = $long ? 104 : 101.5; $rad = deg2rad($a); @endphp
                <line x1="{{ round(100 + $r1 * cos($rad), 2) }}" y1="{{ round(100 + $r1 * sin($rad), 2) }}"
                      x2="{{ round(100 + $r2 * cos($rad), 2) }}" y2="{{ round(100 + $r2 * sin($rad), 2) }}"
                      class="stroke-star-400{{ $long ? '' : '/50' }}" stroke-width="{{ $long ? 0.9 : 0.5 }}" />
            @endfor
        </svg>
        {{-- What the lens found --}}
        <div class="ng-found absolute top-1/2 left-1/2 w-[72%] -translate-x-1/2 -translate-y-1/2 rounded-2xl bg-night-900/95 p-4 text-left shadow-2xl ring-1 ring-star-400/60 sm:p-5">
            <p class="text-[0.6rem] font-semibold tracking-[0.2em] text-star-400 uppercase">Found: one gap</p>
            <p class="mt-1 font-display text-base/6 font-semibold text-white sm:text-lg/6">Backups: no owner</p>
            <ul class="mt-3 space-y-1.5 text-xs/5 text-night-300">
                <li class="flex gap-x-2"><span class="text-star-400">&rarr;</span> Insurance app &sect;4: can&rsquo;t answer</li>
                <li class="flex gap-x-2"><span class="text-star-400">&rarr;</span> Questionnaire 7.1: stalled</li>
                <li class="flex gap-x-2"><span class="text-star-400">&rarr;</span> IT contract &sect;12.3: out of scope</li>
            </ul>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 pt-28 pb-[26rem] sm:pt-36 lg:px-8 lg:pt-44 lg:pb-40">
        <div class="max-w-2xl lg:max-w-xl xl:max-w-2xl">
            <div class="flex">
                <div class="relative rounded-full bg-night-950/70 px-3 py-1 text-sm/6 text-night-300 ring-1 ring-white/10 backdrop-blur-sm">
                    Fractional CTO and CISO <span class="mx-1 text-star-400" aria-hidden="true">&middot;</span> Raleigh, NC
                </div>
            </div>
            <h1 class="mt-8 font-display text-5xl font-semibold tracking-tight text-pretty text-white sm:text-6xl xl:text-7xl">Answer the technology and security questions you can&rsquo;t answer <span class="whitespace-nowrap text-star-400">in-house.</span></h1>
            <p class="mt-8 text-lg font-medium text-pretty text-night-300 sm:text-xl/8">{{ $page->tagline }}</p>
            <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
                <a href="{{ $page->bookingUrl }}" class="ng-btn rounded-md bg-star-400 px-4 py-2.5 text-sm font-semibold text-night-950 shadow-xs hover:bg-star-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-star-400">Book a 30-minute call</a>
                <a href="#diagnostic" class="text-sm/6 font-semibold text-white hover:text-star-300">How the diagnostic works <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </div>
</div>
