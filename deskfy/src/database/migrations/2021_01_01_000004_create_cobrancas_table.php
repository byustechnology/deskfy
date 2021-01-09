<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobrancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobrancas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('entidade_id')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->text('descricao');
            $table->bigInteger('valor');
            $table->date('vence_em');
            $table->date('pago_em')->nullable();
            $table->text('observacao')->nullable();
            $table->boolean('recorrente')->default(false);
            $table->unsignedInteger('repetir_a_cada')->nullable();
            $table->char('repetir_a_cada_condicao')->nullable();
            $table->unsignedInteger('repetir_por')->nullable();
            $table->char('repetir_por_condicao', 1)->nullable();
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
        Schema::dropIfExists('cobrancas');
    }
}
