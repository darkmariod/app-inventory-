<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('name', 'asc');
        $this->setColumnSelectStatus(true);
        $this->setSearchPlaceholder('Buscar categorías...');
        $this->setPerPageAccepted([5, 10, 25, 50]);
        $this->setPerPage(10);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),
            Column::make("Descripción", "description")
                ->searchable()
                ->sortable(),
            Column::make('Acciones')
                ->label(function($row) {
                   return view('admin.categories.actions', ['category' => $row]);
                })
        ];
    }
}
