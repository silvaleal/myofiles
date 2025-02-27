<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $user->name }}</h1>
        <div class="flex gap-16">
            <!-- Produtos -->
            <div class="flex-1">
                <h2 class="text-xl font-semibold mb-4">Produtos</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                    @foreach ($user->product as $product)
                        <a href="{{ route('product.show', $product) }}" class="block mb-4">
                            <div class="bg-gray-800 hover:bg-gray-900 transition duration-200 p-4 rounded-lg shadow-lg">
                                <div class="flex justify-between items-start">
                                    <h2 class="text-lg font-semibold text-gray-50 truncate">{{ $product->name }}</h2>
                                    <span
                                        class="bg-red-500 px-2 py-0.5 font-semibold text-sm rounded-lg text-white">R${{ number_format($product->price, 2) }}</span>
                                </div>
                                <p class="text-indigo-200 mb-2">{{ Str::limit($product->description, 60) }}</p>
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
            <div class="w-1/3">
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-xl font-semibold mb-4">Avaliações</h2>
                </div>

                <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                    <div class="mb-5">
                        <h3 class="text-lg font-semibold text-gray-50">Produto X</h3>
                        <p class="text-indigo-200">Excelente produto, recomendo!</p>
                        <span class="text-sm text-gray-400">Nota: 5/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>