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
        Schema::table('presensi_member_kelas', function (Blueprint $table) {
            $table->foreign(['ID_MEMBER'], 'presensi_member_kelas_ibfk_1')->references(['ID_MEMBER'])->on('member')->onUpdate('CASCADE');
            $table->foreign(['ID_JADWAL_HARIAN'], 'presensi_member_kelas_ibfk_2')->references(['ID_JADWAL_HARIAN'])->on('jadwal_harian')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presensi_member_kelas', function (Blueprint $table) {
            $table->dropForeign('presensi_member_kelas_ibfk_1');
            $table->dropForeign('presensi_member_kelas_ibfk_2');
        });
    }
};
