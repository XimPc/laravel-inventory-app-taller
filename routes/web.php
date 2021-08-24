<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('main');

// =================== Rutas para producto ====================

Route::get(
    '/products',
    [ProductsController::class, 'showProducts']
)->name('products.getAll');

Route::get(
    '/products/add/{id?}',
    [ProductsController::class, 'formAddProducts']
)->name('add.Products');

Route::post(
    '/products/add/',
    [ProductsController::class, 'save']
)->name('save.Product');

Route::get(
    'product/delete/{id}',
    [ProductsController::class, 'delete']
)->name('product.Delete');

//====================== Rutas para Marcas =========================

Route::get(
    '/brand',
    [BrandController::class, 'showBrands']
)->name('brand.getAll');

Route::get(
    '/brand/add/{id?}',
    [BrandController::class, 'showFormBrand']
)->name('brand.add');

Route::post(
    '/brand/add/',
    [BrandController::class, 'save']
)->name('brand.Save');

Route::get(
    'brand/delete/{id}',
    [BrandController::class, 'delete']
)->name('brand.Delete');

//====================== Rutas para Categories =========================

Route::get(
    '/category',
    [CategoryController::class, 'getList']
)->name('category.getAll');

// Ruta para añadir productos
Route::get(
    '/category/add/{id?}',
    [CategoryController::class, 'add']
)->name('category.add');

//Ruta para salvar
Route::post(
    '/category/add',
    [CategoryController::class, 'save']
)->name('category.save');

// Ruta para eliminar
Route::get(
    'category/delete/{id}',
    [CategoryController::class, 'delete']
)->name('category.delete');

//==================== Rutas de autenticación ============================

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
