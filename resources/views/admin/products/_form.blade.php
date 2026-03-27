@props(['product' => null])

<div class="grid gap-5">
    <div>
        <label for="title" class="text-sm font-medium">Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $product?->title) }}" required class="mt-2 w-full rounded-xl border border-[#1A1A1A]/15 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#E4572E]">
        @error('title')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="text-sm font-medium">Description</label>
        <textarea id="description" name="description" rows="5" required class="mt-2 w-full rounded-xl border border-[#1A1A1A]/15 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#E4572E]">{{ old('description', $product?->description) }}</textarea>
        @error('description')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="price" class="text-sm font-medium">Price (optional)</label>
        <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price', $product?->price) }}" class="mt-2 w-full rounded-xl border border-[#1A1A1A]/15 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#E4572E]">
        @error('price')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image" class="text-sm font-medium">Image (optional)</label>
        <input id="image" name="image" type="file" accept="image/*" class="mt-2 w-full rounded-xl border border-[#1A1A1A]/15 bg-white px-4 py-3 text-sm outline-none transition file:mr-3 file:rounded-full file:border-0 file:bg-[#E4572E]/10 file:px-3 file:py-1 file:text-xs file:font-semibold file:text-[#E4572E] hover:file:bg-[#E4572E]/15">
        @error('image')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror

        @if ($product?->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="mt-4 h-28 w-36 rounded-xl object-cover">
        @endif
    </div>
</div>
