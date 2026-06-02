<x-admin-layout
    title="Almacenes"
    :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Almacenes',
        ]
    ]">
    <x-slot name="action">
        <x-wire-button href="{{route('admin.almacenes.create')}}" blue>
            Nuevo
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.almacen-table')

</x-admin-layout>
