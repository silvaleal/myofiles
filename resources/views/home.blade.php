<x-app-layout>
    <x-navbar></x-navbar>
    @foreach ($products as $product)
        <div>
            <a href="{{ route('product.show', ["product"=>$product]) }}">{{ $product->name }}</a>
        </div>
    @endforeach
</x-app>