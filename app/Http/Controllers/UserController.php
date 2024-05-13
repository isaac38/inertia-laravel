<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::with('roles', 'permissions')->get();
        $roles = Role::select('id', 'name')->get();
        $permisos = Permission::select('id', 'name', 'description')->get();
        return Inertia::render('Configuraciones/Usuarios/Usuarios', [
            'usuarios' => $usuarios,
            'roles' => $roles,
            'permisos' => $permisos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // dd($request);
        try {
            $user = new User;
            $user->nombre = $request->nombre;
            $user->apellidoP = $request->apellidoP;
            $user->apellidoM = $request->apellidoM;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->assignRole($request->rol);



            $user->save();


            return to_route('config_user_index');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->nombre = $request->nombre;
            $user->apellidoP = $request->apellidoP;
            $user->apellidoM = $request->apellidoM;
            $user->username = $request->username;
            $user->email = $request->email;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            //actualizar rol
            $user->syncRoles($request->rol);


            //asignar permisos al usuario individualmente
            $permisosArrayName = [];
            $rol = Role::findByName($request->rol);
            $permisos = $rol->permissions;
            foreach ($permisos as $permiso) {
                $permisosArrayName[] = $permiso->name;
            }
            // $permisosArrayName;
            $user->syncPermissions($permisosArrayName);

            $user->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return to_route('config_user_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
    }
}
