@props(['products'])

<section id="products" class="py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="reveal mb-12 max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#E4572E]">Produk dan Layanan</p>
            <h2 class="mt-3 font-display text-4xl font-black leading-tight sm:text-5xl">Pesan Sekarang</h2>
        </div>

        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($products as $product)
                <article class="reveal group overflow-hidden rounded-3xl border border-[#1A1A1A]/10 bg-white transition duration-300 hover:-translate-y-1 hover:bg-[#E4572E] hover:text-white">
                    <div class="aspect-video overflow-hidden bg-linear-to-br from-[#E4572E]/80 via-[#FF8C42]/90 to-[#ffd6bc]">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-display text-2xl font-bold">{{ $product->title }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-[#1A1A1A]/70 transition group-hover:text-white/85">{{ $product->description }}</p>
                        <div class="mt-6 flex items-center justify-between">
                            @if (! is_null($product->price))
                                <p class="text-sm font-semibold">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>
                            @else
                                <span></span>
                            @endif
                            <a href="#cta" class="rounded-full border border-current px-4 py-2 text-xs font-semibold uppercase tracking-wide transition duration-300 group-hover:scale-105">Order Now</a>
                        </div>
                    </div>
                </article>
            @empty
                @foreach (range(1, 3) as $item)
                    <article class="reveal group overflow-hidden rounded-3xl border border-[#1A1A1A]/10 bg-white transition duration-300 hover:-translate-y-1 hover:bg-[#E4572E] hover:text-white">
                        <div class="aspect-video bg-linear-to-br from-[#E4572E]/80 via-[#FF8C42]/90 to-[#ffd6bc]"></div>
                        <div class="p-6">
                            <h3 class="font-display text-2xl font-bold">Creative Package {{ $item }}</h3>
                            <p class="mt-3 text-sm leading-relaxed text-[#1A1A1A]/70 transition group-hover:text-white/85">Paket layanan fleksibel untuk kebutuhan branding, konten visual, dan promosi digital.</p>
                            <div class="mt-6 flex items-center justify-between">
                                <p class="text-sm font-semibold">Start From Rp 350.000</p>
                                <a href="#cta" class="rounded-full border border-current px-4 py-2 text-xs font-semibold uppercase tracking-wide transition duration-300 group-hover:scale-105">Order Now</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @endforelse
        </div>
    </div>
</section>
