<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'Job Moreno',
            'email' => 'jobmoreno.mtz@gmail.com',
            'password' => Hash::make('password')
        ]);

        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ]);
        DB::table('configuracion_sitio')->insert([
            'nombre' => 'Nombre de la página',
            'contacto' => '33-33-33-33-33',
            'direccion' => 'direccion de prueba',
            'accent_color' => 'rgb(59, 13, 13)',
            'nav_color' => '#fff',
            'nav_hover_color' => '#fff',
            'nav_dropdown_color' => 'rgb(59, 13, 13)',
            'nav_dropdown_hover_color' => 'rgb(59, 13, 13)',
            'background_color' => 'rgb(59, 13, 13)',
            'heading_color' => 'rgb(59, 13, 13)',
            'about' => 'Prueba',
            'email' => 'email@example.com',
            'image_banner' => null,
            'archivo' => null
        ]);
    }
}
