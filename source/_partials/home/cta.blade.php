{{-- Tailwind Plus: Marketing / CTA Sections / Centered on dark panel (dark, v4) --}}
<section id="book" class="bg-night-950">
    <div class="mx-auto max-w-7xl pb-24 sm:px-6 sm:pb-32 lg:px-8">
        <div class="relative isolate overflow-hidden bg-night-800 px-6 py-24 text-center after:pointer-events-none after:absolute after:inset-0 after:inset-ring after:inset-ring-white/10 sm:rounded-3xl sm:px-16 after:sm:rounded-3xl">
            <h2 class="font-display text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">Got a questionnaire on your desk?</h2>
            <p class="mx-auto mt-6 max-w-xl text-lg/8 text-pretty text-night-200">Thirty minutes is enough to tell whether the diagnostic fits. If it doesn&rsquo;t, you&rsquo;ll still leave knowing what the question is really asking.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ $page->bookingUrl }}" class="ng-btn rounded-md bg-star-400 px-4 py-2.5 text-sm font-semibold text-night-950 hover:bg-star-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-star-400">Book a 30-minute call</a>
                <a href="mailto:{{ $page->email }}" class="text-sm/6 font-semibold text-white hover:text-star-300">{{ $page->email }} <span aria-hidden="true">&rarr;</span></a>
            </div>
            <svg viewBox="0 0 1024 1024" aria-hidden="true" class="ng-glow absolute top-1/2 left-1/2 -z-10 size-256 -translate-x-1/2 mask-[radial-gradient(closest-side,white,transparent)]">
                <circle r="512" cx="512" cy="512" fill="url(#ng-cta-glow)" fill-opacity="0.55" />
                <defs>
                    <radialGradient id="ng-cta-glow">
                        <stop stop-color="#d6bd7a" />
                        <stop offset="1" stop-color="#3b3f63" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div>
</section>
