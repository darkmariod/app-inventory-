<div class="flex items-center space-x-2">
    <x-wire-button blue href="{{route('admin.products.edit', $product)}}" xs>
        Editar
    </x-wire-button>

    <form action="{{route('admin.products.destroy', $product)}}"
     method="POST"
     id="delete-form-{{ $product->id }}">

     @csrf
     @method('DELETE')

    <x-wire-button type="button" red xs onclick="confirmDelete({{ $product->id }})">
            Eliminar
    </x-wire-button>
    </form>
</div>
