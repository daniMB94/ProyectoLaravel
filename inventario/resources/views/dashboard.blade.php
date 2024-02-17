<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!--AQUI TENDRE QUE PASAR LOS PRODUCTOS PARA PINTARLOS EN UNA TABLA-->

    <x-table>
        <x-slot name="tcabecera">
            <x-table.th>Codigo</x-table.th>
            <x-table.th>Modelo</x-table.th>
            <x-table.th>Fabricante</x-table.th>
            <x-table.th>Descripcion</x-table.th>
            <x-table.th>Stock</x-table.th>
            <x-table.th>Estado</x-table.th>
        </x-slot>

        @foreach ($productos as $producto)
        <tr>
            <x-table.td>{{ $producto->codigo }}</x-table.td>
            <x-table.td>{{ $producto->modelo }}</x-table.td>
            <x-table.td>{{ $producto->fabricante }}</x-table.td>
            <x-table.td>{{ $producto->descripcion }}</x-table.td>
            <x-table.td>{{ $producto->stock }}</x-table.td>
            <x-table.td>{{ $producto->estado }}</x-table.td>
        </tr>
        @endforeach

        <x-slot name="plinks">
            {{ $productos->links() }}
        </x-slot>

    </x-table>

    @php
    $nombreModal = 'crearProducto';
    @endphp

    <x-modal>
        <x-slot name="name">{{ $nombreModal }}</x-slot>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Codigo -->
                <div>
                    <x-input-label for="codigo" :value="__('Codigo del producto')" />
                    <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')"
                        required autofocus autocomplete="codigo" />
                    <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
                </div>

                <!-- Modelo -->
                <div>
                    <x-input-label for="modelo" :value="__('Modelo')" />
                    <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo')"
                        required autofocus autocomplete="modelo" />
                    <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
                </div>

                <!-- Fabricante -->
                <div>
                    <x-input-label for="fabricante" :value="__('Fabricante')" />
                    <x-text-input id="fabricante" class="block mt-1 w-full" type="text" name="fabricante"
                        :value="old('fabricante')" required autofocus autocomplete="fabricante" />
                    <x-input-error :messages="$errors->get('fabricante')" class="mt-2" />
                </div>

                <!-- Descripción -->
                <div>
                    <x-input-label for="descripcion" :value="__('Descripción')" />
                    <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion"
                        :value="old('descripcion')" required autofocus autocomplete="descripcion" />
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>

                <!-- Imagen -->
                <div>
                    <x-input-label for="imagen" :value="__('Imagen')" />
                    <x-text-input id="imagen" class="block mt-1 w-full" type="text" name="imagen" :value="old('imagen')"
                        required autofocus autocomplete="direccion" />
                    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                </div>

                <!-- Stock -->
                <div>
                    <x-input-label for="stock" :value="__('Stock')" />
                    <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock')"
                        required autofocus autocomplete="stock" />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>

                <!-- Estado -->
                <div>
                    <x-input-label for="estado" :value="__('Estado')" />
                    <select id="estado" name="estado">
                        <option value="desaparecido">Desaparecido</option>
                        <option value="activo">Activo</option>
                        <option value="roto">Roto</option>
                    </select>
                </div>

                <x-primary-button class="ms-4">
                    {{ __('Nuevo Producto') }}
                </x-primary-button>

            </form>
        </div>
    </x-modal>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4" x-data x-on:click="$dispatch('open-modal', '{{ $nombreModal }}')">
            {{ __('Nuevo Producto') }}
        </x-primary-button>


    </div>

</x-app-layout>