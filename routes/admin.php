<?php

use App\Http\Controllers\Admin\AlmacenController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductoImagenController;
use App\Http\Controllers\Admin\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class)->names('categories')->except(['show']);

Route::resource('clientes', ClienteController::class)->names('clientes')->except(['show']);

Route::resource('almacenes', AlmacenController::class)->except(['show']);

Route::resource('proveedores', ProveedorController::class)->names('proveedores')->except(['show']);

Route::resource('products', ProductController::class)->except(['show']);

// Image upload routes — must be AFTER the resource route so {product} binding resolves
Route::post('products/{product}/images', [ProductoImagenController::class, 'store'])->name('products.images.store');
Route::delete('products/{product}/images/{image}', [ProductoImagenController::class, 'destroy'])->name('products.images.destroy');
