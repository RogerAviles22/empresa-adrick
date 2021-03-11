<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * PagesController será el Controller encargado de cargar las vistas (View) y además
 * de crear los CRUD de los respectivos elementos.  
 */
class PagesController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function tableCategory(){
        return view('table.tabla');
    }

    public function tableProduct(){
        return view('table.tablaP');
    }

    public function tableClient(){
        return view('table.tablaC');
    }

    public function tableSale(){
        return view('table.tablaV');
    }

    public function tableUser(){
        return view('table.tablaU');
    }

}
