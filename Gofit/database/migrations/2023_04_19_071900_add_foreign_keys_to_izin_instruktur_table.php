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
        Schema::table('izin_instruktur', function (Blueprint $table) {
            $table->foreign(['ID_INSTRUKTUR'], 'FK_RELATION_410')->references(['ID_INSTRUKTUR'])->on('instruktur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('izin_instruktur', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_410');
        });
    }
};
