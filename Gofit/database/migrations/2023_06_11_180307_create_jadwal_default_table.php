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
        Schema::create('jadwal_default', function (Blueprint $table) {
            $table->integer('ID_JADWAL_DEFAULT')->primary();
            $table->integer('ID_INSTRUKTUR')->index('FK_RELATION_411');
            $table->integer('ID_KELAS')->index('FK_RELATION_415');
            $table->string('SESI_JADWAL_DEFAULT', 11)->nullable();
            $table->string('HARI_JADWAL_DEFAULT', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_default');
    }
};
