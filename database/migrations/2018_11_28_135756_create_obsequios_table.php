<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObsequiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obsequios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProducto');
            $table->integer('cantidad');
            $table->integer('costoPetros');
            $table->integer('cedulaRecibe');
            $table->string('nameRecibe');
            $table->integer('cedulaEntrega');
            $table->string('nameEntrega');
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
        Schema::dropIfExists('obsequios');
    }
}
