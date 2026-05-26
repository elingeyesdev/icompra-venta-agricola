<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnidadMedida;

class UnidadMedidaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(UnidadMedida::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unidad=UnidadMedida::create($request->all());
        return response()->json($unidad,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(UnidadMedida::findOrFail($id));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unidad=UnidadMedida::findOrFail($id);
        $unidad->update($request->all());
        return response()->json($unidad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UnidadMedida::destroy($id);
        return response()->json(['message'=>'unidad eliminada']);
    }
}
