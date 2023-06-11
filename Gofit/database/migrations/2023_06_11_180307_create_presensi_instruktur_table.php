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
        Schema::create('presensi_instruktur', function (Blueprint $table) {
            $table->string('ID_PRESENSI_INSTRUKTUR', 11)->primary();
            $table->integer('ID_INSTRUKTUR')->nullable()->index('FK_RELATION_409');
            $table->dateTime('WAKTU_MULAI_KELAS')->nullable();
            $table->dateTime('WAKTU_SELESAI_KELAS')->nullable();
            $table->integer('DURASI_KELAS')->nullable();
            $table->integer('KETERLAMBATAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi_instruktur');
    }
};
