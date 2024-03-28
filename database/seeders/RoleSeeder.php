<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poductos_index = Permission::create(['name' => 'productos.index', 'description' => 'Ver productos']);
        $poductos_creata = Permission::create(['name' => 'productos.create', 'description' => 'Crear productos']);
        $poductos_edit = Permission::create(['name' => 'productos.edit', 'description' => 'Editar productos']);
        $poductos_delete = Permission::create(['name' => 'productos.delete', 'description' => 'Eliminar productos']);

        $admin = Role::create(['name' => 'Admin'])->syncPermissions([$poductos_index, $poductos_creata,$poductos_edit,$poductos_delete]);
        $capturista = Role::create(['name' => 'Capturista'])->syncPermissions([$poductos_index, $poductos_creata,$poductos_edit]);

    }
}
