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
        Schema::create('presensi_member_gym', function (Blueprint $table) {
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_427');
            $table->dateTime('WAKTU_PRESENSI_MEMBER_GYM')->nullable();
            $table->integer('ID_PRESENSI_GYM')->primary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi_member_gym');
    }
};
