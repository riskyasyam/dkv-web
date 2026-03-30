@extends('admin.layout')

@section('title', 'Tambah Portfolio')
@section('page_title', 'Tambah Portfolio Baru')

@section('content')
    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf

        <div class="bg-white rounded-lg shadow p-8 space-y-6">
            <!-- Judul -->
            <div>
                <label for="title" class="block text-sm font-semibold text-[#1A1A1A] mb-2">Judul</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul portfolio"
                    class="w-full px-4 py-2 rounded-lg border border-[#e4572e]/20 focus:outline-none focus:ring-2 focus:ring-[#E4572E] @error('title') border-red-500 @enderror"
                    required
                >
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-sm font-semibold text-[#1A1A1A] mb-2">Kategori</label>
                <select 
                    id="category" 
                    name="category"
                    class="w-full px-4 py-2 rounded-lg border border-[#e4572e]/20 focus:outline-none focus:ring-2 focus:ring-[#E4572E] @error('category') border-red-500 @enderror"
                    required
                >
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-semibold text-[#1A1A1A] mb-2">Deskripsi</label>
                <textarea 
                    id="description" 
                    name="description"
                    placeholder="Masukkan deskripsi portfolio"
                    rows="4"
                    class="w-full px-4 py-2 rounded-lg border border-[#e4572e]/20 focus:outline-none focus:ring-2 focus:ring-[#E4572E] @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Link YouTube (khusus Video) -->
            <div>
                <label for="youtube_url" class="block text-sm font-semibold text-[#1A1A1A] mb-2">Link YouTube (Opsional untuk Video)</label>
                <input
                    type="url"
                    id="youtube_url"
                    name="youtube_url"
                    value="{{ old('youtube_url') }}"
                    placeholder="https://www.youtube.com/watch?v=..."
                    class="w-full px-4 py-2 rounded-lg border border-[#e4572e]/20 focus:outline-none focus:ring-2 focus:ring-[#E4572E] @error('youtube_url') border-red-500 @enderror"
                >
                <p class="mt-1 text-xs text-[#1A1A1A]/60">Digunakan sebagai preview videografi di section portfolio.</p>
                @error('youtube_url')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Gambar -->
            <div>
                <label for="image" class="block text-sm font-semibold text-[#1A1A1A] mb-2">Gambar</label>
                <div class="border-2 border-dashed border-[#e4572e]/20 rounded-lg p-6 text-center hover:border-[#E4572E] transition cursor-pointer" onclick="document.getElementById('image').click()">
                    <svg id="image-preview-icon" class="w-12 h-12 mx-auto mb-2 text-[#1A1A1A]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p id="image-text" class="text-sm font-semibold text-[#1A1A1A]/70">Klik untuk upload gambar atau drag & drop</p>
                </div>
                <input 
                    type="file" 
                    id="image" 
                    name="image"
                    accept="image/*"
                    class="hidden"
                    onchange="handleImagePreview(this)"
                >
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload PDF -->
            <div>
                <label for="pdf" class="block text-sm font-semibold text-[#1A1A1A] mb-2">PDF (Opsional)</label>
                <div class="border-2 border-dashed border-[#e4572e]/20 rounded-lg p-6 text-center hover:border-[#E4572E] transition cursor-pointer" onclick="document.getElementById('pdf').click()">
                    <svg id="pdf-preview-icon" class="w-12 h-12 mx-auto mb-2 text-[#1A1A1A]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <p id="pdf-text" class="text-sm font-semibold text-[#1A1A1A]/70">Klik untuk upload PDF atau drag & drop</p>
                </div>
                <input 
                    type="file" 
                    id="pdf" 
                    name="pdf"
                    accept=".pdf"
                    class="hidden"
                    onchange="handlePdfPreview(this)"
                >
                @error('pdf')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Urutan -->
            <div>
                <label for="order" class="block text-sm font-semibold text-[#1A1A1A] mb-2">Urutan</label>
                <input 
                    type="number" 
                    id="order" 
                    name="order"
                    value="{{ old('order', 0) }}"
                    class="w-full px-4 py-2 rounded-lg border border-[#e4572e]/20 focus:outline-none focus:ring-2 focus:ring-[#E4572E]"
                >
            </div>

            <!-- Publikasi -->
            <div class="flex items-center gap-3">
                <input 
                    type="checkbox" 
                    id="is_published" 
                    name="is_published"
                    value="1"
                    {{ old('is_published', true) ? 'checked' : '' }}
                    class="w-4 h-4 rounded"
                >
                <label for="is_published" class="text-sm font-semibold text-[#1A1A1A]">Publikasikan portfolio</label>
            </div>

            <!-- Tombol -->
            <div class="flex gap-3 pt-4 border-t border-[#e4572e]/20">
                <a href="{{ route('admin.portfolio.index') }}" class="flex-1 inline-flex items-center justify-center rounded-lg bg-white border border-[#e4572e]/20 px-6 py-3 font-semibold text-[#1A1A1A] hover:bg-[#f5f5f5] transition">
                    Batal
                </a>
                <button 
                    type="submit" 
                    class="flex-1 inline-flex items-center justify-center rounded-lg bg-[#E4572E] px-6 py-3 font-semibold text-white hover:bg-[#FF8C42] transition"
                >
                    Simpan Portfolio
                </button>
            </div>
        </div>
    </form>

    <script>
        function handleImagePreview(input) {
            const fileName = input.files[0]?.name || '';
            document.getElementById('image-text').textContent = fileName || 'Klik untuk upload gambar atau drag & drop';
        }

        function handlePdfPreview(input) {
            const fileName = input.files[0]?.name || '';
            document.getElementById('pdf-text').textContent = fileName || 'Klik untuk upload PDF atau drag & drop';
        }
    </script>
@endsection
