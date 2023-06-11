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
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_428');
            $table->dateTime('WAKTU_PRESENSI_MEMBER_KELAS')->nullable();
            $table->decimal('ID_PRESENSI_KELAS', 10, 0)->primary();
            $table->char('ID_JADWAL_KELAS', 10)->nullable()->index('FK_RELATION_429');
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
