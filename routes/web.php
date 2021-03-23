<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ChartController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/erp/dashboard', [ChartController::class, 'charts'])->middleware('can:dashboard')->name('dashboard');

    //Route::get('/erp/user', [PagesController::class, 'tableUser'])->name('tablaU');
    Route::get('/erp/category', [CategoriaController::class, 'index'])->middleware('can:tabla')->name('tabla');
    Route::get('/erp/product', [ProductoController::class, 'index'])->middleware('can:tablaP')->name('tablaP');
    Route::get('/erp/client', [ClienteController::class, 'index'])->middleware('can:tablaC')->name('tablaC');
    Route::get('/erp/sale', [VentaController::class, 'index'])->middleware('can:tablaV')->name('tablaV');
    Route::get('/erp/user', [UserController::class, 'index'])->middleware('can:tablaU')->name('tablaU');


    Route::get('/erp/category/add', [PagesController::class, 'formCategory'])->middleware('can:category.add')->name('category.add');
    Route::get('/erp/product/add', [PagesController::class, 'formProduct'])->middleware('can:product.add')->name('product.add');
    Route::get('/erp/client/add', [PagesController::class, 'formClient'])->middleware('can:client.add')->name('client.add');
    Route::get('/erp/sale/add', [PagesController::class, 'formSale'])->middleware('can:sale.add')->name('sale.add');
    Route::get('/erp/user/add', [PagesController::class, 'formUser'])->middleware('can:user.add')->name('user.add');

    Route::post('/erp/category/add', [PagesController::class, 'addCategory'])->middleware('can:category.create')->name('category.create');
    Route::post('/erp/client/add', [PagesController::class, 'addClient'])->middleware('can:client.create')->name('client.create');
    Route::post('/erp/product/add', [PagesController::class, 'addProduct'])->middleware('can:product.create')->name('product.create');
    Route::post('/erp/sale/add', [PagesController::class, 'addSale'])->middleware('can:sale.create')->name('sale.create');

    Route::get('/erp/category/{id}/edit',[PagesController::class, 'editCategory'])->middleware('can:category.edit')->name('category.edit');
    Route::get('/erp/client/{id}/edit',[PagesController::class, 'editClient'])->middleware('can:client.edit')->name('client.edit');
    Route::get('/erp/product/{id}/edit',[PagesController::class, 'editProduct'])->middleware('can:product.edit')->name('product.edit');
    Route::get('/erp/sale/{id}/edit',[PagesController::class, 'editSale'])->middleware('can:product.edit')->name("sale.edit");
    Route::get('/erp/product/{id}',[ProductoController::class, 'productData']);

    Route::get('/erp/user/{id}',[UserController::class,'edit'])->middleware('can:user.edit')->name('user.edit');

    Route::put('/erp/category/{id}',[CategoriaController::class,'update'])->middleware('can:category.update')->name('category.update');
    Route::put('/erp/client/{id}',[ClienteController::class,'update'])->middleware('can:client.update')->name('client.update');
    Route::put('/erp/producto/{id}',[ProductoController::class,'update'])->middleware('can:product.update')->name('product.update');
    Route::put('/erp/user/{id}',[UserController::class,'update'])->middleware('can:user.update')->name('user.update');
    Route::put('/erp/sale/{id}',[VentaController::class,'update'])->middleware('can:sale.update')->name('sale.update');

    Route::delete('/erp/category/delete/{id}', [CategoriaController::class, 'destroy'])->middleware('can:category.destroy')->name('category.destroy');
    Route::delete('/erp/product/delete/{id}', [ProductoController::class, 'destroy'])->middleware('can:product.destroy')->name('product.destroy');
    Route::delete('/erp/client/delete/{id}', [ClienteController::class, 'destroy'])->middleware('can:client.destroy')->name('client.destroy');
    Route::delete('/erp/sale/delete/{id}', [VentaController::class, 'destroy'])->middleware('can:sale.destroy')->name('sale.destroy');
    Route::delete('/erp/user/delete/{id}', [UserController::class, 'destroy'])->middleware('can:user.destroy')->name('user.destroy');

    Route::get('/change/password', [UserController::class, 'change_password'])->name('password.get');
    Route::put('/change/password', [UserController::class, 'change'])->name('password.change');
});
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';
