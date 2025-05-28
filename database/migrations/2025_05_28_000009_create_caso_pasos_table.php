<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasoPasosTable extends Migration
{
    public function up()
    {
        Schema::create('caso_pasos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status_actual');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
