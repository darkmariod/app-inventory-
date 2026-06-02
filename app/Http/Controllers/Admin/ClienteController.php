<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Identity;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identities = Identity::all();
        return view('admin.clientes.create', compact('identities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'identity_id'      => 'required|exists:identities,id',
            'document_number'  => 'required|unique:customers,document_number',
            'name'             => 'required|max:255',
            'address'          => 'nullable|max:255',
            'email'            => 'nullable|email|max:255',
            'phone'            => 'nullable|max:20',
        ]);

        Customer::create($validated);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'El cliente se ha registrado correctamente.',
        ]);

        return redirect()->route('admin.clientes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $cliente)
    {
        $identities = Identity::all();
        return view('admin.clientes.edit', compact('cliente', 'identities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $cliente)
    {
        $validated = $request->validate([
            'identity_id'      => 'required|exists:identities,id',
            'document_number'  => 'required|unique:customers,document_number,' . $cliente->id,
            'name'             => 'required|max:255',
            'address'          => 'nullable|max:255',
            'email'            => 'nullable|email|max:255',
            'phone'            => 'nullable|max:20',
        ]);

        $cliente->update($validated);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'El cliente se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $cliente)
    {
        $cliente->delete();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'El cliente se ha eliminado correctamente.',
        ]);

        return redirect()->route('admin.clientes.index');
    }
}
