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
        Schema::create('promo', function (Blueprint $table) {
            $table->integer('ID_PROMO', true);
            $table->string('NAMA_PROMO', 50)->nullable();
            $table->string('DESKRIPSI_PROMO')->nullable();
            $table->dateTime('WAKTU_MULAI_PROMO')->nullable();
            $table->dateTime('WAKTU_SELESAI_PROMO')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo');
    }
};
