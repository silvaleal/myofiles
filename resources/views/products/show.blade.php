<x-app-layout>
    <x-navbar></x-navbar>
    @if(session('error'))
        <div class="alert alert-danger">
            <x-alert-error>{{ session('error') }}</x-alert-error>
        </div>
    @endif

    <div class="container mx-auto p-4">
        <header class="mb-4">
            <h1 class="text-2xl font-bold">
                {{ $product->name }}
            </h1>
        </header>
        <div class="container mx-auto p-4 flex gap-5">
            <section class="mb-4 flex-1">
                <h2 class="text-lg font-bold">
                </h2>
                <div class="bg-purple-700 p-4 rounded-lg mt-2">
                    <div class="flex items-center">
                        {!! $product->description !!}
                    </div>
                </div>
            </section>
            <aside class="w-full lg:w-1/4 lg:float-right">
                <div class="bg-gray-800 p-4 rounded-lg mb-4">
                    <h3 class="text-lg font-bold">
                        Compre este produto
                    </h3>
                    <p class="text-2xl font-bold">
                        R${{ number_format($product->price, 2) }}
                    </p>
                    <x-product-button :product="$product"></x-product-button>
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>