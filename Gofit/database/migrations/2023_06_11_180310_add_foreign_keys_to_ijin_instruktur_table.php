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
        Schema::table('ijin_instruktur', function (Blueprint $table) {
            $table->foreign(['ID_INSTRUKTUR'], 'ijin_instruktur_ibfk_1')->references(['ID_INSTRUKTUR'])->on('instruktur')->onUpdate('CASCADE');
            $table->foreign(['ID_JADWAL_HARIAN'], 'ijin_instruktur_ibfk_2')->references(['ID_JADWAL_HARIAN'])->on('jadwal_harian')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ijin_instruktur', function (Blueprint $table) {
            $table->dropForeign('ijin_instruktur_ibfk_1');
            $table->dropForeign('ijin_instruktur_ibfk_2');
        });
    }
};
