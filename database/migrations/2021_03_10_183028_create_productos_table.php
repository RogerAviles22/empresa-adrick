<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->text('nom_producto');
            $table->double('precio');
            $table->integer('stock');
            $table->string('image')->nullable();

            $table->bigInteger('id_categoria')->unsigned();
            $table->timestamps();
        });

        Schema::table('productos', function($table) {
            $table->foreign('id_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
