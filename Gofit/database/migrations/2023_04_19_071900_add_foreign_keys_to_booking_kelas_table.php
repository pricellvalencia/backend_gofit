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
        Schema::table('booking_kelas', function (Blueprint $table) {
            $table->foreign(['ID_KELAS'], 'FK_RELATION_430')->references(['ID_KELAS'])->on('kelas');
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_431')->references(['ID_MEMBER'])->on('member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_kelas', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_430');
            $table->dropForeign('FK_RELATION_431');
        });
    }
};
