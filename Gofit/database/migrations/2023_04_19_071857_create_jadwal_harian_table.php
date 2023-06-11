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
        Schema::create('jadwal_harian', function (Blueprint $table) {
            $table->char('ID_JADWAL_KELAS', 10)->primary();
            $table->dateTime('WAKTU_MULAI_KELAS')->nullable();
            $table->dateTime('WAKTU_SELESAI_KELAS')->nullable();
            $table->integer('ID_INSTRUKTUR')->nullable()->index('FK_RELATION_413');
            $table->integer('SISA_MEMBER_KELAS')->nullable();
            $table->integer('ID_JADWAL_DEFAULT')->index('FK_RELATION_414');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_harian');
    }
};
