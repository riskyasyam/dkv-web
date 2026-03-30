@php
    use App\Models\Portfolio;
    use Illuminate\Support\Facades\Schema;

    $allPortfolios = collect();
    if (Schema::hasTable('portfolios')) {
        $allPortfolios = Portfolio::where('is_published', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    $categoryLayouts = [
        'Graphic Design' => 'lg:col-span-2 lg:row-span-2',
        'Video' => 'lg:col-span-1 lg:row-span-1',
        'Photography' => 'lg:col-span-1 lg:row-span-2',
        'Merchandise' => 'lg:col-span-1 lg:row-span-1',
    ];

    $extractYoutubeId = function (?string $url): ?string {
        if (! $url) {
            return null;
        }

        $patterns = [
            '/youtu\.be\/([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    };
@endphp

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
            @foreach ($categoryLayouts as $category => $span)
                @php
                    $items = $allPortfolios->where('category', $category)->values();
                    if ($items->isEmpty()) {
                        continue;
                    }

                    $slides = $items->map(function ($item) use ($extractYoutubeId) {
                        $youtubeId = $extractYoutubeId($item->youtube_url);
                        $youtubeThumb = $youtubeId ? 'https://img.youtube.com/vi/' . $youtubeId . '/hqdefault.jpg' : null;

                        return [
                            'title' => $item->title,
                            'image' => $item->image ? asset('storage/' . $item->image) : $youtubeThumb,
                            'pdf' => $item->pdf ? asset('storage/' . $item->pdf) : null,
                            'hasPdf' => (bool) $item->pdf,
                            'hasYoutube' => (bool) $youtubeId,
                        ];
                    })->values();

                    $modalItems = $items->map(function ($item) use ($extractYoutubeId) {
                        $youtubeId = $extractYoutubeId($item->youtube_url);

                        return [
                            'title' => $item->title,
                            'description' => $item->description,
                            'image' => $item->image ? asset('storage/' . $item->image) : null,
                            'pdf' => $item->pdf ? asset('storage/' . $item->pdf) : null,
                            'youtubeUrl' => $item->youtube_url,
                            'youtubeEmbed' => $youtubeId ? 'https://www.youtube.com/embed/' . $youtubeId : null,
                        ];
                    })->values();
                @endphp

                <article
                    class="reveal group relative overflow-hidden rounded-3xl {{ $span }}"
                    x-data="{
                        showModal: false,
                        slides: @js($slides),
                        items: @js($modalItems),
                        current: 0,
                        rotate: null,
                        init() {
                            if (this.slides.length > 1) {
                                this.rotate = setInterval(() => {
                                    this.current = (this.current + 1) % this.slides.length;
                                }, 2800);
                            }
                        },
                        openModal() {
                            this.showModal = true;
                            document.body.classList.add('overflow-hidden');
                        },
                        closeModal() {
                            this.showModal = false;
                            document.body.classList.remove('overflow-hidden');
                        }
                    }"
                    @click="openModal()"
                >
                    <div class="absolute inset-0 bg-linear-to-br from-[#1A1A1A] via-[#E4572E] to-[#FF8C42]"></div>

                    <template x-for="(slide, index) in slides" :key="index">
                        <div class="absolute inset-0 transition-opacity duration-500" :class="index === current ? 'opacity-100' : 'opacity-0'">
                            <template x-if="slide.image">
                                <img :src="slide.image" :alt="slide.title" class="h-full w-full object-cover">
                            </template>
                            <template x-if="!slide.image && slide.pdf">
                                <iframe :src="slide.pdf + '#toolbar=0&navpanes=0&scrollbar=0'" class="h-full w-full" loading="lazy"></iframe>
                            </template>
                            <template x-if="!slide.image && !slide.pdf">
                                <div class="flex h-full w-full items-center justify-center bg-linear-to-br from-[#1A1A1A] via-[#E4572E] to-[#FF8C42]">
                                    <svg class="h-12 w-12 text-white/75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </template>
                        </div>
                    </template>

                    <div class="absolute inset-0 bg-black/20 transition duration-300 group-hover:bg-black/45"></div>

                    <div class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-[#1A1A1A]">
                        {{ $category }}
                    </div>

                    @if ($slides->count() > 1)
                        <div class="absolute right-4 top-4 rounded-full bg-[#E4572E]/90 px-3 py-1 text-xs font-bold text-white">
                            {{ $slides->count() }} items
                        </div>
                    @endif

                    @if ($category === 'Video')
                        <div class="absolute left-4 top-14 rounded-full bg-red-600/90 px-3 py-1 text-xs font-bold text-white">
                            YouTube Ready
                        </div>
                    @endif

                    <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                        <p class="text-xs uppercase tracking-[0.15em] text-white/75">Klik untuk lihat detail</p>
                        <h3 class="mt-2 font-display text-2xl font-bold">{{ $category }}</h3>
                    </div>

                    @if ($slides->count() > 1)
                        <div class="absolute bottom-4 right-5 flex gap-1.5">
                            @foreach ($slides as $index => $slide)
                                <span class="h-1.5 w-1.5 rounded-full bg-white/40" :class="current === {{ $index }} ? 'bg-white' : 'bg-white/40'"></span>
                            @endforeach
                        </div>
                    @endif

                    <template x-teleport="body">
                        <div x-show="showModal" x-transition.opacity class="fixed inset-0 z-50 bg-black/55" @click.self="closeModal()">
                            <div class="mx-auto mt-10 max-h-[85vh] w-[94%] max-w-6xl overflow-hidden rounded-2xl bg-white shadow-2xl">
                                <div class="flex items-center justify-between border-b border-[#1A1A1A]/10 px-6 py-4">
                                    <h3 class="font-display text-2xl font-black text-[#1A1A1A]">{{ $category }}</h3>
                                    <button @click="closeModal()" class="rounded-full bg-[#E4572E]/10 p-2 text-[#E4572E] transition hover:bg-[#E4572E]/20">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="max-h-[calc(85vh-76px)] overflow-y-auto p-6">
                                    <div class="grid gap-5 md:grid-cols-2">
                                        <template x-for="(item, index) in items" :key="index">
                                            <div class="overflow-hidden rounded-xl border border-[#1A1A1A]/10 bg-[#fffaf7]">
                                                <div class="aspect-16/10 bg-[#1A1A1A]/5">
                                                    <template x-if="item.youtubeEmbed">
                                                        <iframe :src="item.youtubeEmbed" class="h-full w-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    </template>
                                                    <template x-if="!item.youtubeEmbed && item.image">
                                                        <img :src="item.image" :alt="item.title" class="h-full w-full object-cover">
                                                    </template>
                                                    <template x-if="!item.youtubeEmbed && !item.image && item.pdf">
                                                        <iframe :src="item.pdf + '#toolbar=0&navpanes=0&scrollbar=0'" class="h-full w-full" loading="lazy"></iframe>
                                                    </template>
                                                </div>

                                                <div class="space-y-3 p-4">
                                                    <h4 class="font-semibold text-[#1A1A1A]" x-text="item.title"></h4>
                                                    <p class="text-sm text-[#1A1A1A]/70" x-text="item.description || 'Tidak ada deskripsi.'"></p>
                                                    <template x-if="item.pdf">
                                                        <a :href="item.pdf" target="_blank" class="inline-flex items-center rounded-full bg-[#E4572E] px-4 py-2 text-xs font-semibold text-white transition hover:bg-[#FF8C42]">
                                                            Buka PDF
                                                        </a>
                                                    </template>
                                                    <template x-if="item.youtubeUrl">
                                                        <a :href="item.youtubeUrl" target="_blank" class="ml-2 inline-flex items-center rounded-full bg-red-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-red-500">
                                                            Buka YouTube
                                                        </a>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </article>
            @endforeach
        </div>

        @if ($allPortfolios->isEmpty())
            <div class="py-16 text-center">
                <p class="font-semibold text-[#1A1A1A]/70">Belum ada portfolio yang dipublikasikan</p>
            </div>
        @endif
    </div>
</section>
