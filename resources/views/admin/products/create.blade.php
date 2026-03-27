<x-layouts.admin title="Create Product | Admin">
    <div class="max-w-3xl rounded-3xl border border-[#1A1A1A]/10 bg-white p-6 sm:p-8">
        <h1 class="font-display text-3xl font-black">Create Product</h1>
        <p class="mt-1 text-sm text-[#1A1A1A]/65">Tambahkan produk atau layanan baru.</p>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="mt-8">
            @csrf
            @include('admin.products._form')

            <div class="mt-8 flex items-center gap-3">
                <button type="submit" class="rounded-full bg-[#E4572E] px-6 py-2.5 text-sm font-semibold text-white transition hover:scale-105 hover:bg-[#FF8C42]">Save Product</button>
                <a href="{{ route('products.index') }}" class="text-sm font-medium text-[#1A1A1A]/70 transition hover:text-[#E4572E]">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
