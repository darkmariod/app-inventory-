<x-admin-layout
title="Proveedores"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Proveedores',
    ]
]">
    <x-slot name="action">
        <x-wire-button href="{{route('admin.proveedores.create')}}" blue>
            Nuevo
        </x-wire-button>
    </x-slot>

    <x-wire-card>
        <form method="GET" class="mb-4">
            <x-wire-input
                name="search"
                placeholder="Buscar proveedores..."
                value="{{ $search }}"
            />
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3">Documento</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Teléfono</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $proveedore)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $proveedore->document_number }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $proveedore->name }}</td>
                            <td class="px-4 py-3">{{ $proveedore->email ?? '—' }}</td>
                            <td class="px-4 py-3">{{ $proveedore->phone ?? '—' }}</td>
                            <td class="px-4 py-3">
                                @include('admin.proveedores.actions')
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                                No se encontraron proveedores
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $proveedores->appends(['search' => $search])->links() }}
        </div>
    </x-wire-card>

</x-admin-layout>
