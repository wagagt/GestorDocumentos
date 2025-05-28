<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAgregarCasosTable extends Migration
{
    public function up()
    {
        Schema::table('agregar_casos', function (Blueprint $table) {
            $table->unsignedBigInteger('flujo_id')->nullable();
            $table->foreign('flujo_id', 'flujo_fk_10590722')->references('id')->on('flujos');
            $table->unsignedBigInteger('encargado_id')->nullable();
            $table->foreign('encargado_id', 'encargado_fk_10590724')->references('id')->on('agregar_empleados');
        });
    }
}
