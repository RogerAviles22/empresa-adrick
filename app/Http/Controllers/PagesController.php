<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * PagesController será el Controller encargado de cargar las vistas (View) y además
 * de crear los CRUD de los respectivos elementos.  
 */
class PagesController extends Controller
{
    public function home(){
        return view('home');
    }
}
