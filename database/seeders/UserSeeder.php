<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ])->assignRole('Admin');

        User::create([
            'name' => 'usuario1',
            'email' => 'usuario1@gmail.com',
            'password' => bcrypt('12345')
        ])->assignRole('Capturista');
    }
}
