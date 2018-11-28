<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prueba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->dropColumn('idProducto');
        });
        
        Schema::table('inventarios', function (Blueprint $table) {
            $table->unsignedInteger('idProducto');
        
            $table->foreign('idProducto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
