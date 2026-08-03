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
 Route::post('/login',[AuthController::class, 'login']);

//Route::apiResource('usuario',UserApiController::class);

Route::apiResource('usuario', UserApiController::class);

Route::apiResource('clientes',ClienteApiController::class);

Route::apiResource('rol',RoleApiController::class);

Route::apiResource('categoria',CategoriaApiController::class);

Route::apiResource('proveedor',ProvedorApiController::class);

Route::apiResource('unidad',UnidadMedidaApiController::class);

Route::apiResource('producto',ProductoApiController::class);

Route::apiResource('compra',CompraApiController::class);


Route::middleware('auth:sanctum')->group(function () {


});


/*Route::get('/token', function () {

    $user = User::find(1);

    return $user->createToken('api-token')->plainTextToken;

});*/