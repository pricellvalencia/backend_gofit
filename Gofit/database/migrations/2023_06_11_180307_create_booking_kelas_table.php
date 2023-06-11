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
        Schema::create('booking_kelas', function (Blueprint $table) {
            $table->string('ID_BOOKING_KELAS', 10)->primary();
            $table->string('ID_MEMBER', 20)->nullable()->index('FK_RELATION_431');
            $table->integer('ID_JADWAL_HARIAN');
            $table->dateTime('TGL_BOOKING_KELAS')->nullable();
            $table->string('STATUS_BOOKING_KELAS', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_kelas');
    }
};
