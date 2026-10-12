{{-- Tailwind Plus: Marketing / FAQs / Centered accordion (dark, v4) + Elements disclosure --}}
<section id="faq" class="bg-night-950">
    <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 lg:py-40">
        <div class="mx-auto max-w-4xl">
            <h2 class="font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl">Questions founders ask</h2>
            <dl class="mt-16 divide-y divide-white/10">
                @foreach ($page->faqs as $i => $f)
                    <div class="py-6 first:pt-0 last:pb-0">
                        <dt>
                            <button type="button" command="--toggle" commandfor="faq-{{ $i }}" class="flex w-full items-start justify-between text-left text-white">
                                <span class="text-base/7 font-semibold">{{ $f['q'] }}</span>
                                <span class="ml-6 flex h-7 items-center text-star-400">
                                    @include('_partials.icon', ['name' => 'plus-small', 'class' => 'size-6 in-aria-expanded:hidden'])
                                    @include('_partials.icon', ['name' => 'minus-small', 'class' => 'size-6 not-in-aria-expanded:hidden'])
                                </span>
                            </button>
                        </dt>
                        <el-disclosure id="faq-{{ $i }}" hidden class="contents">
                            <dd class="mt-2 pr-12">
                                <p class="text-base/7 text-night-300">{{ $f['a'] }}</p>
                            </dd>
                        </el-disclosure>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>
