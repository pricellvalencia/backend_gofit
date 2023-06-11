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
        Schema::create('transaksi_deposit_uang', function (Blueprint $table) {
            $table->string('ID_TRANSAKSI_DEPOSIT_UANG', 11)->primary();
            $table->string('ID_PEGAWAI', 11)->nullable()->index('FK_RELATION_421');
            $table->integer('ID_PROMO')->nullable()->index('FK_RELATION_423');
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_424');
            $table->dateTime('TGL_TRANSAKSI_DEPOSIT_UANG')->nullable();
            $table->integer('JUMLAH_TRANSAKSI_DEPOSIT_UANG')->nullable();
            $table->integer('BONUS_DEPOSIT_UANG')->nullable();
            $table->integer('TOTAL_TRANSAKSI_DEPOSIT_UANG')->nullable();
            $table->integer('SISA_DEPOSIT_UANG')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_deposit_uang');
    }
};
