<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosObsequiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_obsequios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idObsequio');
            $table->integer('idProducto');
            $table->integer('cantidad');
            $table->integer('montoUnitario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_obsequios');
    }
}
