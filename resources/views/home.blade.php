<x-app-layout>
    <x-navbar></x-navbar>
    <div class="container mx-auto p-4">
        <div class="flex flex-col lg:flex-row justify-between">
            <div class="lg:w-full">
                <h1 class="text-2xl font-semibold mb-4">Mais avaliados</h1>
                <div class="p-4 rounded-lg">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @foreach ($products as $product)
                            <a href="{{ route('product.show', $product) }}">
                                <div class="bg-gray-700 hover:bg-gray-900 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h2 class="text-lg font-semibold text-gray-50 truncate">{{ $product->name }}</h2>
                                        <span
                                            class="bg-red-500 px-2 py-0.5 font-semibold text-sm rounded-lg text-white">R${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    <p class="text-indigo-100 mb-2">{{ Str::limit($product->description, 60) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="text-sm text-gray-400">{{ $product->created_at->format('d/m/Y H:i') }}</span>
                                        <span class="text-sm text-gray-400">{{ $product->category->name }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <h1 class="text-2xl font-semibold mb-4">Em promoção</h1>
                <div class="p-4 rounded-lg">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @foreach ($products as $product)
                            <a href="{{ route('product.show', $product) }}">
                                <div class="bg-gray-700 hover:bg-gray-900 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h2 class="text-lg font-semibold text-gray-50 truncate">{{ $product->name }}</h2>
                                        <!-- Nome do produto -->
                                        <span
                                            class="bg-red-500 px-2 py-0.5 font-semibold text-sm rounded-lg text-white">R${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    <p class="text-indigo-100 mb-2">{{ Str::limit($product->description, 60) }}</p>
                                    <!-- Descrição curta -->
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="text-sm text-gray-400">{{ $product->created_at->format('d/m/Y H:i') }}</span>
                                        <span class="text-sm text-gray-400">{{ $product->category->name }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>