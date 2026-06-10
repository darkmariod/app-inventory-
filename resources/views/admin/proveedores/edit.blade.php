<x-admin-layout
title="Proveedores"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Proveedores',
        'href' => route('admin.proveedores.index'),
    ],
    [
        'name' => 'Editar'
    ]
]">

    <x-wire-card>
        <form action="{{route('admin.proveedores.update', $proveedore)}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <x-wire-native-select
                label="Tipo Documento"
                name="identity_id"
                :options="$identities"
                option-label="name"
                option-value="id"
                placeholder="Seleccione..."
                :value="old('identity_id', $proveedore->identity_id)"
            />

            <x-wire-input
                label="N° Documento"
                name="document_number"
                placeholder="Número de documento"
                value="{{old('document_number', $proveedore->document_number)}}"
            />

            <x-wire-input
                label="Nombre"
                name="name"
                placeholder="Nombre completo"
                value="{{old('name', $proveedore->name)}}"
            />

            <x-wire-input
                label="Dirección"
                name="address"
                placeholder="Dirección (opcional)"
                value="{{old('address', $proveedore->address)}}"
            />

            <x-wire-input
                label="Email"
                name="email"
                type="email"
                placeholder="correo@ejemplo.com (opcional)"
                value="{{old('email', $proveedore->email)}}"
            />

            <x-wire-input
                label="Teléfono"
                name="phone"
                placeholder="Teléfono (opcional)"
                value="{{old('phone', $proveedore->phone)}}"
            />

            <div class="flex justify-end gap-2">
                <x-button href="{{route('admin.proveedores.index')}}" outlined>
                    Cancelar
                </x-button>
                <x-button type="submit" primary>
                    Actualizar
                </x-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>
