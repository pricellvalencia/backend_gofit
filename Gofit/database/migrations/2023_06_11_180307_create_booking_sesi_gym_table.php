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
            $table->string('ID_BOOKING_GYM', 10)->primary();
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_432');
            $table->dateTime('TGL_BOOKING_GYM');
            $table->date('TGL_DIBOOKING');
            $table->string('SESI_GYM', 15);
            $table->string('STATUS_BOOKING_GYM', 20);
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
