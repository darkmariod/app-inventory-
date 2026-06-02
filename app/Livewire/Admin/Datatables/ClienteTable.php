<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Customer;

class ClienteTable extends DataTableComponent
{
    protected $model = Customer::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('name', 'asc');
        $this->setColumnSelectStatus(true);
        $this->setSearchPlaceholder('Buscar clientes...');
        $this->setPerPageAccepted([10, 25, 50]);
        $this->setPerPage(10);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Documento", "document_number")
                ->searchable(),
            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->searchable(),
            Column::make("Teléfono", "phone"),
            Column::make('Acciones')
                ->label(function($row) {
                   return view('admin.clientes.actions', ['cliente' => $row]);
                }),
        ];
    }
}
