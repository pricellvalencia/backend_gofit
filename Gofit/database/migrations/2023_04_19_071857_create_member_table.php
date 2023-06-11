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
        Schema::create('member', function (Blueprint $table) {
            $table->string('ID_MEMBER', 20)->primary();
            $table->string('NAMA_MEMBER', 50)->nullable();
            $table->string('ALAMAT_MEMBER', 50)->nullable();
            $table->string('TELEPON_MEMBER', 13)->nullable();
            $table->integer('JUMLAH_DEPOSIT_UANG')->nullable();
            $table->string('USERNAME_MEMBER', 50)->nullable();
            $table->string('PASSWORD_MEMBER', 50)->nullable();
            $table->dateTime('WAKTU_MULAI_AKTIVASI')->nullable();
            $table->dateTime('WAKTU_AKTIVASI_EKSPIRED')->nullable();
            $table->dateTime('WAKTU_DAFTAR_MEMBER')->nullable();
            $table->string('EMAIL')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
};
