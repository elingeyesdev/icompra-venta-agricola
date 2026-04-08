<?php

// aqui ira la logica del crud //////////////////////////////////

namespace App\Http\Controllers;

//  Importamos el modelo Role de Spatie
use Spatie\Permission\Models\Role;

//  Para manejar datos de formularios
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    //  capturar lo que el usuario escribe
    $buscar = $request->buscar;

    //  filtrar si hay texto, si no mostrar todo
    $roles = Role::when($buscar, function ($query, $buscar) {
        return $query->where('name', 'LIKE', "%$buscar%");
    })->get();

    //  enviar datos a la vista
    return view('roles.index', compact('roles', 'buscar'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  Mostrar formulario de creación
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  Validar datos
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        //  Crear rol
        Role::create([
            'name' => $request->name
        ]);

        //  Redirigir
        return redirect()->route('roles.index')
            ->with('success', 'Rol creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //  (No se usa en este CRUD básico)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //  Buscar rol por ID
        $role = Role::findOrFail($id);

        //  Enviar a la vista
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //  Validar datos
        $request->validate([
            'name' => 'required'
        ]);

        //  Buscar rol
        $role = Role::findOrFail($id);

        //  Actualizar
        $role->update([
            'name' => $request->name
        ]);

        //  Redirigir
        return redirect()->route('roles.index')
            ->with('success', 'Rol actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //  Buscar rol
        $role = Role::findOrFail($id);

        //  Eliminar
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rol eliminado');
    }
}