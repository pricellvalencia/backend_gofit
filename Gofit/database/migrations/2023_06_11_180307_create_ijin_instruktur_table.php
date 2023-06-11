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
        Schema::create('ijin_instruktur', function (Blueprint $table) {
            $table->integer('ID_IJIN_INSTRUKTUR')->primary();
            $table->integer('ID_INSTRUKTUR')->index('FK_RELATION_410');
            $table->dateTime('TANGGAL_PEMBUATAN_IJIN');
            $table->dateTime('TANGGAL_IJIN');
            $table->string('STATUS_IJIN', 100);
            $table->dateTime('TGL_KONFIRMASI')->nullable();
            $table->integer('ID_JADWAL_HARIAN')->index('ID_JADWAL_HARIAN');
            $table->string('KETERANGAN');
            $table->integer('ID_INSTRUKTUR_PENGGANTI')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ijin_instruktur');
    }
};
