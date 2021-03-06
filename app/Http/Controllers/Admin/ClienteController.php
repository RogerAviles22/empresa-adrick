<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $clients = Cliente::all();
        return view('table.tablaC', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $newCl = new Cliente;
        $newCl->nombre = $request->input('nombre');
        $newCl->apellido = $request->input('apellido');
        $newCl->direccion = $request->input('direccion');
        $newCl->cedula = $request->input('cedula');
        $newCl->telefono = $request->input('telefono');
        $newCl->correo_electronico = $request->input('correo');
        $newCl->save();
        return redirect()->route('tablaC');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

            $client= Cliente::findOrFail($id);
            return view('forms.formCledit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $clientN = Cliente::findOrFail($id);
        $clientN->nombre = $request->input('nombre');
        $clientN->apellido = $request->input('apellido');
        $clientN->direccion = $request->input('direccion');
        $clientN->cedula = $request->input('cedula');
        $clientN->telefono = $request->input('telefono');
        $clientN->correo_electronico = $request->input('correo');
        $clientN->save();
        return redirect()->route('tablaC')->with('Info:','Se actualiz?? el cliente con id: '.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Cliente::findOrFail($id);
        $product->delete();
        return back()->with('eliminar','ok');
    }
}
