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
            $table->string('ID_PRESENSI_GYM', 10)->primary();
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_427');
            $table->string('WAKTU_PRESENSI_MEMBER_GYM', 25)->nullable();
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
