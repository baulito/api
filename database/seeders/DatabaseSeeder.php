<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Usuarios::insert([
            'user_names' => 'administrador',
            'user_lastnames' => 'administrador',
            'user_email' => 'adminitrador@administrador.com',
            'user_level' => 1,
            'user_state' => 1,
            'user_user' => 'administrador',
            'user_password' =>  Hash::make('admin2019*'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
