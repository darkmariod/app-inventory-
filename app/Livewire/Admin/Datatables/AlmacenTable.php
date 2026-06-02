<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Warehouse;

class AlmacenTable extends DataTableComponent
{
    protected $model = Warehouse::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('name', 'asc');
        $this->setColumnSelectStatus(true);
        $this->setSearchPlaceholder('Buscar almacenes...');
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
            Column::make("Ubicación", "location")
                ->searchable()
                ->sortable(),
            Column::make('Acciones')
                ->label(function($row) {
                   return view('admin.almacenes.actions', ['almacene' => $row]);
                })
        ];
    }
}
