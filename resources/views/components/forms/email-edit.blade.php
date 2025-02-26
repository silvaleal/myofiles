<form action="{{ route('account.email') }}" method="post">
    @csrf
    <div class="w-full mb-5">
        <div class="mb-4">
            <div>
                <label class="block text-gray-400 mb-">Seu email atual</label>
                <input type="email" name="email"
                    class="w-full mb-5 bg-gray-900 text-white p-2 rounded border border-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-500/50 outline-none"
                    placeholder="{{ Auth::user()->email }}" disabled >

                <label class="block text-gray-400 mb-1">Seu email substituto</label>
                <input type="email" name="email"
                    class="w-full bg-gray-800 text-white p-2 rounded border border-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-500/50 outline-none"
                    placeholder="Digite seu novo email">
            </div>
            <p class="text-gray-500 text-sm mt-1">
                Prezamos com a segurança das contas dos nossos usuários, ao confirmar a alteração, você deverá confirmar interando com o email que enviamos.
            </p>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-small py-2 px-4 rounded transition duration-200 mt-2">
                Alterar
            </button>
        </div>
    </div>
</form>