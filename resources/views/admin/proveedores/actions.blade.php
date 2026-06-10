<div class="flex items-center space-x-2">
    <x-wire-button blue href="{{route('admin.proveedores.edit', $proveedore)}}" xs>
        Editar
    </x-wire-button>

    <form action="{{route('admin.proveedores.destroy', $proveedore)}}"
     method="POST"
     id="delete-form-{{ $proveedore->id }}">

     @csrf
     @method('DELETE')

    <x-wire-button type="button" red xs onclick="confirmDelete({{ $proveedore->id }})">
            Eliminar
    </x-wire-button>
    </form>
</div>
