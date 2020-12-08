<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigracionComentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios',function(Blueprint $table){
            $table->string('comentario',100);
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->foreignId('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_producto','id_usuario']);
        Schema::dropIfExists('comentarios');
    }
}
