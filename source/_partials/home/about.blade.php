{{-- Tailwind Plus: Marketing / Content Sections / Split with image (dark, v4) --}}
<section id="about" class="relative bg-night-900">
    <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-star-400/30 to-transparent"></div>
    <div class="mx-auto max-w-7xl lg:flex lg:justify-between lg:px-8 xl:justify-end">
        <div class="lg:flex lg:w-1/2 lg:shrink lg:grow-0 xl:absolute xl:inset-y-0 xl:right-1/2 xl:w-1/2">
            <div class="relative h-96 lg:-ml-8 lg:h-auto lg:w-full lg:grow xl:ml-0">
                <img src="/assets/img/mike-faas.jpg" alt="Mike Faas" class="absolute inset-0 size-full bg-night-800 object-cover object-[50%_25%]" loading="lazy" />
                <div class="absolute inset-0 bg-linear-to-t from-night-900/60 via-transparent to-transparent lg:bg-linear-to-l lg:from-night-900/70"></div>
            </div>
        </div>
        <div class="px-6 lg:contents">
            <div class="mx-auto max-w-2xl pt-16 pb-24 sm:pt-20 sm:pb-32 lg:mr-0 lg:ml-8 lg:w-full lg:max-w-lg lg:flex-none lg:pt-32 xl:w-1/2">
                <p class="text-base/7 font-semibold text-star-400">About</p>
                <h2 class="mt-2 font-display text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">I&rsquo;m Mike Faas.</h2>
                <p class="mt-6 text-xl/8 text-night-200">I translate how systems behave into decisions a founder can make.</p>
                <div class="mt-10 max-w-xl text-base/7 text-night-300 lg:max-w-none">
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
