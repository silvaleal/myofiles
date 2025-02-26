<x-app-layout>
    <x-navbar></x-navbar>
    <div class="container mx-auto p-4">
        <div class="flex flex-col lg:flex-row justify-between">
            <div class="lg:w-2/3">
                <h1 class="text-2xl font-semibold mb-4">Seu carrinho</h1>
                <div class="bg-gray-800 p-4 rounded-lg">
                    @php $totalPrice = 0 @endphp
                    @if ($items->isEmpty())
                        <p>Seu carrinho está vazio!</p>
                    @else
                        <table class="w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="p-3 text-left">Título</th>
                                    <th class="p-3 text-left">Categoria</th>
                                    <th class="p-3 text-left">Preço</th>
                                    <th class="p-3 text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    @php $totalPrice += $item->product->price @endphp
                                    <tr class="border-t border-gray-600">
                                        <td class="p-3">{{ $item->product->name }}</td>
                                        <td class="p-3">{{ $item->product->category->name }}</td>
                                        <td class="p-3">R${{ number_format($item->product->price, 2) }}</td>
                                        <td class="p-3">
                                            <form action="{{ route('cart.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-red-500"> Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <div class="lg:w-1/3 mt-8 lg:mt-0 lg:ml-8">
                <div class="bg-gray-800 p-4 rounded-lg mb-4">
                    <h2 class="text-xl font-semibold mb-4">Resumo do pedido</h2>
                    <div class="flex justify-between mb-2">
                        <span>Preço final:</span>
                        <span>R$ {{ number_format($totalPrice, 2) }}</span>
                    </div>
                    <x-stripe-button></x-stripe-button>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg mb-5">
                    <h2 class="text-xl font-semibold mb-4">Como entregamos?</h2>
                    <p class="text-sm mb-2">
                        Todos os itens da plataforma possuem acesso vitalício. Assim que a compra for confirmada, a
                        instalação do produto estará imediatamente disponível para download em sua conta.
                    </p>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Quer ser vendedor?</h2>
                    <p class="text-sm mb-2">
                        Torne-se um vendedor em nossa plataforma e monetize seus produtos digitais. Oferecemos um
                        ambiente seguro e fácil de usar para que você possa vender com confiança e alcançar um público
                        maior.
                    </p>
                    <p class="text-sm mb-2">
                        Nossa equipe analisa cada vendedor para garantir a qualidade e segurança das transações. Se você
                        deseja fazer parte do nosso marketplace, entre em contato e comece a vender hoje mesmo!
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app>