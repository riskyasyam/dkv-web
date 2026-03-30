<section id="home" class="relative min-h-screen overflow-hidden pt-28">
    <div class="pointer-events-none absolute -left-16 top-24 h-60 w-60 rounded-full bg-[#E4572E]/20 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-0 h-72 w-72 rounded-full bg-linear-to-b from-[#FF8C42]/50 to-transparent blur-3xl"></div>

    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 pb-20 pt-14 lg:grid-cols-2 lg:px-8">
        <div class="reveal">
            <p class="mb-5 inline-flex items-center gap-2 rounded-full border border-[#E4572E]/20 bg-[#E4572E]/5 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-[#E4572E]">
                Produk Jurusan DKV SMKN 4 Jember
            </p>
            <h1 class="font-display text-5xl font-black leading-[0.95] text-[#1A1A1A] sm:text-6xl lg:text-8xl">
                Jelajahi
                <span class="block text-gradient-orange">Produk DKV</span>
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-relaxed text-[#1A1A1A]/75 sm:text-lg">
                DKV SMKN 4 Jember adalah studio kreatif muda yang merancang fotografi, videografi, desain grafis dan merchandise dengan sentuhan inovatif, menggabungkan estetika modern dan keahlian teknis untuk menciptakan karya yang memukau dan berdampak.
            </p>
            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#portfolio" class="inline-flex items-center rounded-full bg-[#E4572E] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:scale-105 hover:bg-[#FF8C42]">Explore Works</a>
                <a href="#cta" class="inline-flex items-center rounded-full border border-[#1A1A1A]/20 px-7 py-3 text-sm font-semibold text-[#1A1A1A] transition duration-300 hover:scale-105 hover:border-[#E4572E] hover:text-[#E4572E]">Hire Us</a>
            </div>
        </div>

        <div class="reveal relative" x-data="heroCarousel()" x-init="init()">
            <div class="relative z-10 w-full overflow-hidden rounded-[1.4rem] shadow-[0_25px_80px_-30px_rgba(228,87,46,0.55)]">
                <div class="relative aspect-16/9 overflow-hidden">
                    <template x-for="(image, index) in images" :key="index">
                        <img
                            :src="image"
                            :alt="`Showcase DKV ${index + 1}`"
                            class="absolute inset-0 h-full w-full object-cover transition-opacity duration-500"
                            :class="index === currentSlide ? 'opacity-100' : 'opacity-0'"
                        >
                    </template>
                    <div class="pointer-events-none absolute inset-0 bg-linear-to-t from-[#1A1A1A]/40 via-transparent to-transparent"></div>
                    
                    <!-- Tombol Prev -->
                    <button
                        @click="prev()"
                        class="absolute left-4 top-1/2 z-20 -translate-y-1/2 rounded-full bg-white/30 p-2 backdrop-blur-sm transition hover:bg-white/50"
                    >
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Tombol Next -->
                    <button
                        @click="next()"
                        class="absolute right-4 top-1/2 z-20 -translate-y-1/2 rounded-full bg-white/30 p-2 backdrop-blur-sm transition hover:bg-white/50"
                    >
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    
                    <!-- Dots Indicator -->
                    <div class="absolute bottom-4 left-1/2 z-20 flex -translate-x-1/2 gap-2">
                        <template x-for="(_, index) in images" :key="index">
                            <button
                                @click="currentSlide = index"
                                :class="index === currentSlide ? 'bg-white' : 'bg-white/50'"
                                class="h-2 w-2 rounded-full transition"
                            ></button>
                        </template>
                    </div>
                </div>
            </div>
            <div class="float-shape absolute -bottom-8 -left-10 -z-10 h-32 w-32 rounded-full border border-[#E4572E]/30 bg-[#FF8C42]/15"></div>
        </div>
    </div>

    <script>
        function heroCarousel() {
            return {
                currentSlide: 0,
                images: [
                    "{{ asset('images/hero.jpeg') }}",
                    "{{ asset('images/hero1.jpeg') }}",
                    "{{ asset('images/hero2.jpeg') }}"
                ],
                init() {
                    this.autoRotate();
                },
                next() {
                    this.currentSlide = (this.currentSlide + 1) % this.images.length;
                },
                prev() {
                    this.currentSlide = (this.currentSlide - 1 + this.images.length) % this.images.length;
                },
                autoRotate() {
                    setInterval(() => {
                        this.next();
                    }, 5000);
                }
            }
        }
    </script>
</section>
