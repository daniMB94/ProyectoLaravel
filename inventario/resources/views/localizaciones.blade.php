<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Localizaciones') }}
        </h2>
    </x-slot>





    <x-lista>

        <x-slot name="titulo">Localización de los proveedores</x-slot>

        <x-slot name="items">

            @foreach ($localizaciones as $localizacion)

            <x-lista.li>
                {{ $localizacion->ciudad . $localizacion->edificio . ', ' . $localizacion->direccion . ', Numero de sala: ' . $localizacion->numero_sala }}<a
                    class="font-medium text-sm" style="color: red""
                    href=" {{ route('localizaciones.delete', ['id' => $localizacion->id]) }}">&emsp;&emsp;Eliminar</a>
            </x-lista.li>

            @endforeach

        </x-slot>

    </x-lista>

    @php
    $nombreModal = 'crearLocalizacion';
    @endphp

    <x-modal>
        <x-slot name="name">{{ $nombreModal }}</x-slot>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('localizaciones.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Ciudad -->
                <div>
                    <x-input-label for="ciudad" :value="__('Ciudad del proveedor')" />
                    <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')"
                        required autofocus autocomplete="ciudad" />
                    <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
                </div>

                <!-- Edificio -->
                <div>
                    <x-input-label for="nombre_edificio" :value="__('Edificio')" />
                    <x-text-input id="nombre_edificio" class="block mt-1 w-full" type="text" name="nombre_edificio"
                        :value="old('nombre_edificio')" required autofocus autocomplete="nombre_edificio" />
                    <x-input-error :messages="$errors->get('nombre_edificio')" class="mt-2" />
                </div>

                <!-- Dirección -->
                <div>
                    <x-input-label for="direccion" :value="__('Dirección')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                        :value="old('direccion')" required autofocus autocomplete="direccion" />
                    <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                </div>

                <!-- Número de sala -->
                <div>
                    <x-input-label for="numero_sala" :value="__('Número de sala')" />
                    <x-text-input id="numero_sala" class="block mt-1 w-full" type="number" name="numero_sala"
                        :value="old('numero_sala')" required autofocus autocomplete="numero_sala" />
                    <x-input-error :messages="$errors->get('numero_sala')" class="mt-2" />
                </div>
                <input type="hidden" name="pintarDashboard" value="true">

                <x-primary-button class="ms-4">
                    {{ __('Guardar nueva localizacion') }}
                </x-primary-button>

            </form>
        </div>
    </x-modal>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4" x-data x-on:click="$dispatch('open-modal', '{{ $nombreModal }}')">
            {{ __('Crear Localizacion') }}
        </x-primary-button>
    </div>


</x-app-layout>