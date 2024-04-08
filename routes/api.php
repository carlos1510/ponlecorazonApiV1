<?php

use App\Http\Controllers\ApiEncuestaController;
use App\Http\Controllers\ApiPersonaController;
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

Route::get('/encuestas', [ApiEncuestaController::class, 'index']); //listar encuesta
Route::get('/encuestas/{id}', [ApiEncuestaController::class, 'show']);//mostrar una encuesta en particular
Route::post('/encuestas', [ApiEncuestaController::class, 'store']);

Route::get('/personas/{numero_documento}', [ApiPersonaController::class, 'show']);
