<form action="{{ route('account.name') }}" method="post" class="mb-10">
        @csrf
        <div class="w-full">
            <label class="block text-gray-400 mb-1">Seu apelido atual</label>
            <input type="text" name="name"
                class="w-full bg-gray-800 text-white p-3 rounded border border-gray-700 focus:ring focus:ring-blue-500/50 outline-none"
                value="{{ Auth::user()->name }}" placeholder="Digite seu novo apelido">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200 mt-3 w-full">
                Atualizar Apelido
            </button>
        </div>
    </form>