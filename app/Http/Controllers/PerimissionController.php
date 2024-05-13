<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class PerimissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::paginate(10);
        return Inertia::render('Configuraciones/Permisos/Permisos', [
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
            $permisos = new Permission;

            $permisos->name = $request->name;
            $permisos->description = $request->description;

            $permisos->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return to_route('config_permisos_index');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // try {
        //     $rol = Role::find($id);
        //     $rol->delete();
        // } catch (\Throwable $th) {
        //     throw $th;
        // }

        // return to_route('config.role.index');
    }
}
