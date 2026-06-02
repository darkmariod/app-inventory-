<x-admin-layout
title="Productos"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
    ]
]">
    <x-slot name="action">
        <x-wire-button href="{{route('admin.products.create')}}" blue>
            Nuevo
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.product-table')

</x-admin-layout>
