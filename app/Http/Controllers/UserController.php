<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
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
        try {
            $usuarios = User::all()->load('roles', 'permissions');
            $roles = Role::select('id', 'name')->get();
            $permisos = Permission::select('id', 'name', 'description')->get();
            // Debugbar::info($usuarios->toArray());
            return Inertia::render('Configuraciones/Usuarios/Usuarios', [
                'usuarios' => $usuarios,
                'roles' => $roles,
                'permisos' => $permisos
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request->all());
        try {        
            $user = new User;
            $user->nombre = $request->input('nombre');
            $user->apellidoP = $request->input('apellidoP');
            $user->apellidoM = $request->input('apellidoM');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));

            //en caso de que no se seleccione un rol asignar el rol de Sin Rol
            if ($request->input('rol') == null) {
                $user->assignRole('Sin Asignar');
                // dd('Entra Sin Rol');
            }else{
                // dd($request->rol);
                $user->assignRole($request->input('rol'));
            }

            //asignar permisos al usuario individualmente resive un array de permisos
            if ($request->input('permisos')) {
                $user->givePermissionTo($request->input('permisos'));
            }

            // dd($user->toArray());

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
            dd($permisosArrayName);
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
