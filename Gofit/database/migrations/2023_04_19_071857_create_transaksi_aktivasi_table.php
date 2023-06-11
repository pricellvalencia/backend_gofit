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
        Schema::create('transaksi_aktivasi', function (Blueprint $table) {
            $table->integer('ID_TRANSAKSI_AKTIVASI')->primary();
            $table->integer('ID_PEGAWAI')->index('FK_RELATION_420');
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_425');
            $table->dateTime('TGL_TRANSAKSI_AKTIVASI')->nullable();
            $table->dateTime('MASA_BERLAKU_TRANSAKSI_AKTIVASI')->nullable();
            $table->bigInteger('JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI')->nullable();
            $table->date('TANGGAL_LAHIR')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_aktivasi');
    }
};
