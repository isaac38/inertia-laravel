<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permisos = Permission::all();
        return Inertia::render('Configuraciones/Roles/Roles', [
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
        try {
            $rol = new Role;
            $rol->name = $request->name;
            $rol->syncPermissions($request->permisos);

            $rol->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return to_route('config_role_index');
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
        // dd($request);
        try {
            $rol = Role::find($request->id);
            $rol->name = $request->name;
            $rol->syncPermissions($request->permisos);

            $rol->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return to_route('config_role_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $rol = Role::find($id);
            $rol->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        return to_route('config_role_index');
    }
}
