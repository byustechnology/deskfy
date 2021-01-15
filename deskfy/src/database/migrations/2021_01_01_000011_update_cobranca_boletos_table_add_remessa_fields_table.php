<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCobrancaBoletosTableAddRemessaFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobranca_boletos', function (Blueprint $table) {
            $table->foreignId('remessa_id')->nullable()->constrained()->onDelete('set null')->after('entidade_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cobranca_boletos', function (Blueprint $table) {
            $table->dropColumn(['remessa_id']);
        });
    }
}
