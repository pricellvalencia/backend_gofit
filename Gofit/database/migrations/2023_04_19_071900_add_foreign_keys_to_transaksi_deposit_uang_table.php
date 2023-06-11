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
        Schema::table('transaksi_deposit_uang', function (Blueprint $table) {
            $table->foreign(['ID_PEGAWAI'], 'FK_RELATION_421')->references(['ID_PEGAWAI'])->on('pegawai');
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_424')->references(['ID_MEMBER'])->on('member');
            $table->foreign(['ID_PROMO'], 'FK_RELATION_423')->references(['ID_PROMO'])->on('promo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_deposit_uang', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_421');
            $table->dropForeign('FK_RELATION_424');
            $table->dropForeign('FK_RELATION_423');
        });
    }
};
