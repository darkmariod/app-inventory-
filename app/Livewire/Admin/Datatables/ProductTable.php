<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use App\Models\Category;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
        $this->setColumnSelectStatus(true);
        $this->setSearchPlaceholder('Buscar productos...');
        $this->setPerPageAccepted([5, 10, 25, 50]);
        $this->setPerPage(10);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),

            Column::make("SKU", "sku")
                ->searchable()
                ->sortable(),

            Column::make("Precio", "price")
                ->sortable()
                ->format(fn($value) => '$' . number_format($value, 2)),

            Column::make('Categoría')
                ->label(fn($row) => $row->category?->name ?? 'Sin categoría')
                ->sortable(function ($query, $direction) {
                    $query->orderBy(
                        Category::select('name')
                            ->whereColumn('categories.id', 'products.category_id'),
                        $direction
                    );
                })
                ->searchable(fn($query, $search) => $query->whereHas('category', fn($q) => $q->where('name', 'like', "%{$search}%"))),

            Column::make('Acciones')
                ->label(function($row) {
                   return view('admin.products.actions', ['product' => $row]);
                }),
        ];
    }
}
