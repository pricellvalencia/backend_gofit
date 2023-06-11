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
        Schema::table('transaksi_deposit_kelas', function (Blueprint $table) {
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_426')->references(['ID_MEMBER'])->on('member');
            $table->foreign(['ID_KELAS'], 'FK_RELATION_416')->references(['ID_KELAS'])->on('kelas');
            $table->foreign(['ID_PROMO'], 'FK_RELATION_422')->references(['ID_PROMO'])->on('promo');
            $table->foreign(['ID_PEGAWAI'], 'FK_RELATION_419')->references(['ID_PEGAWAI'])->on('pegawai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_deposit_kelas', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_426');
            $table->dropForeign('FK_RELATION_416');
            $table->dropForeign('FK_RELATION_422');
            $table->dropForeign('FK_RELATION_419');
        });
    }
};
