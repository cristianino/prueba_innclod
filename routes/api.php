<?php

use App\Http\Controllers\Api\ProProcesoController;
use App\Http\Controllers\Api\TipTipoDocController;
use App\Http\Controllers\DocDocumentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/pro-proceso', ProProcesoController::class)->only(['index', 'show']);
    Route::apiResource('/tip-tipo-doc', TipTipoDocController::class)->only(['index', 'show']);
//});