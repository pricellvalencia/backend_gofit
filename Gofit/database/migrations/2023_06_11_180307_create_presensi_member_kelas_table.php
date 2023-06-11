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
        Schema::create('presensi_member_kelas', function (Blueprint $table) {
            $table->string('ID_PRESENSI_KELAS', 25)->primary();
            $table->integer('ID_JADWAL_HARIAN')->nullable()->index('FK_RELATION_429');
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_428');
            $table->string('WAKTU_PRESENSI_MEMBER_KELAS')->nullable();
            $table->integer('SISA_DEPOSIT')->nullable();
            $table->dateTime('EXP_DPK')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi_member_kelas');
    }
};
