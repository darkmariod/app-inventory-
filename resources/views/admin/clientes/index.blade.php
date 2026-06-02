<x-admin-layout
title="Clientes"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Clientes',
    ]
]">
    <x-slot name="action">
        <x-wire-button href="{{route('admin.clientes.create')}}" blue>
            Nuevo
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.cliente-table')

</x-admin-layout>
