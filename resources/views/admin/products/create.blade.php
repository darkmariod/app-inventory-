<x-admin-layout
title="Productos"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
        'href' => route('admin.products.index'),
    ],
    [
        'name' => 'Nuevo'
    ]
]">

    <x-wire-card>
        <form action="{{route('admin.products.store')}}" method="POST" class="space-y-4">
            @csrf
            <x-wire-input label="Nombre" name="name" placeholder="Nombre del producto" value="{{old('name')}}" />

            <x-wire-textarea label="Descripción" name="description" placeholder="Descripción del producto">
                {{old('description')}}
            </x-wire-textarea>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-wire-input label="SKU" name="sku" placeholder="Código SKU" value="{{old('sku')}}" />
                <x-wire-input label="Código de barras" name="barcode" placeholder="Código de barras" value="{{old('barcode')}}" />
                <x-wire-input label="Precio" name="price" type="number" step="0.01" placeholder="0.00" value="{{old('price')}}" />
            </div>

            <x-wire-native-select label="Categoría" name="category_id" placeholder="Seleccioná una categoría">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </x-wire-native-select>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>
