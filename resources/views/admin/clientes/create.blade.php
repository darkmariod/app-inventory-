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
        'name' => 'Nuevo'
    ]
]">

    <x-wire-card>
        <form action="{{route('admin.clientes.store')}}" method="POST" class="space-y-4">
            @csrf

            <x-wire-native-select
                label="Tipo Documento"
                name="identity_id"
                :options="$identities"
                option-label="name"
                option-value="id"
                placeholder="Seleccione..."
            />

            <x-wire-input
                label="N° Documento"
                name="document_number"
                placeholder="Número de documento"
                value="{{old('document_number')}}"
            />

            <x-wire-input
                label="Nombre"
                name="name"
                placeholder="Nombre completo"
                value="{{old('name')}}"
            />

            <x-wire-input
                label="Dirección"
                name="address"
                placeholder="Dirección (opcional)"
                value="{{old('address')}}"
            />

            <x-wire-input
                label="Email"
                name="email"
                type="email"
                placeholder="correo@ejemplo.com (opcional)"
                value="{{old('email')}}"
            />

            <x-wire-input
                label="Teléfono"
                name="phone"
                placeholder="Teléfono (opcional)"
                value="{{old('phone')}}"
            />

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>
