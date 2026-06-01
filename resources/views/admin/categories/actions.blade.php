<div class="flex items-center space-x-2">
    <x-wire-button blue href="{{route('admin.categories.edit', $category)}}" xs> 
        Editar
    </x-wire-button>

    <form action="{{route('admin.categories.destroy', $category)}}"
     method="POST"
     id="delete-form-{{ $category->id }}">

     @csrf
     @method('DELETE')

    <x-wire-button type="button" red xs onclick="confirmDelete({{ $category->id }})">
            Eliminar
    </x-wire-button>    
    </form>
</div>