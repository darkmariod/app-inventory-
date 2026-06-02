<div class="flex items-center space-x-2">
    <x-wire-button blue href="{{route('admin.clientes.edit', $cliente)}}" xs>
        Editar
    </x-wire-button>

    <form action="{{route('admin.clientes.destroy', $cliente)}}"
     method="POST"
     id="delete-form-{{ $cliente->id }}">

     @csrf
     @method('DELETE')

    <x-wire-button type="button" red xs onclick="confirmDelete({{ $cliente->id }})">
            Eliminar
    </x-wire-button>
    </form>
</div>
