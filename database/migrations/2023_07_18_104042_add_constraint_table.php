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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('nisn')->references('nisn')->on('siswa');
            $table->foreign('tarif_spp_id')->references('id')->on('tarif_spp');
        });

        Schema::table('penempatan_kelas', function (Blueprint $table) {
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('nisn')->references('nisn')->on('siswa');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
