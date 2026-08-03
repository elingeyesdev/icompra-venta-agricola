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


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login',[AuthController::class, 'login']);

Route::apiResource('cliente',ClienteApiController::class);

Route::apiResource('rol',RoleApiController::class);

Route::apiResource('categoria',CategoriaApiController::class);

Route::apiResource('proveedor',ProvedorApiController::class);

Route::apiResource('unidad',UnidadMedidaApiController::class);

Route::apiResource('usuario',UserApiController::class);

Route::apiResource('producto',ProductoApiController::class);

Route::apiResource('compra',CompraApiController::class);

