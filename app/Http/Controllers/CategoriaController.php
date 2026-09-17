<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
    $buscar = $request->input('buscar');  // crea una variable que guarda lo que el usuario escribe

    $query = Categoria::query(); 

    if (!empty($buscar)) { //prepara una consulta con los datos 
        $query->where(function ($q) use ($buscar) {
            $q->where('nombre', 'LIKE', "%$buscar%")
              ->orWhere('estado', 'LIKE', "%$buscar%");
        });
    }

    $categorias = $query->paginate()->withQueryString();

    return view('categoria.index', compact('categorias'))
        ->with('i', ($request->input('page', 1) - 1) * $categorias->perPage());
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoria = new Categoria();

        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request): RedirectResponse
    {
        Categoria::create($request->validated());

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $categoria): RedirectResponse
    {
        $categoria->update($request->validated());

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Categoria::find($id)->delete();

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria deleted successfully');
    }
}
