<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Autenticación
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/userinfo',[AuthController::class, 'infouser'])->middleware('auth:sanctum');

//
Route::get('/cliente', [ApiController::class, 'getCliente']);
Route::get('/cliente/{id}', [ApiController::class, 'getClienteid']);
//
Route::get('/licencia', [ApiController::class, 'getLicencia']);
Route::get('/licencia/{id}', [ApiController::class, 'getLicenciaid']);
//
Route::get('/terminal', [ApiController::class, 'getTerminal']);
Route::get('/terminal/{id}', [ApiController::class, 'getTerminalid']);
Route::get('/terminal/insert', [ApiController::class, 'insertTerminal']);
