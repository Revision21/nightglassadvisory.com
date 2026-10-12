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

    @if (($page->hero ?? 'portrait') === 'lens')
        @include('_partials.hero-lens')
    @else
        @include('_partials.hero-portrait')
    @endif
</div>
