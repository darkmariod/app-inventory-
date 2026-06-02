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
        'name' => 'Editar'
    ]
]">

    <x-wire-card>
        <form action="{{route('admin.products.update', $product)}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <x-wire-input label="Nombre" name="name" placeholder="Nombre del producto" value="{{old('name', $product->name)}}" />

            <x-wire-textarea label="Descripción" name="description" placeholder="Descripción del producto">
                {{old('description', $product->description)}}
            </x-wire-textarea>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-wire-input label="SKU" name="sku" placeholder="Código SKU" value="{{old('sku', $product->sku)}}" />
                <x-wire-input label="Código de barras" name="barcode" placeholder="Código de barras" value="{{old('barcode', $product->barcode)}}" />
                <x-wire-input label="Precio" name="price" type="number" step="0.01" placeholder="0.00" value="{{old('price', $product->price)}}" />
            </div>

            <x-wire-native-select label="Categoría" name="category_id" placeholder="Seleccioná una categoría">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </x-wire-native-select>

            <div class="flex justify-end gap-2">
                <x-button href="{{route('admin.products.index')}}" outlined>
                    Cancelar
                </x-button>
                <x-button type="submit" primary>
                    Actualizar
                </x-button>
            </div>
        </form>
    </x-wire-card>

    {{-- Image upload section --}}
    <x-wire-card class="mt-6">
        <h3 class="text-lg font-medium mb-4">Imágenes del producto</h3>

        <!-- Dropzone -->
        <form action="{{ route('admin.products.images.store', $product) }}" method="POST" enctype="multipart/form-data" id="dropzone" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-400 transition">
            @csrf
            <p class="text-gray-500">Arrastrá las imágenes aquí o hacé click para subir</p>
            <p class="text-xs text-gray-400 mt-1">Máximo 10MB por imagen</p>
        </form>

        <!-- Existing images -->
        <div id="image-gallery" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
            @foreach($product->images as $image)
            <div class="relative group" data-image-id="{{ $image->id }}">
                <img src="{{ asset('storage/' . $image->path) }}" class="w-full h-32 object-cover rounded-lg">
                <button type="button"
                        onclick="deleteImage({{ $image->id }})"
                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition text-xs">
                    &times;
                </button>
            </div>
            @endforeach
        </div>
    </x-wire-card>

</x-admin-layout>

@push('scripts')
<script>
const dropzone = new Dropzone('#dropzone', {
    paramName: 'file',
    maxFilesize: 10,
    acceptedFiles: 'image/*',
    success: function(file, response) {
        const gallery = document.getElementById('image-gallery');
        const div = document.createElement('div');
        div.className = 'relative group';
        div.dataset.imageId = response.id;
        div.innerHTML = `
            <img src="${response.url}" class="w-full h-32 object-cover rounded-lg">
            <button type="button"
                    onclick="deleteImage(${response.id})"
                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition text-xs">
                &times;
            </button>
        `;
        gallery.appendChild(div);
    }
});

function deleteImage(imageId) {
    if (!confirm('¿Eliminar esta imagen?')) return;
    fetch('{{ route('admin.products.images.destroy', ['product' => $product, 'image' => '__IMAGE_ID__']) }}'.replace('__IMAGE_ID__', imageId), {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    }).then(r => {
        if (r.ok) {
            document.querySelector(`[data-image-id="${imageId}"]`).remove();
        }
    });
}
</script>
@endpush
