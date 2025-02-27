<x-app-layout>
    <x-navbar></x-navbar>
    
    <div class="max-w-2xl mx-auto mt-8 p-6 bg-gray-900 text-white shadow-lg rounded-lg">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="name" class="block font-semibold">Título</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-700 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="price" class="block font-semibold">Preço</label>
                    <input type="number" id="price" name="price" class="w-full p-2 border border-gray-700 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="category_id" class="block font-semibold">Categoria</label>
                    <select id="category_id" name="category_id" class="w-full p-2 border border-gray-700 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}" class="bg-gray-800 text-white">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div>
                <label for="file" class="block font-semibold">Imagem do Produto</label>
                <input type="file" id="file" name="file" class="w-full p-2 border border-gray-700 bg-gray-800 text-white rounded-lg">
            </div>
            
            <!-- TODO: Implementar o SKEDITOR -->
            <div>
                <label for="description" class="block font-semibold">Descrição</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-700 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Postar</button>
        </form>
    </div>
</x-app-layout>