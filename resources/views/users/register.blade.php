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

    <form action="{{ route('register') }}" method="post">
        @csrf

        <section class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white">
            <div class="flex w-[30rem] flex-col space-y-10">
                <div class="text-center text-4xl font-medium">Cadastro</div>

                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" placeholder="Escreva o seu apelido" name="name" class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none">
                </div>

                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input type="text" placeholder="Escreva o seu melhor email" name="email"
                        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
                </div>

                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input type="password" placeholder="Escreva sua senha" name="password"
                        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
                </div>

                <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
                    <input type="password" placeholder="Confirme sua senha" name="password_confirmation"
                        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none" />
                </div>
                
                <div class="flex gap-2">
                        <input type="checkbox" name="accept_term">
                        <p>Concordar com os termos de serviços</p>
                    </div>

                <button class="transform rounded-sm bg-indigo-600 py-2 font-bold duration-300 hover:bg-indigo-400">CADASTRAR CONTA</button>

                <div class="flex justify-between">
                    <p class="text-center text-lg">Já possui uma conta? <a href="#"
                            class="font-medium text-indigo-500 underline-offset-4 hover:underline">Crie uma!</a>
                    </p>
                </div>
            </div>
        </section>
    </form>
</x-app>