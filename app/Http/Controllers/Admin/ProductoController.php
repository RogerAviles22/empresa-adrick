<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use Symfony\Component\HttpFoundation\Response;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = DB::table('productos')
                                ->join('categorias', 'productos.id_categoria', '=', 'categorias.id')
                                ->select('productos.*','categorias.nombre')
                                ->get();
        return view('table.tablaP', compact('products'));
        //return $products;
    }

    public function productData($id){
        $product= DB::table('productos')
                                ->join('categorias', 'productos.id_categoria', '=', 'categorias.id')
                                ->select('productos.*','categorias.nombre')
                                ->where('productos.id','=', $id)
                                ->get();

        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $newP = new Producto;
            $newP->nom_producto = $request->input('nombre');
            $newP->precio = $request->input('precio');
            $newP->id_categoria = $request->input('categoria');
        $newP->stock = $request->input('stock');
            $newP->save();
           return redirect()->route('tablaP');
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product= Producto::findOrFail($id);
        $cats = Categoria::orderBy('nombre','desc')->get();
        $data = ["cats" => $cats, "product" => $product];

        return view('forms.formPedit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $newP = Producto::findOrFail($id);
        $newP->nom_producto = $request->input('nombre');
        $newP->precio = $request->input('precio');
        $newP->id_categoria = $request->input('categoria');
        $newP->stock = $request->input('stock');
        $newP->save();
        return redirect()->route('tablaP')->with('Info:','Se actualizó el producto con id: '.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $product = Producto::findOrFail($id);
        $product->delete();
        return back()->with('eliminar','ok');
    }
}
