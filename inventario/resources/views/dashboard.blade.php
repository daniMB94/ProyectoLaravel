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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
