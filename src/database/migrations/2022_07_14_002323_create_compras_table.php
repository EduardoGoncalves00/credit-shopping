<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('compra_id');
            $table->unsignedBigInteger('id_logado');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('cartao_id');
            $table->string('descricao');
            $table->float('valor');
            $table->string('parcela');
            $table->date('data');
            $table->string('usuario');

            $table->foreign('id_logado')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('cartao_id')->references('id')->on('cartoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
