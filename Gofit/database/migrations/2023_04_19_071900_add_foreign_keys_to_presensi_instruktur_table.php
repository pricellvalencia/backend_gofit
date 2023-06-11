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
            $table->foreign(['ID_INSTRUKTUR'], 'FK_RELATION_409')->references(['ID_INSTRUKTUR'])->on('instruktur');
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
            $table->dropForeign('FK_RELATION_409');
        });
    }
};
