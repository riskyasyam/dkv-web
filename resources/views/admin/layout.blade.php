<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin DKV</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f5f5f5]">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="p-6 border-b border-[#e4572e]/20">
                    <h1 class="font-display text-2xl font-black text-[#1A1A1A]">
                        <span class="text-[#E4572E]">DKV</span> Admin
                    </h1>
                </div>

                <!-- Menu Navigation -->
                <nav class="flex-1 p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('products.index') }}"
                               class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('products.*') ? 'bg-[#E4572E]/10 text-[#E4572E] font-semibold' : 'text-[#1A1A1A] hover:bg-[#f5f5f5]' }} transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2h-3V3.5A1.5 1.5 0 0013.5 2h-3A1.5 1.5 0 009 3.5V5H6a2 2 0 00-2 2v6m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"></path>
                                </svg>
                                <span>Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.portfolio.index') }}" 
                               class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.portfolio.*') ? 'bg-[#E4572E]/10 text-[#E4572E] font-semibold' : 'text-[#1A1A1A] hover:bg-[#f5f5f5]' }} transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Portfolio</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Logout -->
                <div class="p-4 border-t border-[#e4572e]/20">
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 rounded-lg text-[#E4572E] hover:bg-[#E4572E]/10 transition font-semibold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <!-- Top Bar -->
            <div class="sticky top-0 bg-white border-b border-[#e4572e]/20 px-8 py-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-black text-[#1A1A1A]">@yield('page_title')</h2>
                    <div class="text-sm text-[#1A1A1A]/60">
                        {{ auth()->user()->email ?? 'Admin' }}
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="p-8">
                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4">
                        <p class="font-semibold text-red-800 mb-2">Ada kesalahan:</p>
                        <ul class="text-red-700 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4">
                        <p class="font-semibold text-green-800">✓ {{ session('success') }}</p>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
