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
            $table->foreign(['ID_PROMO'], 'FK_RELATION_423')->references(['ID_PROMO'])->on('promo')->onUpdate('CASCADE');
            $table->foreign(['ID_PEGAWAI'], 'transaksi_deposit_uang_ibfk_1')->references(['ID_PEGAWAI'])->on('pegawai')->onUpdate('CASCADE');
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_424')->references(['ID_MEMBER'])->on('member')->onUpdate('CASCADE');
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
            $table->dropForeign('FK_RELATION_423');
            $table->dropForeign('transaksi_deposit_uang_ibfk_1');
            $table->dropForeign('FK_RELATION_424');
        });
    }
};
