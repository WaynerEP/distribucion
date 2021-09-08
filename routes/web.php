<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\categoriaController;
use App\Http\Livewire\almacenController;
use App\Http\Livewire\productoController;
use App\Http\Livewire\clienteController;
use App\Http\Livewire\ZonaController;
use App\Http\Livewire\ciudadanoController;
use App\Http\Livewire\transporteController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', categoriaController::class)->name('categories')->middleware('auth');

Route::get('/almacenes', almacenController::class)->name('almacenes')->middleware('auth');

Route::get('/products', productoController::class)->name('products')->middleware('auth');

Route::get('/clientes', clienteController::class)->name('clientes')->middleware('auth');

Route::get('/zonas', zonaController::class)->name('zonas')->middleware('auth');

Route::get('/ciudadanos', ciudadanoController::class)->name('ciudadanos')->middleware('auth');

Route::get('/transporte', transporteController::class)->name('transporte')->middleware('auth');

Route::get('/user_profile', [App\Http\Controllers\profileController::class, 'index'])->name('user_profile')->middleware('auth');

Route::get('/edit_profile', [App\Http\Controllers\profileController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
