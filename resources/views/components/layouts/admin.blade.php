<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Products' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#fff9f5] text-[#1A1A1A]">
    <header class="border-b border-[#1A1A1A]/10 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="{{ route('products.index') }}" class="font-display text-xl font-bold">Admin <span class="text-[#E4572E]">Products</span></a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-full bg-[#1A1A1A] px-4 py-2 text-xs font-semibold uppercase tracking-wide text-white transition hover:bg-[#E4572E]">Logout</button>
            </form>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-6 py-10">
        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('success') }}</div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
