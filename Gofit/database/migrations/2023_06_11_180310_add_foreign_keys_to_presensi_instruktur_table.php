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
        Schema::table('presensi_instruktur', function (Blueprint $table) {
            $table->foreign(['ID_INSTRUKTUR'], 'presensi_instruktur_ibfk_1')->references(['ID_INSTRUKTUR'])->on('instruktur')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presensi_instruktur', function (Blueprint $table) {
            $table->dropForeign('presensi_instruktur_ibfk_1');
        });
    }
};
