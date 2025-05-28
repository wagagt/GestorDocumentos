<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlujosTable extends Migration
{
    public function up()
    {
        Schema::create('flujos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->longText('descripcion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
