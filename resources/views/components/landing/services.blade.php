<section id="services" class="relative py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="reveal mb-12 max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#E4572E]">Layanan</p>
            <h2 class="mt-3 font-display text-4xl font-black leading-tight sm:text-5xl">Layanan Kreatif yang Kami Tawarkan</h2>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['icon' => '✦', 'title' => 'Graphic Design', 'desc' => 'Brand identity, poster, social media visual, dan kemasan visual modern.'],
                ['icon' => '▶', 'title' => 'Video Editing', 'desc' => 'Konten reel, profil, teaser event, dan storytelling video yang dinamis.'],
                ['icon' => '◉', 'title' => 'Photography', 'desc' => 'Foto produk, dokumentasi event, portrait, dan visual campaign profesional.'],
                ['icon' => '▣', 'title' => 'Merchandise', 'desc' => 'Desain merchandise, branding, dan produk promosi yang menarik.'],
            ] as $service)
                <article class="reveal group rounded-3xl border border-[#1A1A1A]/10 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:scale-[1.02] hover:border-[#E4572E]/40 hover:shadow-[0_20px_45px_-25px_rgba(228,87,46,0.7)]">
                    <div class="mb-5 inline-flex h-11 w-11 items-center justify-center rounded-full bg-[#E4572E]/10 text-xl text-[#E4572E] transition group-hover:bg-[#E4572E] group-hover:text-white">{{ $service['icon'] }}</div>
                    <h3 class="font-display text-2xl font-bold">{{ $service['title'] }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-[#1A1A1A]/70">{{ $service['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
