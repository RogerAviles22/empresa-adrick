<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "AdminR",
            "apellido" => "A",
            "email" => "admin@gmail.com",
            "nom_usuario" => "admin",
            "image" => "admin.png",
            "password" => Hash::make("1234"),
        ])->assignRole("Admin");

        User::create([
            "name" => "R",
            "apellido" => "A G",
            "email" => "rag@gmail.com",
            "nom_usuario" => "roger",
            "image" => "user.png",
            "password" => Hash::make("1234"),
        ])->assignRole("Empleado");
    }
}
