<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasosTable extends Migration
{
    public function up()
    {
        Schema::create('pasos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden');
            $table->longText('descripcion');
            $table->longText('requisitos_aceptacion')->nullable();
            $table->integer('duracion_aproximada');
            $table->string('requisitos_liberacion')->nullable();
            $table->string('estado');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
