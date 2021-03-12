<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/erp/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::get('/erp/category', [CategoriaController::class, 'index'])->name('tabla');
Route::get('/erp/product', [ProductoController::class, 'index'])->name('tablaP');
Route::get('/erp/client', [ClienteController::class, 'index'])->name('tablaC');
Route::get('/erp/sale', [PagesController::class, 'tableSale'])->name('tablaV');
Route::get('/erp/user', [PagesController::class, 'tableUser'])->name('tablaU');


Route::get('/erp/category/add', [PagesController::class, 'formCategory'])->name('category.add');
Route::get('/erp/product/add', [PagesController::class, 'formProduct'])->name('product.add');
Route::get('/erp/client/add', [PagesController::class, 'formClient'])->name('client.add');
Route::get('/erp/sale/add', [PagesController::class, 'formSale'])->name('sale.add');
Route::get('/erp/user/add', [PagesController::class, 'formUser'])->name('user.add');

Route::post('/erp/category/add', [PagesController::class, 'addCategory'])->name('category.create');
Route::post('/erp/client/add', [PagesController::class, 'addClient'])->name('client.create');
Route::post('/erp/product/add', [PagesController::class, 'addProduct'])->name('product.create');


Route::delete('/erp/category/delete/{id}', [CategoriaController::class, 'destroy'])->name('category.destroy');
Route::delete('/erp/product/delete/{id}', [ProductoController::class, 'destroy'])->name('product.destroy');
Route::delete('/erp/client/delete/{id}', [ClienteController::class, 'destroy'])->name('client.destroy');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';
