<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Factura;
use App\Models\DetalleFactura;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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

    public function formSale(){
        $clients = CLiente::orderBy('nombre','desc')->get();
        $products = Producto::orderBy('nom_producto','desc')->get();
        $data=["clients"=>$clients,
        "products"=>$products];
        return view('forms.formV',compact('data'));
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

    public function addSale(Request $request){
        $newF = new Factura;
        $fecha = date('Y-m-d',strtotime($request->input('fechafac')));
        $newF->fecha = $fecha;
        $newF->total = floatval($request->input('total'));
        $newF->id_cliente = $request->input('cliente');
        $newF->save();
        for ($i = 0; $i < count($request->id_prods); $i++) {
            $this->addSaleDetail($request->id_prods[$i],$request->cantidad[$i],$request->totales[$i],$request->precio[$i],$newF->id);
        }
        return redirect()->route('tablaV');
        // $newF->save();


    }

    public function addSaleDetail($idp,$cantidad,$total,$precio, $id){

        $newD = new DetalleFactura;
        $newD->cantidad=$cantidad;
        $newD->total=$total;
        $newD->precioUnitario=$precio;
        $newD->id_factura=$id;
        $newD->id_producto=$idp;
        $newD->save();


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
