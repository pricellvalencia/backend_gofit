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
        Schema::create('jadwal_harian', function (Blueprint $table) {
            $table->integer('ID_JADWAL_HARIAN', true);
            $table->integer('ID_JADWAL_DEFAULT')->index('FK_RELATION_414');
            $table->integer('ID_INSTRUKTUR')->nullable()->index('FK_RELATION_413');
            $table->string('STATUS_KELAS', 10);
            $table->integer('SISA_MEMBER_KELAS');
            $table->dateTime('TANGGAL')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_harian');
    }
};
