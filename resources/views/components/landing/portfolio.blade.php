<section id="portfolio" class="relative bg-[#fffaf7] py-24">
    <div class="pointer-events-none absolute left-1/2 top-0 h-44 w-44 -translate-x-1/2 rounded-full bg-[#FF8C42]/20 blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="reveal mb-12 flex items-end justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#E4572E]">Portfolio</p>
                <h2 class="mt-3 font-display text-4xl font-black leading-tight sm:text-5xl">Work That Speaks Louder</h2>
            </div>
            <p class="max-w-md text-sm leading-relaxed text-[#1A1A1A]/70">Eksplorasi proyek visual kami dengan layout asimetris yang menampilkan karakter unik tiap karya.</p>
        </div>

        <div class="grid auto-rows-[170px] grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['title' => 'Brand Refresh', 'category' => 'Graphic Design', 'span' => 'lg:col-span-2 lg:row-span-2'],
                ['title' => 'Campus Story', 'category' => 'Video', 'span' => 'lg:col-span-1 lg:row-span-1'],
                ['title' => 'Portrait Session', 'category' => 'Photography', 'span' => 'lg:col-span-1 lg:row-span-2'],
                ['title' => 'App Prototype', 'category' => 'UI/UX', 'span' => 'lg:col-span-1 lg:row-span-1'],
                ['title' => 'Campaign Poster', 'category' => 'Visual Campaign', 'span' => 'lg:col-span-2 lg:row-span-1'],
            ] as $item)
                <article class="reveal group relative overflow-hidden rounded-3xl {{ $item['span'] }}">
                    <div class="h-full w-full bg-gradient-to-br from-[#1A1A1A] via-[#E4572E] to-[#FF8C42]"></div>
                    <div class="absolute inset-0 bg-black/20 transition duration-300 group-hover:bg-black/45"></div>
                    <div class="absolute inset-x-0 bottom-0 translate-y-8 p-6 text-white opacity-0 transition duration-500 group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-xs uppercase tracking-[0.15em] text-white/70">{{ $item['category'] }}</p>
                        <h3 class="mt-2 font-display text-2xl font-bold">{{ $item['title'] }}</h3>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
