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

    


</x-app-layout>
