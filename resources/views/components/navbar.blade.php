<div class="flex container mx-auto p-4 justify-between">
  <div><a href="{{ route('home') }}">MyoFiles</a></div>
  <div>
    @if (Auth::check())

    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white 
          font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex 
          items-center dark:focus:ring-blue-800" type="button">
      {{ Auth::user()->name }}
    </button>

    <div id="dropdownInformation"
      class="z-10 hidden p-2 bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-800 dark:divide-gray-600">
      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 w-44" aria-labelledby="dropdownInformationButton">
      <div>
        <li>
        <a href="{{ route('account.details') }}"
          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Detalhes</a>
        <a href="{{ route('account.security') }}"
          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Segurança</a>
        <a href="{{ route('account.licenses') }}"
          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Produtos</a>
        <a href="{{ route('cart.index') }}"
          class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Carrinho</a>
        </li>
      </ul>
      <div class="py-2">
      <a href="{{ route('product.create') }}"
        class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Criar produto</a>
      <a href="" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Seus produto</a>
      <a href="{{ route('account.logout') }}"
        class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Desconectar</a>
      </div>
    </div>
KW
  @else

  <div class="flex gap-1">
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Registrar</a>
  </div>

@endif
  </div>
</div>