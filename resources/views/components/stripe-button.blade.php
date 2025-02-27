@props(['disabled'])

<form action="{{ route('payment.process') }}" method="POST">
    @csrf
    @if (empty($disabled))
        <button class="bg-blue-800 text-white py-2 px-4 rounded-lg w-full" type="submit" disabled >Carrinho vazio</button>
    @else
        <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full" type="submit">Realizar compra</button>
    @endif
</form>