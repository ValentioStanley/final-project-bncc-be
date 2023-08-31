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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('itemID');
            $table->string('nomorInvoice');
            // $table->bigIncrements('nomorInvoice');
            $table->string('namaBarang');
            $table->integer('kuantitas');
            $table->string('alamatPengiriman');
            $table->integer('kodePos');
            $table->integer('subHarga');
            $table->integer('totalHarga');
            $table->timestamps();
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('itemID')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
