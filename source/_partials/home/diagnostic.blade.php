{{-- Tailwind Plus: Marketing / Stats / Timeline (steps) + Pricing Sections / Single price with details (dark, v4) --}}
<section id="diagnostic" class="bg-night-950 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-4xl sm:text-center">
            <h2 class="text-base/7 font-semibold text-star-400">{{ $page->diagnostic['name'] }}</h2>
            <p class="mt-2 font-display text-5xl font-semibold tracking-tight text-pretty text-white sm:text-6xl sm:text-balance">Three weeks. Fixed price. A clear answer.</p>
            <p class="mx-auto mt-6 max-w-2xl text-lg font-medium text-pretty text-night-300 sm:text-xl/8">Start with the question that&rsquo;s keeping you up, technology or security. Leave with the answer, and a plan for everything it touches.</p>
        </div>

        {{-- Timeline --}}
        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 overflow-hidden lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($page->steps as $s)
                <div>
                    <p class="flex items-center text-sm/6 font-semibold text-star-400">
                        <svg viewBox="0 0 4 4" aria-hidden="true" class="mr-4 size-1 flex-none"><circle r="2" cx="2" cy="2" fill="currentColor" /></svg>
                        {{ $s['week'] }}
                        <span aria-hidden="true" class="absolute -ml-2 h-px w-screen -translate-x-full bg-white/15 sm:-ml-4 lg:static lg:-mr-6 lg:ml-8 lg:w-auto lg:flex-auto lg:translate-x-0"></span>
                    </p>
                    <p class="mt-6 font-display text-lg/8 font-semibold tracking-tight text-white">{{ $s['title'] }}</p>
                    <p class="mt-1 text-base/7 text-night-300">{{ $s['body'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Price card --}}
        <div class="mx-auto mt-16 max-w-2xl rounded-3xl bg-night-900/60 ring-1 ring-white/10 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
                <h3 class="font-display text-3xl font-semibold tracking-tight text-white">What you walk away with</h3>
                <p class="mt-6 text-base/7 text-night-300">No retainer to start and no open-ended hours. One engagement, one price, agreed before we begin.</p>
                <div class="mt-10 flex items-center gap-x-4">
                    <h4 class="flex-none text-sm/6 font-semibold text-star-400">What&rsquo;s included</h4>
                    <div class="h-px flex-auto bg-white/10"></div>
                </div>
                <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm/6 text-night-200 sm:grid-cols-2 sm:gap-6">
                    @foreach ($page->included as $item)
                        <li class="flex gap-x-3">
                            @include('_partials.icon', ['name' => 'check', 'set' => '20/solid', 'class' => 'h-6 w-5 flex-none text-star-400'])
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:shrink-0">
                <div class="rounded-2xl bg-night-950 py-10 text-center inset-ring inset-ring-white/10 lg:flex lg:flex-col lg:justify-center lg:py-16">
                    <div class="mx-auto max-w-xs px-8">
                        <p class="text-base font-semibold text-night-300">{{ $page->diagnostic['weeks'] }} weeks, start to readout</p>
                        <p class="mt-6 flex items-baseline justify-center gap-x-2">
                            <span class="font-display text-5xl font-semibold tracking-tight text-white">{{ $page->diagnostic['priceLabel'] }}</span>
                            <span class="text-sm/6 font-semibold tracking-wide text-night-400">USD, fixed</span>
                        </p>
                        <a href="{{ $page->bookingUrl }}" class="ng-btn mt-10 block w-full rounded-md bg-star-400 px-3 py-2 text-center text-sm font-semibold text-night-950 hover:bg-star-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-star-400">Start with a 30-minute call</a>
                        <p class="mt-6 text-xs/5 text-night-400">The call is free. If the diagnostic isn&rsquo;t the right fit, I&rsquo;ll tell you, and point you to who is.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
