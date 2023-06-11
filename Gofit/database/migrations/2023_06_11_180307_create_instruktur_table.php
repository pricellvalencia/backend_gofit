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
        Schema::create('instruktur', function (Blueprint $table) {
            $table->integer('ID_INSTRUKTUR', true);
            $table->string('NAMA_INSTRUKTUR', 50)->nullable();
            $table->date('TANGGAL_LAHIR_INSTRUKTUR')->nullable();
            $table->string('ALAMAT_INSTRUKTUR', 50)->nullable();
            $table->string('EMAIL', 225)->nullable();
            $table->string('TELEPON_INSTRUKTUR', 13)->nullable();
            $table->string('USERNAME_INSTRUKTUR', 50)->nullable();
            $table->string('PASSWORD_INSTRUKTUR', 50)->nullable();
            $table->integer('KETERLAMBATAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruktur');
    }
};
