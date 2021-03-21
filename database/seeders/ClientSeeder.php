<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            "nombre" => "Marco",
            "apellido" => "Ronaldo",
            "direccion" => "Brasil y la 29",
            "cedula" => "0978412644",
            "telefono" => "042 4853 12",
            "correo_electronico" => "mronaldo@hotmail.com",
        ]);
        Cliente::create([
            "nombre" => "Doménica",
            "apellido" => "Cruz",
            "direccion" => "México entre Av. Kennedy y Cuenca",
            "cedula" => "0908412643",
            "telefono" => "052 6853 12",
            "correo_electronico" => "dcruz@outlook.com",
        ]);
    }
}
