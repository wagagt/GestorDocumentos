<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregarEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('agregar_empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('puesto');
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
