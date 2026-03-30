@extends('admin.layout')

@section('title', 'Products')
@section('page_title', 'Products Management')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="font-display text-3xl font-black">Products</h1>
            <p class="mt-1 text-sm text-[#1A1A1A]/65">Kelola daftar produk dan layanan yang tampil di landing page.</p>
        </div>
        <a href="{{ route('products.create') }}" class="rounded-full bg-[#E4572E] px-5 py-2.5 text-sm font-semibold text-white transition hover:scale-105 hover:bg-[#FF8C42]">+ New Product</a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-[#1A1A1A]/10 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-[#fff3ea] text-[#1A1A1A]/80">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-t border-[#1A1A1A]/8">
                        <td class="px-4 py-3">
                            <p class="font-semibold">{{ $product->title }}</p>
                            <p class="mt-1 line-clamp-1 text-xs text-[#1A1A1A]/60">{{ $product->description }}</p>
                        </td>
                        <td class="px-4 py-3">{{ $product->price ? 'Rp ' . number_format($product->price, 0, ',', '.') : '-' }}</td>
                        <td class="px-4 py-3">{{ $product->image ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('products.edit', $product) }}" class="rounded-full border border-[#1A1A1A]/15 px-3 py-1.5 text-xs font-semibold transition hover:border-[#E4572E] hover:text-[#E4572E]">Edit</a>
                                <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-50">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-10 text-center text-sm text-[#1A1A1A]/65">No products yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $products->links() }}</div>
@endsection
