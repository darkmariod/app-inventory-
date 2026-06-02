<x-admin-layout
title="Clientes"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Clientes',
        'href' => route('admin.clientes.index'),
    ],
    [
        'name' => 'Editar'
    ]
]">

    <x-wire-card>
        <form action="{{route('admin.clientes.update', $cliente)}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <x-wire-native-select
                label="Tipo Documento"
                name="identity_id"
                :options="$identities"
                option-label="name"
                option-value="id"
                placeholder="Seleccione..."
                :value="old('identity_id', $cliente->identity_id)"
            />

            <x-wire-input
                label="N° Documento"
                name="document_number"
                placeholder="Número de documento"
                value="{{old('document_number', $cliente->document_number)}}"
            />

            <x-wire-input
                label="Nombre"
                name="name"
                placeholder="Nombre completo"
                value="{{old('name', $cliente->name)}}"
            />

            <x-wire-input
                label="Dirección"
                name="address"
                placeholder="Dirección (opcional)"
                value="{{old('address', $cliente->address)}}"
            />

            <x-wire-input
                label="Email"
                name="email"
                type="email"
                placeholder="correo@ejemplo.com (opcional)"
                value="{{old('email', $cliente->email)}}"
            />

            <x-wire-input
                label="Teléfono"
                name="phone"
                placeholder="Teléfono (opcional)"
                value="{{old('phone', $cliente->phone)}}"
            />

            <div class="flex justify-end gap-2">
                <x-button href="{{route('admin.clientes.index')}}" outlined>
                    Cancelar
                </x-button>
                <x-button type="submit" primary>
                    Actualizar
                </x-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>
