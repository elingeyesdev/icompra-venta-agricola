<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Models\Producto;

class ProductoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Producto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(ProductoRequest $request)
{
    $datos = $request->validated();

    // Igual que el formulario web, el producto inicia con stock cero.
    $datos['stock'] = 0;

    $producto = Producto::create($datos);

    return response()->json($producto, 201);
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Producto::findOrFail($id),200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, string $id)
{
    $producto = Producto::findOrFail($id);
    $producto->update($request->validated());

    return response()->json($producto);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['message'=>'producto eliminado']);
    }
}
