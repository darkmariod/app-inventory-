<div class="flex items-center space-x-2">
    <x-wire-button blue href="{{route('admin.categories.edit', $category)}}" xs> 
        Editar
    </x-wire-button>

    <form action="{{route('admin.categories.destroy', $category) }}",
     method="POST"
     class="delete-form">

     @csrf
     @method('DELETE')

    <x-wire-button type="submit" red xs>
            Eliminar
    </x-wire-button>    
    </form>
</div>