@php
    $nav = [
        ['label' => 'Why', 'href' => '/#why'],
        ['label' => 'Diagnostic', 'href' => '/#diagnostic'],
        ['label' => 'About', 'href' => '/#about'],
        ['label' => 'FAQ', 'href' => '/#faq'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth antialiased">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName . ' | Fractional CTO and CISO for founder-led companies' }}</title>
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">
    <link rel="canonical" href="{{ $page->getUrl() }}">
    <meta property="og:site_name" content="{{ $page->siteName }}">
    <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $page->getUrl() }}">
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}">
    <meta name="twitter:card" content="summary">

    {{-- Theme before first paint: saved choice, then ?theme=, then the visitor's system setting. --}}
    <script>(function(){try{var q=new URLSearchParams(location.search).get('theme');var s=localStorage.getItem('ng-theme');var t=q||s||(matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light');document.documentElement.dataset.theme=t;}catch(e){document.documentElement.dataset.theme='light';}})();</script>

    @include('_partials.schema')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">

    @viteRefresh()
    <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
</head>

<body class="sp-body flex h-full">
    <div class="flex w-full">
        {{-- The paper column --}}
        <div class="fixed inset-0 flex justify-center sm:px-8">
            <div class="flex w-full max-w-7xl lg:px-8">
                <div class="w-full bg-sp-paper ring-1 ring-sp-line"></div>
            </div>
        </div>

        <div class="relative flex w-full flex-col">
            {{-- Header: avatar, pill nav, theme toggle --}}
            <header class="pointer-events-none sticky top-0 z-50 pt-6">
                <div class="sm:px-8"><div class="mx-auto w-full max-w-7xl lg:px-8"><div class="relative px-4 sm:px-8 lg:px-12"><div class="mx-auto max-w-2xl lg:max-w-5xl">
                    <div class="relative flex gap-4">
                        <div class="flex flex-1">
                            <a href="/" aria-label="Home" class="pointer-events-auto h-10 w-10 rounded-full bg-sp-pill p-0.5 shadow-lg ring-1 shadow-black/5 ring-sp-ink/10 backdrop-blur-sm">
                                <img src="/assets/img/mike-faas-square.jpg" alt="" class="h-9 w-9 rounded-full bg-sp-raise object-cover">
                            </a>
                        </div>
                        <div class="flex flex-1 justify-end md:justify-center">
                            {{-- Mobile menu (Tailwind Plus Elements dialog) --}}
                            <button type="button" command="show-modal" commandfor="sp-mobile-nav" class="pointer-events-auto flex items-center rounded-full bg-sp-pill px-4 py-2 text-sm font-medium text-sp-ink shadow-lg ring-1 shadow-black/5 ring-sp-ink/10 backdrop-blur-sm md:hidden">
                                Menu
                                <svg viewBox="0 0 8 6" aria-hidden="true" class="ml-3 h-auto w-2 stroke-sp-muted"><path d="M1.75 1.75 4 4.25l2.25-2.5" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </button>
                            <nav class="pointer-events-auto hidden md:block" aria-label="Main">
                                <ul class="flex rounded-full bg-sp-pill px-3 text-sm font-medium text-sp-ink shadow-lg ring-1 shadow-black/5 ring-sp-ink/10 backdrop-blur-sm">
                                    @foreach ($nav as $item)
                                        <li><a href="{{ $item['href'] }}" class="relative block px-3 py-2 whitespace-nowrap transition hover:text-sp-accent">{{ $item['label'] }}</a></li>
                                    @endforeach
                                    <li><a href="{{ $page->bookingUrl }}" class="relative block px-3 py-2 whitespace-nowrap text-sp-accent transition hover:opacity-80">Book a call<span class="absolute inset-x-1 -bottom-px h-px bg-linear-to-r from-sp-gold/0 via-sp-gold/70 to-sp-gold/0"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="flex justify-end md:flex-1">
                            <div class="pointer-events-auto">
                                <button type="button" id="sp-theme-toggle" aria-label="Toggle light and dark theme" class="group rounded-full bg-sp-pill px-3 py-2 shadow-lg ring-1 shadow-black/5 ring-sp-ink/10 backdrop-blur-sm transition">
                                    <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="sp-sun h-6 w-6 fill-sp-raise stroke-sp-muted transition group-hover:stroke-sp-accent"><path d="M8 12.25A4.25 4.25 0 0 1 12.25 8v0a4.25 4.25 0 0 1 4.25 4.25v0a4.25 4.25 0 0 1-4.25 4.25v0A4.25 4.25 0 0 1 8 12.25v0Z" /><path d="M12.25 3v1.5M21.5 12.25H20M18.791 18.791l-1.06-1.06M18.791 5.709l-1.06 1.06M12.25 20v1.5M4.5 12.25H3M6.77 6.77 5.709 5.709M6.77 17.73l-1.061 1.061" fill="none" /></svg>
                                    <svg viewBox="0 0 24 24" aria-hidden="true" class="sp-moon h-6 w-6 fill-sp-gold/10 stroke-sp-gold transition"><path d="M17.25 16.22a6.937 6.937 0 0 1-9.47-9.47 7.451 7.451 0 1 0 9.47 9.47ZM12.75 7C17 7 17 2.75 17 2.75S17 7 21.25 7C17 7 17 11.25 17 11.25S17 7 12.75 7Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div></div></div></div>
            </header>

            <el-dialog>
                <dialog id="sp-mobile-nav" class="backdrop:bg-black/40 backdrop:backdrop-blur-xs md:hidden">
                    <el-dialog-panel class="fixed inset-x-4 top-8 z-50 rounded-3xl bg-sp-paper p-8 ring-1 ring-sp-line">
                        <div class="flex flex-row-reverse items-center justify-between">
                            <button type="button" command="close" commandfor="sp-mobile-nav" aria-label="Close menu" class="-m-1 p-1 text-sp-muted">
                                @include('_partials.icon', ['name' => 'x-mark'])
                            </button>
                            <h2 class="text-sm font-medium text-sp-text">Navigation</h2>
                        </div>
                        <nav class="mt-6">
                            <ul class="-my-2 divide-y divide-sp-line text-base text-sp-ink">
                                @foreach ($nav as $item)
                                    <li><a href="{{ $item['href'] }}" command="close" commandfor="sp-mobile-nav" class="block py-2">{{ $item['label'] }}</a></li>
                                @endforeach
                                <li><a href="{{ $page->bookingUrl }}" class="block py-2 font-semibold text-sp-accent">Book a call</a></li>
                            </ul>
                        </nav>
                    </el-dialog-panel>
                </dialog>
            </el-dialog>

            <main class="flex-auto">
                @yield('body')
            </main>

            <footer class="mt-32 flex-none">
                <div class="sm:px-8"><div class="mx-auto w-full max-w-7xl lg:px-8">
                    <div class="border-t border-sp-line pt-10 pb-16">
                        <div class="relative px-4 sm:px-8 lg:px-12"><div class="mx-auto max-w-2xl lg:max-w-5xl">
                            <div class="flex flex-col items-center justify-between gap-6 md:flex-row">
                                <div class="flex flex-wrap justify-center gap-x-6 gap-y-1 text-sm font-medium text-sp-ink">
                                    @foreach ($nav as $item)
                                        <a href="{{ $item['href'] }}" class="transition hover:text-sp-accent">{{ $item['label'] }}</a>
                                    @endforeach
                                    <a href="{{ $page->bookingUrl }}" class="transition hover:text-sp-accent">Book a call</a>
                                </div>
                                {{-- DECISION (Mike): legal line. DBA/rename isn't filed until build step 5. --}}
                                <p class="text-sm text-sp-muted">&copy; {{ date('Y') }} Nightglass Advisory. Raleigh, North Carolina.</p>
                            </div>
                        </div></div>
                    </div>
                </div></div>
            </footer>
        </div>
    </div>

    <script>
        document.getElementById('sp-theme-toggle').addEventListener('click', function () {
            var t = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
            document.documentElement.dataset.theme = t;
            try { localStorage.setItem('ng-theme', t); } catch (e) {}
        });
    </script>
    <script type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
</body>

</html>
