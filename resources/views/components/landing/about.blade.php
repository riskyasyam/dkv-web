<section id="about" class="relative py-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-6 lg:grid-cols-12 lg:items-center lg:px-8">
        <div class="reveal relative lg:col-span-5">
            <div class="aspect-[4/5] overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#1A1A1A] via-[#E4572E] to-[#FF8C42] p-8 text-white">
                <p class="text-xs uppercase tracking-[0.2em] text-white/80">About DKV</p>
                <h3 class="mt-4 font-display text-4xl font-black">Young Minds, Sharp Visuals</h3>
                <p class="mt-4 text-sm leading-relaxed text-white/85">Kami menggabungkan rasa ingin tahu, kreativitas, dan skill teknis untuk membuat karya yang relevan dengan industri kreatif hari ini.</p>
            </div>
            <div class="float-shape absolute -right-8 -top-8 h-24 w-24 rounded-full border border-[#E4572E]/40 bg-[#FF8C42]/20"></div>
        </div>

        <div class="reveal lg:col-span-7">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#E4572E]">Who We Are</p>
            <h2 class="mt-3 font-display text-4xl font-black leading-tight sm:text-5xl">DKV SMKN 4 Jember as a Creative Force</h2>
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-[#1A1A1A]/75">Tim kami berisi talenta desain komunikasi visual yang aktif mengerjakan proyek branding, digital content, hingga user interface dengan proses kolaboratif dan hasil yang berdampak.</p>

            <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-4">
                @foreach ([
                    ['number' => '100+', 'label' => 'Works'],
                    ['number' => '45+', 'label' => 'Clients'],
                    ['number' => '12', 'label' => 'Awards'],
                    ['number' => '6', 'label' => 'Years Growing'],
                ] as $stat)
                    <div class="rounded-2xl border border-[#1A1A1A]/10 bg-white p-4 text-center">
                        <p class="font-display text-3xl font-black text-[#E4572E]">{{ $stat['number'] }}</p>
                        <p class="mt-1 text-xs uppercase tracking-wide text-[#1A1A1A]/65">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
