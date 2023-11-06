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
Route::get('/cliente', [ApiController::class, 'getCliente'])->middleware('auth:sanctum');
Route::get('/cliente/{id}', [ApiController::class, 'getClienteid'])->middleware('auth:sanctum');
//
Route::get('/licencia', [ApiController::class, 'getLicencia'])->middleware('auth:sanctum');
Route::get('/licencia/{id}', [ApiController::class, 'getLicenciaid'])->middleware('auth:sanctum');
//
Route::get('/terminal', [ApiController::class, 'getTerminal'])->middleware('auth:sanctum');
Route::get('/terminal/{id}', [ApiController::class, 'getTerminalid'])->middleware('auth:sanctum');
Route::post('/terminal/insert', [ApiController::class, 'insertTerminal'])->middleware('auth:sanctum');