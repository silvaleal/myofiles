<form action="{{ route('payment.create') }}" method="POST">
    @csrf
    <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full" type="submit">Checkout</button>
</form>