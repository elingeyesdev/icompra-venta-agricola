<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\Api\CategoriaConsumoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba-error-500', function () {
    throw new \RuntimeException('Error de prueba');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:administrador'])->name('dashboard');

Route::middleware(['auth', 'no-store'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:administrador', 'no-store'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('proveedores', ProveedoreController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('compras', CompraController::class);
    Route::resource('unidad-medidas', UnidadMedidaController::class);
    Route::resource('users', UserController::class);

    Route::get('users/{user}/role', [UserController::class, 'editRole'])
        ->name('users.edit-role');

    Route::put('users/{user}/role', [UserController::class, 'updateRole'])
        ->name('users.update-role');

    Route::resource('categoria-api', CategoriaConsumoController::class);

    
});
/* 
    Route::resource('categoria-api', CategoriaConsumoController::class);*/


require __DIR__.'/auth.php';
