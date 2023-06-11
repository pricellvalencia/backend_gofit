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
        Schema::create('transaksi_deposit_kelas', function (Blueprint $table) {
            $table->string('ID_TRANSAKSI_DEPOSIT_KELAS', 11)->primary();
            $table->string('ID_PEGAWAI', 11)->nullable()->index('FK_RELATION_419');
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_426');
            $table->integer('ID_KELAS')->nullable()->index('FK_RELATION_416');
            $table->integer('ID_PROMO')->nullable()->index('FK_RELATION_422');
            $table->dateTime('TGL_TRANSAKSI_DEPOSIT_KELAS')->nullable();
            $table->integer('JUMLAH_TRANSAKSI_DEPOSIT_KELAS')->nullable();
            $table->integer('BONUS_DEPOSIT_KELAS')->nullable();
            $table->integer('TOTAL_PEMBAYARAN')->nullable();
            $table->date('MASA_BERLAKU')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_deposit_kelas');
    }
};
