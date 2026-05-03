<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CompraRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompraController extends Controller
{
    public function index(Request $request): View
{
    $buscar = $request->input('buscar');

    $query = Compra::with('proveedore'); 

    if (!empty($buscar)) {
        $query->where(function ($q) use ($buscar) {
            $q->where('fecha_compra', 'LIKE', "%$buscar%")
              ->orWhere('total_compra', 'LIKE', "%$buscar%")
              ->orWhere('estado', 'LIKE', "%$buscar%")
              ->orWhereHas('proveedore', function ($q2) use ($buscar) {
                  $q2->where('nombre', 'LIKE', "%$buscar%");
              });
        });
    }

    $compras = $query->paginate()->withQueryString();

    return view('compra.index', compact('compras'))
        ->with('i', ($request->input('page', 1) - 1) * $compras->perPage());
}

    public function create(): View
    {
        $compra = new Compra();
        $proveedores = Proveedore::all();
        $productos = Producto::all();
        return view('compra.create', compact('compra', 'proveedores', 'productos'));
    }

    public function store(CompraRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            // 1. Crear la compra (Asegúrate que proveedor_id esté en $fillable del Modelo Compra)
            $compra = Compra::create($request->validated());

            // 2. Insertar detalle
            DB::table('compra_producto')->insert([
                'compra_id'   => $compra->id,
                'producto_id' => $request->producto_id,
                'cantidad'    => $request->cantidad,
                'precio'      => $request->precio,
                'subtotal'    => $request->cantidad * $request->precio,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            // 3. Aumentar Stock
            Producto::findOrFail($request->producto_id)->increment('stock', $request->cantidad);
        });

        return Redirect::route('compras.index')
            ->with('success', 'Compra creada y stock actualizado.');
    }

    public function show($id): View
    {
        $compra = Compra::find($id);
        return view('compra.show', compact('compra'));
    }

    public function edit($id): View
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedore::all();
        $productos = Producto::all();

        // Obtenemos el detalle actual para que aparezca en el formulario al editar
        $detalle = DB::table('compra_producto')->where('compra_id', $id)->first();
        
        return view('compra.edit', compact('compra', 'proveedores', 'productos', 'detalle'));
    }

    public function update(CompraRequest $request, Compra $compra): RedirectResponse
    {
        DB::transaction(function () use ($request, $compra) {
            // 1. Revertir el stock anterior antes de aplicar el nuevo
            $detalleAnterior = DB::table('compra_producto')->where('compra_id', $compra->id)->first();
            
            if ($detalleAnterior) {
                Producto::where('id', $detalleAnterior->producto_id)
                    ->decrement('stock', $detalleAnterior->cantidad);
            }

            // 2. Actualizar datos de la compra (incluye proveedor_id)
            $compra->update($request->validated());

            // 3. Actualizar el detalle en la tabla pivote
            DB::table('compra_producto')
                ->where('compra_id', $compra->id)
                ->update([
                    'producto_id' => $request->producto_id,
                    'cantidad'    => $request->cantidad,
                    'precio'      => $request->precio,
                    'subtotal'    => $request->cantidad * $request->precio,
                    'updated_at'  => now(),
                ]);

            // 4. Aplicar el nuevo stock
            Producto::findOrFail($request->producto_id)->increment('stock', $request->cantidad);
        });

        return Redirect::route('compras.index')
            ->with('success', 'Compra y stock actualizados correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        DB::transaction(function () use ($id) {
            $detalle = DB::table('compra_producto')->where('compra_id', $id)->first();
            if ($detalle) {
                Producto::where('id', $detalle->producto_id)->decrement('stock', $detalle->cantidad);
            }
            Compra::find($id)->delete();
        });

        return Redirect::route('compras.index')
            ->with('success', 'Compra eliminada y stock revertido.');
    }
}