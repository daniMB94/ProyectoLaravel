<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Borrar Producto') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Una vez hayas borrado el producto quedará eliminado para siempre y no será posible recuperar la información.') }}
        </p>
    </header>



    <x-danger-button class="ms-4">
        <a href="{{ route('dashboard.delete', ['id' => $producto->id, 'page' => 1]) }}">{{__('Borrar Producto')}}</a>
    </x-danger-button>