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
        Schema::create('transasksi', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->float('mrdfee')->nullable();
            $table->dateTime('waktu_transaksi');
            $table->string('kode_pembayaran');
            $table->enum('status_pembayaran', ['1', '2', '3', '4'])->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transasksi');
    }
};
