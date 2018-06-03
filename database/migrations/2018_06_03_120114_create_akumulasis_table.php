<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkumulasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akumulasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_absensi')->unsigned();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_absensi')->references('id')->on('absensis')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akumulasis');
    }
}
