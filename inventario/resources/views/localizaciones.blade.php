<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Localizaciones') }}
        </h2>
    </x-slot>
    <x-lista>
        <x-slot name="titulo"> Localizacion de los proveedores </x-slot>



        <x-slot name="items">


            @foreach ($localizaciones as $localizacion)

            <x-lista.li>{{ $localizacion->ciudad . ', ' . $localizacion->nombre_edificio }}</x-lista.li>


            @endforeach

        </x-slot>

    </x-lista>


</x-app-layout>