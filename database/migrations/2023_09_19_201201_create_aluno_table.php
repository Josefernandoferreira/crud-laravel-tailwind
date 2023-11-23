<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nome');
            $table->unsignedBigInteger('curso_id');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('localidade');
            $table->string('uf');
            $table->timestamps();
            $table->foreign('curso_id')->references('id')->on('curso');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aluno');
    }
};
