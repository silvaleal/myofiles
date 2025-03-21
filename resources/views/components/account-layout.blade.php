<x-app-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex h-screen">
        <div class="w-1/4 bg-gray-800 p-4">
            <div class="flex items-center mb-6">
                <img alt="Profile picture" class="rounded-full w-12 h-12 mr-4" height="50"
                    src="https://storage.googleapis.com/a1aa/image/qRAwcjEev_RoPuRwcAlEmvM3oLp5Vu7zzdRQQF-8QVE.jpg"
                    width="50" />
                <div>
                    <h2 class="text-lg font-semibold">
                    {{ Auth::user()->name }}
                    </h2>
                </div>
            </div>
            <nav>
                <ul>
                    <li class="mb-2 text-lg">
                        <a class="flex items-center text-gray-400 hover:text-white"
                            href="{{ route('account.details') }}">
                            <i class="fas fa-user mr-2">
                            </i>
                            Financeiro
                        </a>
                        <a class="flex items-center text-gray-400 hover:text-white"
                            href="{{ route('account.security') }}">
                            <i class="fas fa-cog mr-2">
                            </i>
                            Perfil
                        </a>
                        <a class="flex items-center text-gray-400 hover:text-white"
                            href="{{ route('account.licenses') }}">
                            <i class="fas fa-cog mr-2">
                            </i>
                            Produtos
                        </a>
                        <a class="flex items-center text-gray-400 hover:text-white"
                            href="{{ route('cart') }}">
                            <i class="fas fa-cog mr-2">
                            </i>
                            Carrinho
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="w-3/4 p-6 bg-gray-900 shadow-lg">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>