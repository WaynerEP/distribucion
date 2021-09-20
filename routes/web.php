<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\CategoriaController;
use App\Http\Livewire\AlmacenController;
use App\Http\Livewire\ProductoController;
use App\Http\Livewire\ClienteController;
use App\Http\Livewire\ZonaController;
use App\Http\Livewire\CiudadanoController;
use App\Http\Livewire\DistribucionController;
use App\Http\Livewire\TransporteController;
use App\Http\Livewire\PedidoController;
use App\Http\Livewire\ReportesController;
use App\Http\Livewire\editPedido;
use App\Http\Livewire\empleadosController;
use App\Http\Livewire\ListaPedidosController;

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
Route::get('/modules/categories', CategoriaController::class)->name('categories')->middleware('auth');
Route::get('/modules/almacenes', AlmacenController::class)->name('almacenes')->middleware('auth');
Route::get('/modules/products', ProductoController::class)->name('products')->middleware('auth');
Route::get('/modules/clientes', ClienteController::class)->name('clientes')->middleware('auth');
Route::get('/modules/zonas', ZonaController::class)->name('zonas')->middleware('auth');
Route::get('/modules/ciudadanos', CiudadanoController::class)->name('ciudadanos')->middleware('auth');
Route::get('/modules/empleados', EmpleadosController::class)->name('empleados')->middleware('auth');
Route::get('/modules/transporte', TransporteController::class)->name('transporte')->middleware('auth');


//Pedidos
Route::get('/pedidos/create', PedidoController::class)->name('createPedidos')->middleware('auth');
Route::get('/pedidos/list', [App\Http\Controllers\PedidosController::class, 'ListPedidos'])->name('listPedidos')->middleware('auth');
Route::get('/pedidos/{id}/preview', [App\Http\Controllers\PedidosController::class, 'previewPedidos'])->name('previewPedidos')->middleware('auth');
Route::get('/pedidos/{id}/edit', editPedido::class)->name('editPedido')->middleware('auth');


//Reportes
Route::get('/reportes/pedidos', ReportesController::class)->name('reportes')->middleware('auth');
//pdf
Route::get('/reportes/pdf/{empleado}/{type}/{f1}/{f2}',  [App\Http\Controllers\reportesController::class, 'reportPDF']);
Route::get('/reportes/pdf/{empleado}/{type}',  [App\Http\Controllers\reportesController::class, 'reportPDF']);
//excel
Route::get('/reportes/excel/{empleado}/{type}/{f1}/{f2}',  [App\Http\Controllers\reportesController::class, 'reportEXCEL']);
Route::get('/reportes/excel/{empleado}/{type}',  [App\Http\Controllers\reportesController::class, 'reportEXCEL']);

// Route::get('/email', function () {
//     return view('Email.sendEmail');
// });

//PedidosListas
Route::get('/listPedidos/create', ListaPedidosController::class)->name('createListOrder')->middleware('auth');
Route::get('/listPedidos/list', [App\Http\Controllers\ListaPedidosController::class, 'index'])->name('listOrder')->middleware('auth');
Route::get('/listPedidos/{id}/show', [App\Http\Controllers\ListaPedidosController::class, 'previewList']);

//DISTRIBUCION
Route::get('/distribucion/create', DistribucionController::class)->name('nuevaDistribucion')->middleware('auth');
Route::get('/distribucion/list', [App\Http\Controllers\distribucionController::class, 'index'])->name('listDistribucion')->middleware('auth');
Route::get('/distribucion/{id}/show', [App\Http\Controllers\distribucionController::class, 'previewDistribucion']);



//Profile
Route::get('/profile/index', [App\Http\Controllers\ProfileController::class, 'index'])->name('user_profile')->middleware('auth');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
