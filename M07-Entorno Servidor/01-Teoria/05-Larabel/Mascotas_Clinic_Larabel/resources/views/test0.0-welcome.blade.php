<!-- <x-Layouts.app>

    <x-slot name="title">
        Create
    </x-slot>

    <h1>{{ $frase }}</h1>
    <br>
    <div class="w-full max-w-xs">

        <form action="{{ route('POSTS.store') }}" method="post">

            @csrf

            {{-- Name --}}
            <div>
                <label for="title"> Título </label>
                <br>
                <input class="bg-gray-200 border"  type="text" name="title" id="title">
                <br>
                <br>
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug"> Slug </label>
                <br>
                <input class="bg-gray-200 border" type="text" name="slug" id="slug">
                <br>
                <br>
            </div>

            {{-- Body --}}
            <div>
                <label for="body"> Contenido </label>
                <br>
                <textarea class="bg-gray-200 border" name="body" id="body" cols="30" rows="10"> </textarea>

            </div>

            {{-- Categories --}}
            <div>
                <label for="category_id">Categorías</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Categories --}}
             <div>
                 <label for="user_id">Usuarios</label>
                    <select name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
            </div>

            {{-- Boton Enviar --}}
            <input type="submit" value="Enviar formulario" />
        </form>
    </div>
</x-Layouts.app> -->
