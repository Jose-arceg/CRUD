<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('pedidos_id');
            $table->string('pedidos_cliente');
            $table->string('pedidos_direccion');
            $table->string('pedidos_numero');
            $table->string('pedidos_correo');
            $table->string('pedidos_estado')->default('En preparacion');
            $table->dateTime('pedidos_fecha');
            $table->integer('pedidos_total')->default('0');
            $table->string('pedidos_sucursal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
