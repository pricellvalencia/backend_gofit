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
        Schema::table('jadwal_harian', function (Blueprint $table) {
            $table->foreign(['ID_INSTRUKTUR'], 'FK_RELATION_413')->references(['ID_INSTRUKTUR'])->on('instruktur');
            $table->foreign(['ID_JADWAL_DEFAULT'], 'FK_RELATION_414')->references(['ID_JADWAL_DEFAULT'])->on('jadwal_default');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_harian', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_413');
            $table->dropForeign('FK_RELATION_414');
        });
    }
};
