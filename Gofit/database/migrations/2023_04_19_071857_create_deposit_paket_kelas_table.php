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
        Schema::create('deposit_paket_kelas', function (Blueprint $table) {
            $table->decimal('ID_DEPOSIT_PAKET_KELAS', 10, 0)->primary();
            $table->integer('ID_KELAS')->index('FK_RELATION_417');
            $table->string('ID_MEMBER', 20)->index('FK_RELATION_418');
            $table->integer('DEPOSIT_PAKET_KELAS')->nullable();
            $table->dateTime('TGL_KADALUARSA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposit_paket_kelas');
    }
};
