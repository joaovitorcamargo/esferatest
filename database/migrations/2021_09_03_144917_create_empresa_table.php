<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('logotipo')->nullable();
            $table->string('site')->nullable();
            $table->timestamps();
        });
        Schema::create('empresa_funcionario',function(Blueprint $table){
            $table->id();
            $table->foreignId('empresa_id');
            $table->foreignId('funcionario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_funcionario');
        Schema::dropIfExists('empresa');
    }
}
