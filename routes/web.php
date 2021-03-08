<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
    Aquí se cargarán las rutas de nuestra aplicación a partir del PagesController.
    El 1er argumento es la ruta que se mostrará en la pág.
    El 2do argumento es el nombre de la función escrita en PageController que traerá la vista 
    o acción.
    El 3er argumento es muy útil para ser utilizado en etiquetas con atributo href, ya que al haber 
    un cambio en el nombre de la ruta, no habría de cambiar dicha referencia en cada etiqueta 
    que hayamos puesto en la página.
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/erp/dashboard', [PagesController::class, 'home'])->name('home');


