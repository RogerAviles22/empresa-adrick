<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFacturasTable extends Migration
{
    /**
     * Run the migrations.
     * https://stackoverflow.com/questions/47544109/laravel-cannot-delete-or-update-a-parent-row-a-foreign-key-constraint-fails
     * @return void
     */
    public function up()
    {

        Schema::create('detalle_facturas', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->integer('cantidad');
            $table->double('total');
            $table->double('precioUnitario');

            $table->bigInteger('id_factura')->unsigned();
            $table->bigInteger('id_producto')->unsigned();

        });

        Schema::table('detalle_facturas', function($table) {
            $table->foreign('id_factura')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_facturas');
    }
}
