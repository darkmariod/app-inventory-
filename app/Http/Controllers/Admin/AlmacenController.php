<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.almacenes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.almacenes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:warehouses,name',
            'location' => 'nullable|string|max:255',
        ]);

        Warehouse::create($validated);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'El almacén se ha registrado correctamente.',
        ]);

        return redirect()->route('admin.almacenes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $almacene)
    {
        return view('admin.almacenes.edit', compact('almacene'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $almacene)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:warehouses,name,' . $almacene->id,
            'location' => 'nullable|string|max:255',
        ]);

        $almacene->update($validated);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'El almacén se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.almacenes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $almacene)
    {
        $almacene->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'El almacén se ha eliminado correctamente.',
        ]);

        return redirect()->route('admin.almacenes.index');
    }
}
