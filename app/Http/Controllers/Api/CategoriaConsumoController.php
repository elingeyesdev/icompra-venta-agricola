<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriaConsumoController extends Controller
{
    /**
     * Mostrar el listado de categorías consumiendo la API.
     */
    public function index()
    {
        // Consumir la API de categorías
        $response = Http::get('http://127.0.0.1:8000/api/categoria');

        // Convertir la respuesta JSON a un arreglo
        $categorias = $response->json();

        // Mostrar la vista independiente del consumo API
        return view('categoria-api.index', compact('categorias'));
    }


    /**
     * Mostrar formulario para registrar una categoría.
     */
    public function create()
    {
        return view('categoria-api.create');
    }


    /**
     * Guardar una categoría mediante la API.
     */
    public function store(Request $request)
    {
        Http::post('http://127.0.0.1:8000/api/categoria', [
            'nombre' => $request->nombre,
            'estado' => $request->estado,
        ]);

        return redirect()->route('categoria-api.index')
            ->with('success', 'Categoría creada correctamente');
    }


    /**
     * Mostrar formulario para editar una categoría.
     */
    public function edit($id)
    {
        // Obtener una categoría específica desde la api
        $response = Http::get("http://127.0.0.1:8000/api/categoria/$id");

        $categoria = $response->json();

        return view('categoria-api.edit', compact('categoria'));
    }


    /**
     * Actualizar una categoría mediante la api.
     */
    public function update(Request $request, $id)
    {
        Http::put("http://127.0.0.1:8000/api/categoria/$id", [
            'nombre' => $request->nombre,
            'estado' => $request->estado,
        ]);

        return redirect()->route('categoria-api.index')
            ->with('success', 'Categoría actualizada correctamente');
    }


    /**
     * Eliminar una categoría mediante la api.
     */
    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8000/api/categoria/$id");

        return redirect()->route('categoria-api.index')
            ->with('success', 'Categoría eliminada correctamente');
    }
}