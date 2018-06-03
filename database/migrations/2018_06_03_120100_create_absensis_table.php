<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_kelas')->unsigned();
            $table->integer('id_ortu')->unsigned();
            $table->string('keterangan');
            $table->date('tgl');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswas')
            ->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('id_ortu')->references('id')->on('orang_tuas')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_kelas')->references('id')->on('kelas')
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
        Schema::dropIfExists('absensis');
    }
}
