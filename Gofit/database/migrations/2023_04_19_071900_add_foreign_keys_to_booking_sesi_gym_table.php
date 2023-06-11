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
        Schema::table('booking_sesi_gym', function (Blueprint $table) {
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_432')->references(['ID_MEMBER'])->on('member');
            $table->foreign(['ID_GYM'], 'FK_RELATION_442')->references(['ID_GYM'])->on('gym');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_sesi_gym', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_432');
            $table->dropForeign('FK_RELATION_442');
        });
    }
};
