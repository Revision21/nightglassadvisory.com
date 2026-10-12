{{-- Tailwind Plus: Marketing / Hero Sections / Simple centered (dark, v4) + Elements dialog for the mobile menu --}}
@php
    $nav = [
        ['label' => 'Why', 'href' => '#cascade'],
        ['label' => 'The Diagnostic', 'href' => '#diagnostic'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'FAQ', 'href' => '#faq'],
    ];
@endphp
<div class="bg-night-950">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    @include('_partials.wordmark')
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-night-200">
                    <span class="sr-only">Open main menu</span>
                    @include('_partials.icon', ['name' => 'bars-3'])
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                @foreach ($nav as $item)
                    <a href="{{ $item['href'] }}" class="text-sm/6 font-semibold text-white hover:text-star-300">{{ $item['label'] }}</a>
                @endforeach
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{ $page->bookingUrl }}" class="rounded-md bg-white/10 px-3.5 py-2 text-sm/6 font-semibold text-white inset-ring inset-ring-white/10 hover:bg-white/15">Book a call <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <el-dialog>
            <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                <div tabindex="0" class="fixed inset-0 focus:outline-none">
                    <el-dialog-panel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-night-950 p-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                        <div class="flex items-center justify-between">
                            <a href="/" class="-m-1.5 p-1.5">
                                @include('_partials.wordmark')
                            </a>
                            <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-night-200">
                                <span class="sr-only">Close menu</span>
                                @include('_partials.icon', ['name' => 'x-mark'])
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-white/10">
                                <div class="space-y-2 py-6">
                                    @foreach ($nav as $item)
                                        <a href="{{ $item['href'] }}" command="close" commandfor="mobile-menu" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">{{ $item['label'] }}</a>
                                    @endforeach
                                </div>
                                <div class="py-6">
                                    <a href="{{ $page->bookingUrl }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-star-300 hover:bg-white/5">Book a call</a>
                                </div>
                            </div>
                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    </header>

    <div class="relative isolate overflow-hidden px-6 pt-14 lg:px-8">
        @include('_partials.starfield')
        <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-star-500 to-night-500 opacity-25 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
        </div>
        <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56">
            <div class="mb-8 flex justify-center">
                <div class="relative rounded-full px-3 py-1 text-sm/6 text-night-300 ring-1 ring-white/10">
                    Fractional CTO and CISO <span class="mx-1 text-star-400" aria-hidden="true">&middot;</span> Raleigh, NC
                </div>
            </div>
            <div class="text-center">
                <h1 class="font-display text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl">Answer the technology and security questions you can&rsquo;t answer <span class="text-star-400">in-house.</span></h1>
                <p class="mt-8 text-lg font-medium text-pretty text-night-300 sm:text-xl/8">{{ $page->tagline }}</p>
                <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-4">
                    <a href="{{ $page->bookingUrl }}" class="ng-btn rounded-md bg-star-400 px-4 py-2.5 text-sm font-semibold text-night-950 shadow-xs hover:bg-star-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-star-400">Book a 30-minute call</a>
                    <a href="#diagnostic" class="text-sm/6 font-semibold text-white hover:text-star-300">How the diagnostic works <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-night-500 to-star-600 opacity-20 sm:left-[calc(50%+36rem)] sm:w-288.75"></div>
        </div>
    </div>
</div>
