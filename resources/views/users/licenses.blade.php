<x-account-layout>
<div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-2">
            Suas licenças
        </h1>
        <div class="space-y-4">
            @foreach ($licenses as $license)
                <div class="bg-gray-800 p-4 rounded flex justify-between items-center">
                    <div class="flex items-center">
                        <img alt="Sci-Fi Spawn image" class="w-20 h-20 rounded mr-4" src="https://placehold.co/100x100" />
                        <div>
                            <a href="{{ route('product.show', $license->product) }}">
                                <h2 class="text-lg font-semibold">{{ $license->product->name }}</h2>
                            </a>
                            <p class="text-sm text-gray-400">
                                {{ $license->user->name }} • Última atualização: {{ $license->product->updated_at }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-account-layout>