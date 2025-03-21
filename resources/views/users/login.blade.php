<x-app-layout>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <section class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white">
            <div class="flex w-[30rem] flex-col space-y-10">
                <div class="text-center text-4xl font-medium">Autenticado</div>

                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" placeholder="Digite seu email" name="email" class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"/>
                </div>

                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input type="password" placeholder="Digite sua senha" name="password" class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"/>
                </div>
                <button class="transform rounded-sm bg-indigo-600 py-2 font-bold duration-300 hover:bg-indigo-400">LOG IN</button>
                <div class="flex justify-between">
                    <a href="#" class="transform text-center font-semibold text-gray-500 duration-300 hover:text-gray-300">RECUPERAR CONTA</a>

                    <p class="text-center text-lg">Não possui conta? <a href="#" class="font-medium text-indigo-500 underline-offset-4 hover:underline">Crie uma!</a>
                    </p>
                </div>
            </div>
        </section>
    </form>
</x-app>