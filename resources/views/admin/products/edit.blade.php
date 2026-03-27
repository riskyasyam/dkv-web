<x-layouts.admin title="Edit Product | Admin">
    <div class="max-w-3xl rounded-3xl border border-[#1A1A1A]/10 bg-white p-6 sm:p-8">
        <h1 class="font-display text-3xl font-black">Edit Product</h1>
        <p class="mt-1 text-sm text-[#1A1A1A]/65">Perbarui detail produk atau layanan.</p>

        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data" class="mt-8">
            @csrf
            @method('PUT')
            @include('admin.products._form', ['product' => $product])

            <div class="mt-8 flex items-center gap-3">
                <button type="submit" class="rounded-full bg-[#E4572E] px-6 py-2.5 text-sm font-semibold text-white transition hover:scale-105 hover:bg-[#FF8C42]">Update Product</button>
                <a href="{{ route('products.index') }}" class="text-sm font-medium text-[#1A1A1A]/70 transition hover:text-[#E4572E]">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
