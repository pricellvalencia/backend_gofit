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
        Schema::table('presensi_member_gym', function (Blueprint $table) {
            $table->foreign(['ID_MEMBER'], 'FK_RELATION_427')->references(['ID_MEMBER'])->on('member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presensi_member_gym', function (Blueprint $table) {
            $table->dropForeign('FK_RELATION_427');
        });
    }
};
