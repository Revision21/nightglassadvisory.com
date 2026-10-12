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

<body class="st-body relative isolate flex min-h-full flex-col">
    {{-- Studio's page-top background: the angled block grid, fading out toward the bottom left. --}}
    @include('_partials.studio-grid', ['id' => 'st-grid-top', 'y' => -96, 'interactive' => true, 'class' => 'pointer-events-none absolute inset-x-0 top-0 -z-10 h-[1000px] w-full mask-[linear-gradient(to_bottom_left,white_40%,transparent_50%)] fill-st-wash stroke-st-ink/[0.06]'])
    <header class="relative z-40">
        <div class="mx-auto max-w-7xl px-6 pt-10 lg:px-8">
            <div class="flex items-center justify-between">
                <a href="/studio" aria-label="Home" class="st-display text-lg font-semibold tracking-[0.18em] text-st-ink uppercase">Night<span class="text-st-gold-ink">glass</span></a>
                <div class="flex items-center gap-x-8">
                    <nav class="hidden items-center gap-x-8 md:flex" aria-label="Main">
                        @foreach ($nav as $item)
                            <a href="{{ $item['href'] }}" class="text-sm font-semibold text-st-ink transition hover:text-st-gold-ink">{{ $item['label'] }}</a>
                        @endforeach
                    </nav>
                    <a href="{{ $page->bookingUrl }}" class="inline-flex rounded-full bg-st-ink px-4 py-1.5 text-sm font-semibold text-st-page transition hover:bg-st-panel-2"><span class="relative top-px">Book a call</span></a>
                    <div class="relative md:hidden">
                        <button type="button" command="--toggle" commandfor="st-menu" aria-label="Toggle navigation" class="-m-2.5 rounded-full p-2.5 transition hover:bg-st-ink/10">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-st-ink"><path d="M2 6h20v2H2zM2 16h20v2H2z" /></svg>
                        </button>
                        <el-disclosure id="st-menu" hidden>
                            <nav class="absolute right-0 top-full z-50 mt-4 w-56 rounded-2xl bg-st-page p-2 shadow-xl ring-1 ring-st-ink/10" aria-label="Mobile">
                                @foreach ($nav as $item)
                                    <a href="{{ $item['href'] }}" command="--toggle" commandfor="st-menu" class="block rounded-lg px-3 py-2 text-sm font-semibold text-st-ink hover:bg-st-wash">{{ $item['label'] }}</a>
                                @endforeach
                            </nav>
                        </el-disclosure>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        // Studio's interactive grid: the block under the cursor flashes and fades (port of GridPattern.jsx).
        (function () {
            if (matchMedia('(prefers-reduced-motion: reduce)').matches) return;
            var D = "M45.119 4.5a11.5 11.5 0 0 0-11.277 9.245l-25.6 128C6.82 148.861 12.262 155.5 19.52 155.5h63.366a11.5 11.5 0 0 0 11.277-9.245l25.6-128c1.423-7.116-4.02-13.755-11.277-13.755H45.119Z";
            document.querySelectorAll('[data-st-grid]').forEach(function (svg) {
                var layer = svg.querySelector('[data-st-blocks]'), yOff = +svg.dataset.y, last = '';
                window.addEventListener('mousemove', function (ev) {
                    var r = svg.getBoundingClientRect(), x = ev.clientX - r.left, y = ev.clientY - r.top;
                    if (x < 0 || y < 0 || x > r.width || y > r.height) return;
                    x = x - r.width / 2 - 32; y = y - yOff; x += Math.tan(32 / 160) * y;
                    x = Math.floor(x / 96); y = Math.floor(y / 160);
                    var key = x + ',' + y; if (key === last) return; last = key;
                    var p = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    p.setAttribute('d', D); p.setAttribute('transform', 'translate(' + (-32 * y + 96 * x) + ' ' + (160 * y) + ')');
                    p.style.transition = 'opacity 1s linear'; p.style.opacity = '1';
                    layer.appendChild(p);
                    requestAnimationFrame(function () { requestAnimationFrame(function () { p.style.opacity = '0'; }); });
                    setTimeout(function () { p.remove(); }, 1100);
                });
            });
        })();
    </script>
    <script type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
</body>

</html>
