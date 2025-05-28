<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCasoPasosTable extends Migration
{
    public function up()
    {
        Schema::table('caso_pasos', function (Blueprint $table) {
            $table->unsignedBigInteger('caso_id')->nullable();
            $table->foreign('caso_id', 'caso_fk_10590729')->references('id')->on('agregar_casos');
            $table->unsignedBigInteger('paso_id')->nullable();
            $table->foreign('paso_id', 'paso_fk_10590730')->references('id')->on('pasos');
        });
    }
}
