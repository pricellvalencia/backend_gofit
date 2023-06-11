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
        Schema::create('booking_sesi_gym', function (Blueprint $table) {
            $table->integer('ID_BOOKING_GYM')->primary();
            $table->integer('SESI_BOOKING_GYM')->nullable();
            $table->string('STATUS_BOOKING_GYM', 20)->nullable();
            $table->string('ID_MEMBER', 20)->nullable()->index('FK_RELATION_432');
            $table->integer('ID_GYM')->index('FK_RELATION_442');
            $table->dateTime('TGL_BOOKING_GYM')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_sesi_gym');
    }
};
