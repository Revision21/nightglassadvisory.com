{{-- Tailwind Plus: Marketing / Content Sections / Split with image (dark, v4); photo moved to the hero 2026-10-12, so the image column is gone. --}}
<section id="about" class="relative bg-night-900">
    <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-star-400/30 to-transparent"></div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div>
            <div class="mx-auto max-w-3xl py-24 sm:py-32">
                <p class="text-base/7 font-semibold text-star-400">About</p>
                <h2 class="mt-2 font-display text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">I&rsquo;m Mike Faas.</h2>
                <p class="mt-6 text-xl/8 text-night-200">I translate how systems behave into decisions a founder can make.</p>
                <div class="mt-10 text-base/7 text-night-300">
                    <p>I&rsquo;ve spent 25 years leading technology and security at companies from 50 people to 5,000: through acquisitions, building teams of up to 30, and finding six-figure savings along the way.</p>
                    <ul role="list" class="mt-8 space-y-8 text-night-300">
                        <li class="flex gap-x-3">
                            @include('_partials.icon', ['name' => 'arrows-right-left', 'set' => '20/solid', 'class' => 'mt-1 size-5 flex-none text-star-400'])
                            <span><strong class="font-semibold text-white">Both chairs.</strong> Most companies get technology advice from one person and security advice from another, and then the two disagree. I sit in both, so the technology plan and the security plan are the same plan.</span>
                        </li>
                        <li class="flex gap-x-3">
                            @include('_partials.icon', ['name' => 'eye', 'set' => '20/solid', 'class' => 'mt-1 size-5 flex-none text-star-400'])
                            <span><strong class="font-semibold text-white">Wide field, low magnification.</strong> I look across the whole company before I zoom in, because the problem is rarely where it first shows up.</span>
                        </li>
                        <li class="flex gap-x-3">
                            @include('_partials.icon', ['name' => 'chat-bubble-left-right', 'set' => '20/solid', 'class' => 'mt-1 size-5 flex-none text-star-400'])
                            <span><strong class="font-semibold text-white">No jargon in the readout.</strong> If I can&rsquo;t explain it to your CFO in five minutes, I haven&rsquo;t finished the work.</span>
                        </li>
                        <li class="flex gap-x-3">
                            @include('_partials.icon', ['name' => 'shield-check', 'set' => '20/solid', 'class' => 'mt-1 size-5 flex-none text-star-400'])
                            <span><strong class="font-semibold text-white">CISSP, based in Raleigh.</strong> Most of the work happens remotely. In the Triangle, I&rsquo;m glad to meet in person.</span>
                        </li>
                    </ul>
                    <p class="mt-8"><a href="{{ $page->linkedin }}" class="font-semibold text-star-400 hover:text-star-300">Find me on LinkedIn <span aria-hidden="true">&rarr;</span></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
