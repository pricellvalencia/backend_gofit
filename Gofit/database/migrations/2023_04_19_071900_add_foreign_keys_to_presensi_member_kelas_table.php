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
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_428')->references(['ID_MEMBER'])->on('member');
            $table->foreign(['ID_JADWAL_KELAS'], 'FK_RELATION_429')->references(['ID_JADWAL_KELAS'])->on('jadwal_harian');
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
            $table->dropForeign('FK_RELATION_428');
            $table->dropForeign('FK_RELATION_429');
        });
    }
};
