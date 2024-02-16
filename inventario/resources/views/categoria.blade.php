<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>





    <x-lista>

        <x-slot name="titulo">Categorías de los productos almacenados</x-slot>

        <x-slot name="items">

            @foreach ($categorias as $categoria)

            <x-lista.li>{{ $categoria->nombre }}</x-lista.li>

            @endforeach

        </x-slot>

    </x-lista>

    <x-modal>
        <x-slot name="name">crearCategoria</x-slot>

        <form method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                    required autofocus autocomplete="nombre" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

        </form>


    </x-modal>
    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4" x-on:click="$dispatch('open-modal', 'crearCategoria')">
            {{ __('Crear Categoria') }}
        </x-primary-button>

    </div>



</x-app-layout>