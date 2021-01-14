<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCobrancaBoletosTableAddStorageFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobranca_boletos', function (Blueprint $table) {
            $table->string('caminho')->nullable()->after('carteira');
            $table->string('arquivo')->nullable()->after('caminho');
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
            $table->dropColumn(['caminho', 'arquivo']);
        });
    }
}
