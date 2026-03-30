@extends('admin.layout')

@section('title', 'Portfolio Management')
@section('page_title', 'Portfolio Management')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <p class="text-[#1A1A1A]/70">Kelola portfolio produk DKV Anda</p>
        <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-[#E4572E] px-6 py-3 text-sm font-semibold text-white hover:bg-[#FF8C42] transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Portfolio
        </a>
    </div>

    <!-- Filter by Category -->
    <div class="mb-6 flex gap-3 flex-wrap">
        <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-[#E4572E] text-white' : 'bg-white text-[#1A1A1A] border border-[#e4572e]/20' }} transition font-semibold text-sm">
            Semua
        </a>
        @foreach (['Graphic Design', 'Video', 'Photography', 'Merchandise'] as $cat)
            <a href="{{ route('admin.portfolio.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-lg {{ request('category') == $cat ? 'bg-[#E4572E] text-white' : 'bg-white text-[#1A1A1A] border border-[#e4572e]/20' }} transition font-semibold text-sm">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    <!-- Portfolio Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($portfolios as $portfolio)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                <div class="aspect-video bg-gradient-to-br from-[#E4572E] to-[#FF8C42] flex items-center justify-center relative overflow-hidden">
                    @if ($portfolio->image)
                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
                    @elseif ($portfolio->pdf)
                        <div class="flex flex-col items-center justify-center text-white">
                            <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm font-semibold">PDF</span>
                        </div>
                    @else
                        <div class="text-white text-center">
                            <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-sm">No Media</p>
                        </div>
                    @endif
                </div>

                <div class="p-4">
                    <div class="flex items-start justify-between mb-2">
                        <h3 class="font-bold text-[#1A1A1A] text-lg">{{ $portfolio->title }}</h3>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-[#E4572E]/10 text-[#E4572E]">
                            {{ $portfolio->category }}
                        </span>
                    </div>
                    
                    @if ($portfolio->description)
                        <p class="text-sm text-[#1A1A1A]/70 mb-4 line-clamp-2">{{ $portfolio->description }}</p>
                    @endif

                    <div class="flex gap-2">
                        <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-[#E4572E]/10 px-3 py-2 text-sm font-semibold text-[#E4572E] hover:bg-[#E4572E]/20 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-red-50 px-3 py-2 text-sm font-semibold text-red-600 hover:bg-red-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center">
                <svg class="w-16 h-16 mx-auto mb-4 text-[#1A1A1A]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <p class="text-[#1A1A1A]/70 font-semibold">Belum ada portfolio</p>
                <a href="{{ route('admin.portfolio.create') }}" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-[#E4572E] px-6 py-3 text-sm font-semibold text-white hover:bg-[#FF8C42] transition">
                    Buat Portfolio Pertama
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($portfolios->hasPages())
        <div class="mt-8">
            {{ $portfolios->links() }}
        </div>
    @endif
@endsection
