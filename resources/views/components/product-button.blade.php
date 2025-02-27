<form action="{{ route('cart.add', ["product" => $product]) }}" method="post">
    @csrf
    <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full">
        Adicionar ao carrinho
    </button>
</form>