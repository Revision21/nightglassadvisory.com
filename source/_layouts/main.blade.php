<!DOCTYPE html>
<html lang="en" class="scroll-smooth bg-night-950">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName . ' | Fractional CTO and CISO for founder-led companies' }}</title>
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">
    @if ($page->noindex)
    <meta name="robots" content="noindex, nofollow">
    @endif
    <link rel="canonical" href="{{ $page->getUrl() }}">

    <meta property="og:site_name" content="{{ $page->siteName }}">
    <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $page->getUrl() }}">
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}">
    <meta name="twitter:card" content="summary">

    @include('_partials.schema')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

    @viteRefresh()
    <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
</head>

<body class="font-sans">
    @yield('body')

    <script type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
</body>

</html>
