<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;

/**
 * PagesController será el Controller encargado de cargar las vistas (View) y además
 * de crear los CRUD de los respectivos elementos.
 */
class PagesController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    /*public function tableCategory(){
        return view('table.tabla');
    }*/

    /*public function tableProduct(){
        return view('table.tablaP');
    }*/

    public function tableClient(){
        return view('table.tablaC');
    }

    public function tableSale(){
        return view('table.tablaV');
    }

    public function tableUser(){
        return view('table.tablaU');
    }

    public function formCategory(){
        return view('forms.form');
    }

    public function formClient(){
        return view('forms.formCl');
    }

    public function formProduct(){
        $cats = Categoria::orderBy('nombre','desc')->get();
        return view('forms.formP',compact('cats'));
    }

    public function addCategory(Request $request){
        $newCat = new Categoria;
        $newCat->nombre = $request->input('nombre');
        $newCat->save();
        return redirect()->route('tabla');

    }

    public function addClient(Request $request){
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

    public function addProduct(Request $request){
        $newP = new Producto;
        $newP->nom_producto = $request->input('nombre');
        $newP->precio = $request->input('precio');
        $newP->id_categoria = $request->input('categoria');
        $newP->stock = $request->input('stock');
        $newP->save();
        return redirect()->route('tablaP');
    }

    public function editCategory($id){
        $category = Categoria::findOrFail($id);
        return view('forms.formCedit', compact('category'));
    }

    public function editClient($id){
        $client= Cliente::findOrFail($id);
        return view('forms.formCledit', compact('client'));
    }

    public function editProduct($id){
        $product= Producto::findOrFail($id);
        $cats = Categoria::orderBy('nombre','desc')->get();
        $data = ["cats" => $cats, "product" => $product];
        return view('forms.formPedit', compact('data'));
    }

}
