{{-- Tailwind Plus: Marketing / Footers / Simple centered (dark, v4) --}}
<footer class="bg-night-950 border-t border-white/5">
    <div class="mx-auto max-w-7xl overflow-hidden px-6 py-16 sm:py-20 lg:px-8">
        <nav aria-label="Footer" class="-mb-6 flex flex-wrap justify-center gap-x-12 gap-y-3 text-sm/6">
            <a href="/#cascade" class="text-night-400 hover:text-white">Why</a>
            <a href="/#diagnostic" class="text-night-400 hover:text-white">The Diagnostic</a>
            <a href="/#about" class="text-night-400 hover:text-white">About</a>
            <a href="/#faq" class="text-night-400 hover:text-white">FAQ</a>
        </nav>
        <div class="mt-12 flex justify-center gap-x-10">
            <a href="{{ $page->linkedin }}" class="text-night-400 hover:text-white">
                <span class="sr-only">LinkedIn</span>
                <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" class="size-6"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12ZM7.12 20.45H3.56V9h3.56v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0Z"/></svg>
            </a>
            <a href="mailto:{{ $page->email }}" class="text-night-400 hover:text-white">
                <span class="sr-only">Email</span>
                @include('_partials.icon', ['name' => 'envelope'])
            </a>
        </div>
        {{-- DECISION (Mike): legal line. DBA/rename isn't filed until build step 5. --}}
        <p class="mt-10 text-center text-sm/6 text-night-400">&copy; {{ date('Y') }} Nightglass Advisory. Raleigh, North Carolina.</p>
    </div>
</footer>
