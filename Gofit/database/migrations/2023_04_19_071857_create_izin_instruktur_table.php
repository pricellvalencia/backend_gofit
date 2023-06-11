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
        Schema::create('izin_instruktur', function (Blueprint $table) {
            $table->integer('ID_IZIN_INTRUKSTUR')->primary();
            $table->integer('ID_INSTRUKTUR')->nullable()->index('FK_RELATION_410');
            $table->integer('ID_INSTRUKTUR_PENGGANTI')->nullable();
            $table->dateTime('WAKTU_IZIN')->nullable();
            $table->dateTime('TGL_KONFIRMASI')->nullable();
            $table->string('STATUS_IZIN', 100)->nullable();
            $table->string('KETERANGAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izin_instruktur');
    }
};
