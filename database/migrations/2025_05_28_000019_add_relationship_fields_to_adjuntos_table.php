<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdjuntosTable extends Migration
{
    public function up()
    {
        Schema::table('adjuntos', function (Blueprint $table) {
            $table->unsignedBigInteger('caso_id')->nullable();
            $table->foreign('caso_id', 'caso_fk_10590921')->references('id')->on('agregar_casos');
        });
    }
}
