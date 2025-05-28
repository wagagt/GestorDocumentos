<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPasosTable extends Migration
{
    public function up()
    {
        Schema::table('pasos', function (Blueprint $table) {
            $table->unsignedBigInteger('flujo_id')->nullable();
            $table->foreign('flujo_id', 'flujo_fk_10590708')->references('id')->on('flujos');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'empleado_fk_10590713')->references('id')->on('agregar_empleados');
        });
    }
}
