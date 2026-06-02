<x-admin-layout
    title="Almacenes"
    :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Almacenes',
            'href' => route('admin.almacenes.index'),
        ],
        [
            'name' => 'Editar'
        ]
    ]">

    <x-wire-card>
        <form action="{{route('admin.almacenes.update', $almacene)}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre" name="name" placeholder="Nombre del almacén" value="{{old('name', $almacene->name)}}" />

            <x-wire-input label="Ubicación" name="location" placeholder="Ubicación del almacén" value="{{old('location', $almacene->location)}}" />

            <div class="flex justify-end gap-2">
                <x-button href="{{route('admin.almacenes.index')}}" outlined>
                    Cancelar
                </x-button>
                <x-button type="submit" primary>
                    Actualizar
                </x-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>
