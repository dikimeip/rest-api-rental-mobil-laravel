<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('car_id')->references('id')->on('car')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->date('tanggal_masuk_trans');
            $table->date('tanggal_keluar_trans');
            $table->string('ket_trans');
            $table->integer('total_trans');
            $table->string('jaminan_trans');
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
        Schema::dropIfExists('transaksi');
    }
}
