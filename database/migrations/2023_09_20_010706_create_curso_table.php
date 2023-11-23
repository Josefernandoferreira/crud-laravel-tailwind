<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_curso')->unique();
            $table->string('nome_curso');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('curso');
    }
};
