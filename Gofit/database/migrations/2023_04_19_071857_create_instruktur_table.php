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
            $table->integer('ID_INSTRUKTUR')->primary();
            $table->string('NAMA_INSTRUKTUR', 50)->nullable();
            $table->string('ALAMAT_INSTRUKTUR', 50)->nullable();
            $table->string('TELEPON_INSTRUKTUR', 13)->nullable();
            $table->string('USERNAME_INSTRUKTUR', 50)->nullable();
            $table->string('PASSWORD_INSTRUKTUR', 50)->nullable();
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
