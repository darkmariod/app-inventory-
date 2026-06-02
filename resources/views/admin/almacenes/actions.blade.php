<div class="flex items-center space-x-2">
    <x-wire-button blue href="{{route('admin.almacenes.edit', $almacene)}}" xs>
        Editar
    </x-wire-button>

    <form action="{{route('admin.almacenes.destroy', $almacene)}}"
     method="POST"
     id="delete-form-{{ $almacene->id }}">

     @csrf
     @method('DELETE')

    <x-wire-button type="button" red xs onclick="confirmDelete({{ $almacene->id }})">
            Eliminar
    </x-wire-button>
    </form>
</div>
