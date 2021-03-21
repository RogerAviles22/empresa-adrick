<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            "nombre"=>"Caldo"
        ]);
        Categoria::create([
            "nombre"=>"Sopa"
        ]);
        Categoria::create([
            "nombre"=>"Arroz"
        ]);
    }
}
