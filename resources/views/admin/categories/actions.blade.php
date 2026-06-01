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

    @push('swal-confirm')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede deshacer',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
    @endpush
</div>