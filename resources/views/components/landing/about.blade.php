<section id="about" class="relative py-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-6 lg:grid-cols-12 lg:items-center lg:px-8">
        <div class="reveal relative lg:col-span-5">
            <div class="aspect-[4/5] overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#1A1A1A] via-[#E4572E] to-[#FF8C42] p-8 text-white">
                <p class="text-xs uppercase tracking-[0.2em] text-white/80">About Core V</p>
                <h3 class="mt-4 font-display text-4xl font-black">Creative Production Unit</h3>
                <p class="mt-4 text-sm leading-relaxed text-white/85">Unit produksi kreatif yang menggabungkan kreativitas, inovasi, dan kualitas dalam setiap karya profesional kami.</p>
            </div>
            <div class="float-shape absolute -right-8 -top-8 h-24 w-24 rounded-full border border-[#E4572E]/40 bg-[#FF8C42]/20"></div>
        </div>

        <div class="reveal lg:col-span-7">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#E4572E]">Who We Are</p>
            <h2 class="mt-3 font-display text-4xl font-black leading-tight sm:text-5xl">Core V - DKV SMKN 4 Jember</h2>
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-[#1A1A1A]/75">Core V DKV SMKN 4 Jember adalah unit produksi kreatif yang dikelola oleh jurusan Desain Komunikasi Visual (DKV) SMKN 4 Jember. Hadir sebagai wadah pengembangan keterampilan siswa sekaligus penyedia layanan profesional. Kami menggabungkan kreativitas, inovasi, dan kualitas dalam setiap karya.</p>
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-[#1A1A1A]/75">Kami menyediakan tiga layanan utama, yaitu</p>
            <div class="mt-10 grid grid-cols-3 gap-4">
                @foreach ([
                    ['service' => 'Fotografi', 'desc' => 'Dokumentasi visual profesional'],
                    ['service' => 'Merchandise', 'desc' => 'Produk custom berkualitas'],
                    ['service' => 'Desain Grafis', 'desc' => 'Solusi desain komunikatif'],
                ] as $service)
                    <div class="rounded-2xl border border-[#1A1A1A]/10 bg-white p-4">
                        <p class="font-display text-lg font-black text-[#E4572E]">{{ $service['service'] }}</p>
                        <p class="mt-2 text-xs leading-relaxed text-[#1A1A1A]/65">{{ $service['desc'] }}</p>
                    </div>
                @endforeach
            </div>
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-[#1A1A1A]/75">Dengan semangat berkarya dan belajar, Core V tidak hanya menghasilkan produk, tetapi juga membangun pengalaman nyata bagi siswa untuk siap bersaing di dunia industri kreatif.</p>

        </div>
    </div>
</section>
