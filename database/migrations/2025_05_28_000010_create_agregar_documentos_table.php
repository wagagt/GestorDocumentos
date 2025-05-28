<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregarDocumentosTable extends Migration
{
    public function up()
    {
        Schema::create('agregar_documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
