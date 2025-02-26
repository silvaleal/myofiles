<x-app-layout>
    <x-navbar></x-navbar>

    <form action="{{ route('cart.store') }}" method="post">
        @csrf
        <input type="number" name="quantify" value="1">
        <input type="hidden" name="productId" value="{{ $product->id }}">
        <button type="submit">Adicionar no carrinho</button>
    </form>

    <div>
        {{ $product->name }}
    </div>
    <div>
        {{ $product->price }}
    </div>
    <div>
        {{ $product->description }}
    </div>

</x-app>