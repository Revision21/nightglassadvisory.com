    {{-- Tailwind Plus: Hero Sections / Split with image, with the cascade diagram as the image --}}
    <div class="relative isolate overflow-hidden">
        @include('_partials.starfield')
        <svg aria-hidden="true" class="absolute inset-0 -z-10 size-full stroke-white/10 mask-[radial-gradient(100%_100%_at_top_right,white,transparent)]">
            <defs>
                <pattern id="ng-hero-grid" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-night-800/40">
                <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" fill="url(#ng-hero-grid)" stroke-width="0" />
        </svg>
        <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-star-500 to-night-500 opacity-25 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 pt-28 pb-20 sm:pt-36 lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-12 lg:px-8 lg:pt-40 lg:pb-28">
            <div class="mx-auto max-w-2xl lg:col-span-7 lg:mx-0">
                <div class="flex">
                    <div class="relative rounded-full px-3 py-1 text-sm/6 text-night-300 ring-1 ring-white/10">
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
            {{-- Portrait (CTOx: "clients are hiring you, not just your skills") --}}
            <div class="relative mx-auto mt-16 w-full max-w-sm lg:col-span-5 lg:mt-0 lg:max-w-none">
                <div aria-hidden="true" class="absolute -inset-4 -z-10 rounded-[2.25rem] bg-linear-to-tr from-star-400/25 via-transparent to-night-500/30 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-3xl ring-1 ring-white/10">
                    <img src="/assets/img/mike-faas.jpg" alt="Mike Faas" class="aspect-4/5 w-full object-cover object-[50%_20%]" />
                    <div class="absolute inset-x-0 bottom-0 h-1/3 bg-linear-to-t from-night-950/80 to-transparent"></div>
                </div>
                <div class="absolute -bottom-6 left-6 right-6 rounded-2xl bg-night-900/90 px-5 py-4 ring-1 ring-white/10 backdrop-blur-md sm:left-auto sm:-right-6 sm:w-72">
                    <p class="font-display text-base font-semibold text-white">Mike Faas</p>
                    <p class="mt-0.5 text-sm text-night-300">Fractional CTO + CISO <span class="text-star-400" aria-hidden="true">&middot;</span> CISSP</p>
                </div>
            </div>
        </div>
    </div>
