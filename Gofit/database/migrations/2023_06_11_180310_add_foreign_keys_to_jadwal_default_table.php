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
        Schema::table('jadwal_default', function (Blueprint $table) {
            $table->foreign(['ID_KELAS'], 'FK_RELATION_415')->references(['ID_KELAS'])->on('kelas')->onUpdate('CASCADE');
            $table->foreign(['ID_INSTRUKTUR'], 'jadwal_default_ibfk_1')->references(['ID_INSTRUKTUR'])->on('instruktur')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_default', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_415');
            $table->dropForeign('jadwal_default_ibfk_1');
        });
    }
};
