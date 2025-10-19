<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
//Trae la clase Request, que permite acceder a los datos enviados por formularios HTTP.
use App\Models\Proveedor;//Trae el modelo Proveedor para usarlo en el controlador.
use Illuminate\Http\Request;

class BoletaController extends Controller
//Hereda de Controller, que ya trae funcionalidades base de Laravel, como middleware, validación, etc.
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtiene todas las boletas de la base de datos
        $boletas = Boleta::all();
        $proveedors = Proveedor::all();
        return view('boletas.index', compact('boletas', 'proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedors = Proveedor::all();//Obtiene todos los proveedores para mostrarlos en un select en el formulario de creación de boleta.
        //Muestra el formulario para crear una nueva boleta
        return view('boletas.create', compact('proveedors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //valida los datos enviados desde el formulario.
        $request->validate([
            'numero' => 'required|unique:boletas',
            'proveedor' => 'required',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        Boleta::create($request->only(['numero','proveedor','monto','fecha']));//Crea una nueva boleta en la base de datos con los datos validados del request.
        return redirect()->route('boletas.index')->with('success', 'Boleta creada correctamente.');//redirige a la lista de boletas y pasa un mensaje de éxito que se puede mostrar en la vista.
    }


    /**
     * Display the specified resource.
     */
    public function show(Boleta $boleta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    //Laravel usa Route Model Binding, así que $boleta viene directamente del ID en la URL.
    public function edit(Boleta $boleta)
    {
        $proveedors = Proveedor::all();
        return view('boletas.edit', compact('boleta', 'proveedors'));
        //Retorna la vista boletas.edit con los datos de esa boleta para poder editarla
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boleta $boleta)
    {
        //Valida los datos, similar a store(), pero en el campo numero permite el mismo número de la boleta actua
        $request->validate([
            'numero' => 'required|unique:boletas,numero,' . $boleta->id,
            'proveedor' => 'required',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $boleta->update($request->only(['numero', 'proveedor', 'monto', 'fecha']));//Actualiza la boleta en la base de datos con los datos validados del request.
        return redirect()->route('boletas.index')->with('success', 'Boleta actualizada correctamente.');//redirige a la lista de boletas con un mensaje de éxito

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boleta $boleta)
    {
        $boleta->delete();//elimina la boleta de la base de datos
        return redirect()->route('boletas.index')->with('success', 'Boleta eliminada correctamente.');//redirige a la lista de boletas con un mensaje de éxito
    }
}
