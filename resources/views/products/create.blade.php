<x-app-layout>
    <x-navbar></x-navbar>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <label for="">Título</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="">Preço</label>
                    <input type="number" name="price">
                </div>
                <div>
                    <label for="">Categoria</label>
                    <select name="category_id">
                        @foreach ($categorys as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <input type="file" name="file">
            </div>
            <!-- TODO: Impletar o SKEDITOR -->
            <div>
                <label for="">Descrição</label>
                <input type="text" name="description">
            </div>
            <button type="submit">Postar</button>
        </form>
    </section>
</x-app>