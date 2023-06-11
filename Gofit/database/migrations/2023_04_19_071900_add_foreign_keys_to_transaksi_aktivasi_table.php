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
            $table->foreign(['ID_PEGAWAI'], 'FK_RELATION_420')->references(['ID_PEGAWAI'])->on('pegawai');
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_425')->references(['ID_MEMBER'])->on('member');
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
            $table->dropForeign('FK_RELATION_420');
            $table->dropForeign('FK_RELATION_425');
        });
    }
};
