<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; 

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index(Request $request): View
{
    $buscar = $request->input('buscar');

    $query = User::with('roles'); 

    if (!empty($buscar)) {
        $query->where(function ($q) use ($buscar) {
            $q->where('name', 'LIKE', "%$buscar%")
              ->orWhere('email', 'LIKE', "%$buscar%");
        });
    }

    $users = $query->paginate()->withQueryString();

    return view('user.index', compact('users'))
        ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
}

    /**
     * Muestra el formulario para crear un usuario.
     */
    public function create(): View
    {
        $user = new User();

        return view('user.create', compact('user'));
    }

    /**
     * Guarda el usuario encriptando la contraseña.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return Redirect::route('users.index')
            ->with('success', 'Usuario registrado correctamente en el sistema.');
    }

    /**
     * Muestra los detalles de un usuario específico.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Muestra el formulario de edición básica.
     */
    public function edit($id): View
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Actualiza los datos del usuario.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return Redirect::route('users.index')
            ->with('success', 'Datos de usuario actualizados con éxito.');
    }

    /**
     * Elimina al usuario del sistema.
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }

    

    /**
     * Muestra el formulario especial para asignar un ROL.
     */
    public function editRole(User $user): View
    {
        // Traemos todos los roles de la tabla 'roles'
        $roles = Role::all(); 
        
        return view('user.assign_role', compact('user', 'roles'));
    }

    /**
     * Procesa la asignación del rol en la tabla model_has_roles.
     */
    public function updateRole(Request $request, User $user): RedirectResponse
    {
        // syncRoles limpia roles anteriores y asigna el nuevo automáticamente
        $user->syncRoles($request->roles); 

        return Redirect::route('users.index')
            ->with('success', 'Seguridad y permisos actualizados para ' . $user->name);
    }
}