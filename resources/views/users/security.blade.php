<x-account-layout>
<div class="w-3/4 p-6 bg-gray-900 shadow-lg">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-white">Informações de Segurança</h1>
            </div>

            <!-- Atualizar Apelido -->
            @include('components.forms.name-edit')

            <!-- Alterar Senha -->
            @include('components.forms.password-edit')

            <!-- Alterar Email -->
            @include('components.forms.email-edit')
        </div>
</x-account-layout>