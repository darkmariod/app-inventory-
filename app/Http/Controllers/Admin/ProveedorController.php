<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Identity;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $proveedores = Supplier::with('identity')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('document_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(10);

        return view('admin.proveedores.index', compact('proveedores', 'search'));
    }

    public function create()
    {
        $identities = Identity::all();
        return view('admin.proveedores.create', compact('identities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'identity_id'      => 'required|exists:identities,id',
            'document_number'  => 'required|unique:suppliers,document_number',
            'name'             => 'required|max:255',
            'address'          => 'nullable|max:255',
            'email'            => 'nullable|email|max:255',
            'phone'            => 'nullable|max:20',
        ]);

        Supplier::create($validated);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'El proveedor se ha registrado correctamente.',
        ]);

        return redirect()->route('admin.proveedores.index');
    }

    public function edit(Supplier $proveedore)
    {
        $identities = Identity::all();
        return view('admin.proveedores.edit', compact('proveedore', 'identities'));
    }

    public function update(Request $request, Supplier $proveedore)
    {
        $validated = $request->validate([
            'identity_id'      => 'required|exists:identities,id',
            'document_number'  => 'required|unique:suppliers,document_number,' . $proveedore->id,
            'name'             => 'required|max:255',
            'address'          => 'nullable|max:255',
            'email'            => 'nullable|email|max:255',
            'phone'            => 'nullable|max:20',
        ]);

        $proveedore->update($validated);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'El proveedor se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.proveedores.index');
    }

    public function destroy(Supplier $proveedore)
    {
        $proveedore->delete();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'El proveedor se ha eliminado correctamente.',
        ]);

        return redirect()->route('admin.proveedores.index');
    }
}
