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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('ID_PEGAWAI', 10)->primary();
            $table->string('NAMA_PEGAWAI', 50)->nullable();
            $table->string('ALAMAT', 50)->nullable();
            $table->string('NO_TELP', 13)->nullable();
            $table->string('ROLE', 50)->nullable();
            $table->string('EMAIL', 50)->nullable();
            $table->string('USERNAME', 50)->nullable();
            $table->string('PASSWORD', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
