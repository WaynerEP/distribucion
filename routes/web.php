<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\usersController;
use App\Http\Livewire\rolesController;
use App\Http\Livewire\permisosController;
use App\Http\Livewire\categoriaController;
use App\Http\Livewire\almacenController;
use App\Http\Livewire\productoController;
use App\Http\Livewire\clienteController;
use App\Http\Livewire\ZonaController;
use App\Http\Livewire\ciudadanoController;
use App\Http\Livewire\transporteController;
use App\Http\Livewire\pedidoController;
use App\Http\Livewire\reportesController;
use App\Http\Livewire\editPedido;
use App\Http\Livewire\listaPedidosController;

// use App\Http\Livewire\reportesController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Roles usuarios
Route::get('/users/list', usersController::class)->name('usersList')->middleware('auth');
Route::get('/users/roles', rolesController::class)->name('roles')->middleware('auth');
Route::get('/users/permisos', permisosController::class)->name('permisos')->middleware('auth');


//mantenedor-modulos
Route::get('/modules/categories', categoriaController::class)->name('categories')->middleware('auth');
Route::get('/modules/almacenes', almacenController::class)->name('almacenes')->middleware('auth');
Route::get('/modules/products', productoController::class)->name('products')->middleware('auth');
Route::get('/modules/clientes', clienteController::class)->name('clientes')->middleware('auth');
Route::get('/modules/zonas', zonaController::class)->name('zonas')->middleware('auth');
Route::get('/modules/ciudadanos', ciudadanoController::class)->name('ciudadanos')->middleware('auth');
Route::get('/modules/transporte', transporteController::class)->name('transporte')->middleware('auth');


//Pedidos
Route::get('/pedidos/create', pedidoController::class)->name('createPedidos')->middleware('auth');
Route::get('/pedidos/list', [App\Http\Controllers\pedidosController::class, 'ListPedidos'])->name('listPedidos')->middleware('auth');
Route::get('/pedidos/{id}/edit', editPedido::class)->name('editPedido')->middleware('auth');


//Reportes
Route::get('/reportes/pedidos', reportesController::class)->name('reportes')->middleware('auth');
//pdf
Route::get('/reportes/pdf/{empleado}/{type}/{f1}/{f2}',  [App\Http\Controllers\reportesController::class, 'reportPDF']);
Route::get('/reportes/pdf/{empleado}/{type}',  [App\Http\Controllers\reportesController::class, 'reportPDF']);
//excel
Route::get('/reportes/excel/{empleado}/{type}/{f1}/{f2}',  [App\Http\Controllers\reportesController::class, 'reportEXCEL']);
Route::get('/reportes/excel/{empleado}/{type}',  [App\Http\Controllers\reportesController::class, 'reportEXCEL']);

// Route::get('/email', function () {
//     return view('Email.sendEmail');
// });

//Pedidos
Route::get('/listPedidos/create', listaPedidosController::class)->name('createListOrder')->middleware('auth');
Route::get('/listPedidos/list', [App\Http\Controllers\listaPedidosController::class, 'index'])->name('listOrder')->middleware('auth');



//Profile
Route::get('/profile/index', [App\Http\Controllers\profileController::class, 'index'])->name('user_profile')->middleware('auth');
Route::get('/profile/edit', [App\Http\Controllers\profileController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
