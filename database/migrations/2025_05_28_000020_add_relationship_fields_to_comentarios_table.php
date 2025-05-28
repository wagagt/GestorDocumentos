<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToComentariosTable extends Migration
{
    public function up()
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->unsignedBigInteger('caso_id')->nullable();
            $table->foreign('caso_id', 'caso_fk_10590928')->references('id')->on('agregar_casos');
            $table->unsignedBigInteger('propietario_id')->nullable();
            $table->foreign('propietario_id', 'propietario_fk_10590930')->references('id')->on('agregar_empleados');
        });
    }
}
