<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->string('id_peserta');
            $table->string('id_kelas');
            $table->date('tgl_pelatihan');
            $table->date('tgl_selesai');
            $table->timestamps();

            $table->primary('kode_peserta', 'kode_kelas');

            $table->foreign('id_peserta')
            ->references('id')->on('peserta')
            ->onDelete('cascade');

            $table->foreign('id_kelas')
            ->references('id')->on('kelas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatihan');
    }
}
