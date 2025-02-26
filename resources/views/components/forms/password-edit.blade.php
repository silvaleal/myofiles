<form action="{{ route('account.security') }}" method="post" class="mb-10">
        @csrf
        <div class="w-full">
            <label class="block text-gray-400 mb-1">Senha atual</label>
            <input type="password" name="old_password"
                class="w-full bg-gray-800 text-white p-3 rounded border border-gray-700 focus:ring focus:ring-blue-500/50 outline-none">
            
            <label class="block text-gray-400 mt-4 mb-1">Nova senha</label>
            <input type="password" name="new_password"
                class="w-full bg-gray-800 text-white p-3 rounded border border-gray-700 focus:ring focus:ring-blue-500/50 outline-none">

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200 mt-3 w-full">
                Alterar Senha
            </button>
        </div>
    </form>