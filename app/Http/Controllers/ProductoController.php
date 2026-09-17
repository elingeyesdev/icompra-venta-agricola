<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
    $buscar = $request->input('buscar');

    $query = Producto::with('categoria');

    if (!empty($buscar)) {
        $query->where(function ($q) use ($buscar) {
            $q->where('nombre', 'LIKE', "%$buscar%")
              ->orWhere('precio', 'LIKE', "%$buscar%")
              ->orWhere('stock', 'LIKE', "%$buscar%")
              ->orWhere('estado', 'LIKE', "%$buscar%")
              ->orWhereHas('categoria', function ($q2) use ($buscar) {
                  $q2->where('nombre', 'LIKE', "%$buscar%");
              });
        });
    }

    $productos = $query->paginate()->withQueryString();

    return view('producto.index', compact('productos'))
        ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $producto = new Producto();
        $categorias = \App\Models\Categoria::all();
        $unidades = \App\Models\UnidadMedida::all();

        return view('producto.create', compact('producto', 'categorias','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request): RedirectResponse
    {
        // 1. Obtenemos los datos validados del Form Request
        $datos = $request->validated();

        // 2. Forzamos el stock inicial a 0
        $datos['stock'] = 0;

        // 3. Creamos el producto con el stock inyectado manualmente
        Producto::create($datos);

        return Redirect::route('productos.index')
            ->with('success', 'Producto creado con éxito (Stock inicial: 0).');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        // Usamos with() para cargar las relaciones y que no falle la vista
        $producto = Producto::with(['categoria', 'unidadMedida'])->findOrFail($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $producto = Producto::find($id);
        $categorias = \App\Models\Categoria::all();
        $unidades = \App\Models\UnidadMedida::all();

        // Asegúrate de que apunte a 'edit' y no a 'create'
        return view('producto.edit', compact('producto', 'categorias','unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        // En el update no tocamos el stock para no sobrescribir el inventario actual
        $producto->update($request->validated());

        return Redirect::route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Producto::find($id)->delete();

        return Redirect::route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}