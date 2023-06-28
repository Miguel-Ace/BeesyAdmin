<?php

use App\Mail\notificaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserClienteController;

use App\Http\Controllers\SoporteExportController;

use App\Http\Controllers\DetalleProyectoController;
use App\Http\Controllers\EjecucionProyectoController;
use App\Http\Controllers\LicenciaExportController;
use App\Http\Controllers\plantillaProyectoController;
use App\Http\Controllers\PlantillaDetalleProyectoController;

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

Route::get('/assign', [RolController::class, 'index']);
Route::post('/assign', [RolController::class, 'store']);
Route::put('/assign/{id}', [RolController::class, 'update'])->name('role.update');
Route::delete('/assign/{id}', [RolController::class, 'destroy'])->name('role.destroy');

Route::resource('/dashboard', DashboardController::class);
Route::resource('/usuarios', UsuarioController::class);
Route::resource('/software', SoftwareController::class);
Route::resource('/clientes', ClienteController::class);
Route::resource('/licencias', LicenciaController::class);
Route::resource('/terminales', TerminalController::class);
Route::resource('/soporte', SoporteController::class);

Route::get('/user_cliente', [UserClienteController::class, 'index']);
Route::post('/user_cliente/{obtenerId}', [UserClienteController::class, 'store']);
Route::get('/user_cliente/{id}/edit/{obtenerId}', [UserClienteController::class, 'edit']);
Route::patch('/user_cliente/{id}/{obtenerId}', [UserClienteController::class, 'update']);
Route::get('/user_cliente/{id}/{obtenerId}', [UserClienteController::class, 'show']);
// Route::get('/soporte', [UserClienteController::class, 'index']);


Route::resource('/proyectos',ProyectoController::class);
Route::resource('/ejecucion_proyectos',EjecucionProyectoController::class);
Route::resource('/plantilla_proyectos',PlantillaProyectoController::class);
// Route::resource('/detalle_proyectos',DetalleProyectoController::class);
Route::get('/detalle_proyectos', [DetalleProyectoController::class, 'index']);
Route::post('/detalle_proyectos/{obtenerId}', [DetalleProyectoController::class, 'store']);
Route::get('/detalle_proyectos/{id}/edit/{obtenerId}', [DetalleProyectoController::class, 'edit']);
Route::patch('/detalle_proyectos/{id}/{obtenerId}', [DetalleProyectoController::class, 'update']);
Route::get('/detalle_proyectos/{id}/{obtenerId}', [DetalleProyectoController::class, 'show']);

Route::get('/plantilla_detalle_proyectos', [PlantillaDetalleProyectoController::class, 'index']);
Route::post('/plantilla_detalle_proyectos/{obtenerId}', [PlantillaDetalleProyectoController::class, 'store']);
Route::get('/plantilla_detalle_proyectos/{id}/edit/{obtenerId}', [PlantillaDetalleProyectoController::class, 'edit']);
Route::patch('/plantilla_detalle_proyectos/{id}/{obtenerId}', [PlantillaDetalleProyectoController::class, 'update']);
Route::get('/plantilla_detalle_proyectos/{id}/{obtenerId}', [PlantillaDetalleProyectoController::class, 'show']);

Route::resource('/estados',EstadoController::class);
Route::resource('/etapas',EtapaController::class);

Route::get('/exportar', [SoporteExportController::class, 'vista']);
Route::get('/exportar-soporte', [SoporteExportController::class, 'exportarSoporte'])->name('exportar.soporte');
Route::get('/exportar-licencia', [LicenciaExportController::class, 'exportarLicencia'])->name('exportar.licencia');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
