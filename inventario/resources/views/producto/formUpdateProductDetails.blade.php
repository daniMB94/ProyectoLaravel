<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Información del producto') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Actualiza la información del producto y agregale una localización") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('dashboard.updateProduct', ['id' => $producto->id]) }}"
        enctype="multipart/form-data">
        @csrf

        <!-- Codigo -->
        <div>
            <x-input-label for="codigo" :value="__('Codigo del producto')" />
            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="$producto->codigo"
                required autofocus autocomplete="codigo" />
            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
        </div>

        <!-- Modelo -->
        <div>
            <x-input-label for="modelo" :value="__('Modelo')" />
            <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="$producto->modelo"
                required autofocus autocomplete="modelo" />
            <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
        </div>

        <!-- Fabricante -->
        <div>
            <x-input-label for="fabricante" :value="__('Fabricante')" />
            <x-text-input id="fabricante" class="block mt-1 w-full" type="text" name="fabricante"
                :value="$producto->fabricante" required autofocus autocomplete="fabricante" />
            <x-input-error :messages="$errors->get('fabricante')" class="mt-2" />
        </div>

        <!-- Descripción -->
        <div>
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <x-text-input id="descripcion" class="block mt-1 w-full" type="textarea" name="descripcion"
                :value="$producto->descripcion" required autofocus autocomplete="descripcion" />
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <!-- Imagen -->
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="text" name="imagen" :value="$producto->imagen"
                required autofocus autocomplete="imagen" />
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>

        <!-- Stock -->
        <div>
            <x-input-label for="stock" :value="__('Stock')" />
            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="$producto->stock"
                required autofocus autocomplete="stock" />
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>

        <!-- Estado -->
        <div class="mb-4">
            <x-input-label for="estado" :value="__('Estado')" />
            <select id="estado" name="estado">
                <option value="desaparecido">Desaparecido</option>
                <option value="activo">Activo</option>
                <option value="roto">Roto</option>
            </select>
        </div>


        @if(isset($producto->localizacion))
        @php
        $ciudad = $producto->localizacion->ciudad;
        $edificio = $producto->localizacion->nombre_edificio;
        $direccion = $producto->localizacion->direccion;
        $sala = $producto->localizacion->numero_sala;
        @endphp

        <fieldset class="p-4">
            <legend>Dirección del proveedor</legend>
            <!-- Ciudad -->
            <div>
                <x-input-label for="ciudad" :value="__('Ciudad del proveedor')" />
                <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="$ciudad" required
                    autofocus autocomplete="ciudad" />
                <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
            </div>

            <!-- Edificio -->
            <div>
                <x-input-label for="nombre_edificio" :value="__('Edificio')" />
                <x-text-input id="nombre_edificio" class="block mt-1 w-full" type="text" name="nombre_edificio"
                    :value="$edificio" required autofocus autocomplete="nombre_edificio" />
                <x-input-error :messages="$errors->get('nombre_edificio')" class="mt-2" />
            </div>

            <!-- Dirección -->
            <div>
                <x-input-label for="direccion" :value="__('Dirección')" />
                <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="$direccion"
                    required autofocus autocomplete="direccion" />
                <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
            </div>

            <!-- Número de sala -->
            <div>
                <x-input-label for="numero_sala" :value="__('Número de sala')" />
                <x-text-input id="numero_sala" class="block mt-1 w-full" type="number" name="numero_sala" :value="$sala"
                    required autofocus autocomplete="numero_sala" />
                <x-input-error :messages="$errors->get('numero_sala')" class="mt-2" />
            </div>
        </fieldset>


        <x-primary-button class="ms-4">
            {{ __('Actualizar Producto') }}
        </x-primary-button>

    </form>

    @else
    </form>
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
                <input type="hidden" name="pintarDashboard" value="false">
                <input type="hidden" name="id_producto" value="{{ $producto->id }}">

                <x-primary-button class="ms-4">
                    {{ __('Crear nueva localizacion') }}
                </x-primary-button>

            </form>
        </div>
    </x-modal>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4" x-data x-on:click="$dispatch('open-modal', '{{ $nombreModal }}')">
            {{ __('Crear Localizacion') }}
        </x-primary-button>
    </div>

    @endif



</section>