<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\RoleApiController;
use App\Http\Controllers\Api\CategoriaApiController;
use App\Http\Controllers\Api\ProvedorApiController;
use App\Http\Controllers\Api\UnidadMedidaApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ProductoApiController;
use App\Http\Controllers\Api\CompraApiController;
use App\Models\User;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 Route::post('/login', [AuthController::class, 'login'])
    ->middleware('no-store');

Route::middleware(['auth:sanctum', 'no-store'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('categoria', CategoriaApiController::class)
        ->only(['index', 'show']);

    Route::apiResource('producto', ProductoApiController::class)
        ->only(['index', 'show']);

    Route::apiResource('unidad', UnidadMedidaApiController::class)
        ->only(['index', 'show']);
});

// Administración: token Sanctum y rol administrador.
Route::middleware(['auth:sanctum', 'role:administrador', 'no-store'])->group(function () {
    Route::apiResource('usuario', UserApiController::class);
    Route::apiResource('clientes', ClienteApiController::class);
    Route::apiResource('rol', RoleApiController::class);
    Route::apiResource('proveedor', ProvedorApiController::class);
    Route::apiResource('compra', CompraApiController::class);

    Route::apiResource('categoria', CategoriaApiController::class)
        ->only(['store', 'update', 'destroy']);

    Route::apiResource('producto', ProductoApiController::class)
        ->only(['store', 'update', 'destroy']);

    Route::apiResource('unidad', UnidadMedidaApiController::class)
        ->only(['store', 'update', 'destroy']);
});


