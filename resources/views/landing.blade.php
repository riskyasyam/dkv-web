<x-layouts.main title="DKV SMKN 4 Jember | Creative Studio">
    <div class="relative overflow-hidden">
        <x-landing.navbar />

        <main>
            <x-landing.hero />
            <x-landing.services />
            <x-landing.portfolio />
            <x-landing.products :products="$products" />
            <x-landing.about />
            <x-landing.cta />
        </main>

        <x-landing.footer />
    </div>
</x-layouts.main>
