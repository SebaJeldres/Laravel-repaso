<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedors = proveedor::all();
        return view('boletas.index', compact('boletas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:proveedors',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'supervisor' => 'required',
        ]);

        proveedor::create($request->only(['nombre','direccion','telefono','email','supervisor']));
        return redirect()->route('boletas.index')->with('success', 'Proveedor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(proveedor $proveedor)
    {
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|unique:proveedors,nombre,'.$proveedor->id,
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'supervisor' => 'required',
        ]);

        $proveedor->update($request->only(['nombre','direccion','telefono','email','supervisor']));
        return redirect()->route('boletas.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('boletas.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
