<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MobilMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nama_car');
            $table->string('nopol_car');
            $table->string('jenis_car');
            $table->text('desk_car');
            $table->string('tahun_car');
            $table->date('tahun_masuk_car');
            $table->string('status_car');
            $table->integer('harga_sewa_car');
            $table->string('foto_car');
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
        Schema::dropIfExists('car');
    }
}
