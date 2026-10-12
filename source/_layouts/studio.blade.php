@php
    $nav = [
        ['label' => 'Why', 'href' => '#why'],
        ['label' => 'The Diagnostic', 'href' => '#diagnostic'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'FAQ', 'href' => '#faq'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth antialiased">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}</title>
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">
    @if ($page->noindex)
    <meta name="robots" content="noindex, nofollow">
    @endif
    <link rel="preload" href="/assets/fonts/Mona-Sans.var.woff2" as="font" type="font/woff2" crossorigin>
    @include('_partials.schema')
    @viteRefresh()
    <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
</head>

<body class="st-body flex min-h-full flex-col">
    <header class="relative z-40">
        <div class="mx-auto max-w-7xl px-6 pt-10 lg:px-8">
            <div class="flex items-center justify-between">
                <a href="/studio" aria-label="Home" class="st-display text-lg font-semibold tracking-[0.18em] text-st-ink uppercase">Night<span class="text-st-gold-ink">glass</span></a>
                <div class="flex items-center gap-x-8">
                    <a href="{{ $page->bookingUrl }}" class="inline-flex rounded-full bg-st-ink px-4 py-1.5 text-sm font-semibold text-st-page transition hover:bg-st-panel-2"><span class="relative top-px">Book a call</span></a>
                    <button type="button" command="--toggle" commandfor="st-menu" aria-label="Toggle navigation" class="group -m-2.5 rounded-full p-2.5 transition hover:bg-st-ink/10">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-st-ink"><path d="M2 6h20v2H2zM2 16h20v2H2z" /></svg>
                    </button>
                </div>
            </div>
        </div>
        <el-disclosure id="st-menu" hidden class="contents">
            <div class="mt-10 bg-st-panel">
                <nav class="st-display mx-auto max-w-7xl px-6 py-14 text-4xl font-medium tracking-tight text-white sm:text-5xl lg:px-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        @foreach ($nav as $item)
                            <a href="{{ $item['href'] }}" command="--toggle" commandfor="st-menu" class="block border-white/10 py-8 transition hover:text-st-gold sm:even:border-l sm:even:pl-16">{{ $item['label'] }}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
        </el-disclosure>
    </header>

    <main class="flex-auto">
        @yield('body')
    </main>

    <footer class="mx-auto mt-24 w-full max-w-7xl px-6 pb-16 sm:mt-32 lg:mt-40 lg:px-8">
        <div class="st-border flex flex-col items-start justify-between gap-6 pt-12 sm:flex-row sm:items-center">
            <a href="/studio" class="st-display text-base font-semibold tracking-[0.18em] text-st-ink uppercase">Night<span class="text-st-gold-ink">glass</span> Advisory</a>
            {{-- DECISION (Mike): legal line. DBA/rename isn't filed until build step 5. --}}
            <p class="text-sm text-st-text">&copy; {{ date('Y') }} Nightglass Advisory. Raleigh, North Carolina.</p>
        </div>
    </footer>

    <script>
        (function () {
            var els = document.querySelectorAll('.st-fade');
            if (!('IntersectionObserver' in window)) { els.forEach(function (e) { e.classList.add('is-in'); }); return; }
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
            }, { rootMargin: '0px 0px -120px 0px' });
            els.forEach(function (e) { io.observe(e); });
        })();
    </script>
    <script type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
</body>

</html>
