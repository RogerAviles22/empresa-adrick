<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            "nom_producto" => "Caldo de Bolas",
            "precio" => 2,
            "stock" => 10,
            "id_categoria" => 1
        ]);
        Producto::create([
            "nom_producto" => "Sopa de Queso",
            "precio" => 2,
            "stock" => 20,
            "id_categoria" => 2
        ]);
        Producto::create([
            "nom_producto" => "Chaulafán Especial",
            "precio" => 4.5,
            "stock" => 15,
            "id_categoria" => 3
        ]);
    }
}
