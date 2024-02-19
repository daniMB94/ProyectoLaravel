<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!--AQUI TENDRE QUE PASAR LOS PRODUCTOS PARA PINTARLOS EN UNA TABLA-->

    <div
        class=" my-5 px-3 flex-wrap relative flex flex-col text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
        <form action="{{ route('dashboard.filtrar') }}" method="get">
            @csrf
            <x-input-label for="filtro" :value="__('Filtro de búsqueda')" />
            <x-text-input id="filtro" name="filtro" type="text" class="mt-2 px-2 py-2" :value="old('filtro')" required
                autofocus autocomplete="filtro" />
            <button class='mb-1' type="submit">Buscar</button>
            <x-secondary-button><a href="{{ route('dashboard') }}">Limpiar filtro</a></x-secondary-button>
        </form>
    </div>

    <x-table>
        <x-slot name="tcabecera">
            <x-table.th>Codigo</x-table.th>
            <x-table.th>Modelo</x-table.th>
            <x-table.th>Fabricante</x-table.th>
            <x-table.th>Stock</x-table.th>
            <x-table.th>Estado</x-table.th>
            <x-table.th>Categoria</x-table.th>
            <x-table.th>Acciones</x-table.th>
        </x-slot>

        @foreach ($productos as $producto)
        <tr>
            <x-table.td>{{ $producto->codigo }}</x-table.td>
            <x-table.td>{{ $producto->modelo }}</x-table.td>
            <x-table.td>{{ $producto->fabricante }}</x-table.td>
            <x-table.td>{{ $producto->stock }}</x-table.td>
            <x-table.td>{{ $producto->estado }}</x-table.td>
            <x-table.td>{{ optional($producto->categoria)->nombre }}</x-table.td>
            <x-table.td>


                <x-modal>
                    <x-slot name="name">{{ 'modal-' . $producto->id }}</x-slot>

                    <div
                        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

                        <x-detalle>

                            <x-slot name='localizacion'>
                                @if(isset($producto->localizacion))
                                <x-lista>
                                    <x-slot name="titulo">Dirección del proveedor</x-slot>
                                    <x-slot name="items">
                                        <x-lista.li>
                                            Ciudad: {{ $producto->localizacion->ciudad }}
                                        </x-lista.li>
                                        <x-lista.li>
                                            Edificio: {{ $producto->localizacion->nombre_edificio }}
                                        </x-lista.li>
                                        <x-lista.li>
                                            Direccion: {{ $producto->localizacion->direccion }}
                                        </x-lista.li>
                                        <x-lista.li>
                                            Numero de sala: {{ $producto->localizacion->numero_sala }}
                                        </x-lista.li>
                                    </x-slot>
                                </x-lista>
                                @else
                                <h3>Aún no tiene datos de localización asignados</h3>
                                @endif
                            </x-slot>
                            <x-slot name='descripcion'>
                                Descripcion del producto: {{ $producto->descripcion }}
                            </x-slot>
                            @if(isset($producto->imagen))
                            <x-slot name='imagen'>
                                {{ asset('images/' . $producto->imagen ) }}
                            </x-slot>
                            @else
                            <h3>No tiene ninguna imagen asignada</h3>
                            @endif
                        </x-detalle>



                        <x-secondary-button class="ms-4" x-data
                            x-on:click="$dispatch('close-modal', '{{ 'modal-' . $producto->id }}')">
                            {{__('Cerrar')}}
                        </x-secondary-button>

                        <x-primary-button class="ms-4">
                            <a href="{{ route('dashboard.formUpdateProduct', ['producto' => $producto]) }}">
                                {{__('Modificar producto')}}
                            </a>
                        </x-primary-button>


                    </div>
                </x-modal>
                <div class="flex items-center justify-end mt-4">
                    <x-secondary-button class="ms-4" x-data
                        x-on:click="$dispatch('open-modal', '{{ 'modal-' . $producto->id }}')" style="color: #4080ff">
                        {{__('Ver detalles')}}
                    </x-secondary-button>


                </div>

            </x-table.td>
            <x-table.td>
                <a class="font-medium text-sm" style="color: red"
                    href="{{ route('dashboard.delete', ['id' => $producto->id, 'page' => $productos->currentPage()]) }}">&emsp;&emsp;Eliminar</a>
            </x-table.td>
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
                        required autofocus autocomplete="imagen" />
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