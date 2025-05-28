<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjuntosTable extends Migration
{
    public function up()
    {
        Schema::create('adjuntos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('tipo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
