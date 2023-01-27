<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleProyectoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\PlantillaDetalleProyectoController;
use App\Http\Controllers\plantillaProyectoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Mail\notificaciones;
use Illuminate\Support\Facades\Mail;
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

Route::resource('/dashboard', DashboardController::class);
Route::resource('/usuarios', UsuarioController::class);
Route::resource('/software', SoftwareController::class);
Route::resource('/clientes', ClienteController::class);
Route::resource('/licencias', LicenciaController::class);
Route::resource('/terminales', TerminalController::class);
Route::resource('/soporte', SoporteController::class);

Route::resource('/proyectos',ProyectoController::class);
Route::resource('/plantilla_proyectos',PlantillaProyectoController::class);
// Route::resource('/detalle_proyectos',DetalleProyectoController::class);
Route::get('/detalle_proyectos', [DetalleProyectoController::class, 'index']);
Route::post('/detalle_proyectos/{obtenerId}', [DetalleProyectoController::class, 'store']);
Route::get('/detalle_proyectos/{id}/edit/{obtenerId}', [DetalleProyectoController::class, 'edit']);
Route::get('/detalle_proyectos/{id}/{obtenerId}', [DetalleProyectoController::class, 'show']);
Route::patch('/detalle_proyectos/{id}/{obtenerId}', [DetalleProyectoController::class, 'update']);

Route::get('/plantilla_detalle_proyectos', [PlantillaDetalleProyectoController::class, 'index']);
Route::post('/plantilla_detalle_proyectos/{obtenerId}', [PlantillaDetalleProyectoController::class, 'store']);
Route::get('/plantilla_detalle_proyectos/{id}/edit/{obtenerId}', [PlantillaDetalleProyectoController::class, 'edit']);
Route::get('/plantilla_detalle_proyectos/{id}/{obtenerId}', [PlantillaDetalleProyectoController::class, 'show']);
Route::patch('/plantilla_detalle_proyectos/{id}/{obtenerId}', [PlantillaDetalleProyectoController::class, 'update']);

Route::resource('/estados',EstadoController::class);
Route::resource('/etapas',EtapaController::class);

// Route::get('/notificacion', function() {
//     $correo = new notificaciones;
//     Mail::to('acevedo51198@gmail.com')->queue($correo);

//     return "Mensaje Enviado";
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
