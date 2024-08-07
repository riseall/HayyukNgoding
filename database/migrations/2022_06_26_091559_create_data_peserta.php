<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peserta', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peserta')->unique();
            $table->string('nama_peserta');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->integer('id_jenis_kelamin')->unsigned();
            $table->foreign('id_jenis_kelamin')
            ->references('id')->on('jenis_kelamin')
            ->onDelete('cascade');
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
        Schema::dropIfExists('data_peserta');
    }
}
