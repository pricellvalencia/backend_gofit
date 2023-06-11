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
        Schema::table('transaksi_aktivasi', function (Blueprint $table) {
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_425')->references(['ID_MEMBER'])->on('member')->onUpdate('CASCADE');
            $table->foreign(['ID_PEGAWAI'], 'transaksi_aktivasi_ibfk_1')->references(['ID_PEGAWAI'])->on('pegawai')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_aktivasi', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_425');
            $table->dropForeign('transaksi_aktivasi_ibfk_1');
        });
    }
};
