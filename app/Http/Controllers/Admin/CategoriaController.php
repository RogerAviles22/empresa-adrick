<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categoria::all();
        return view('table.tabla', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $newCat = new Categoria;
        $newCat->nombre = $request->input('nombre');
        $newCat->save();
        return redirect()->route('tabla');

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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Categoria::findOrFail($id);
        return view('forms.formCedit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $categoriaN = Categoria::findOrFail($id);
        $categoriaN->nombre = $request->input('nombre');
        $categoriaN->save();
        return redirect()->route('tabla')->with('Info:','Se actualizó la categoria con id: '.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy ($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return back()->with('eliminar','ok');
    }
}
