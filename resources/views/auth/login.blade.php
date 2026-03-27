<x-layouts.main title="Login | DKV SMKN 4 Jember">
    <section class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 py-12">
        <div class="pointer-events-none absolute -left-16 -top-12 h-64 w-64 rounded-full bg-[#E4572E]/25 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-10 bottom-0 h-64 w-64 rounded-full bg-[#FF8C42]/25 blur-3xl"></div>

        <div class="reveal relative w-full max-w-md rounded-[1.8rem] border border-[#1A1A1A]/10 bg-white p-8 shadow-[0_30px_90px_-45px_rgba(228,87,46,0.8)]">
            <h1 class="font-display text-3xl font-black">Admin Login</h1>
            <p class="mt-2 text-sm text-[#1A1A1A]/70">Masuk untuk mengelola produk dan layanan.</p>

            <form class="mt-8 space-y-4" method="POST" action="{{ route('login.store') }}">
                @csrf
                <div>
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-xl border border-[#1A1A1A]/15 px-4 py-3 text-sm outline-none transition focus:border-[#E4572E]">
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm font-medium">Password</label>
                    <input id="password" name="password" type="password" required class="mt-2 w-full rounded-xl border border-[#1A1A1A]/15 px-4 py-3 text-sm outline-none transition focus:border-[#E4572E]">
                </div>

                <label class="inline-flex items-center gap-2 text-sm">
                    <input type="checkbox" name="remember" class="rounded border-[#1A1A1A]/30 text-[#E4572E] focus:ring-[#E4572E]">
                    Remember me
                </label>

                <button type="submit" class="w-full rounded-full bg-[#E4572E] px-5 py-3 text-sm font-semibold text-white transition hover:scale-[1.01] hover:bg-[#FF8C42]">Sign In</button>
            </form>
        </div>
    </section>
</x-layouts.main>
