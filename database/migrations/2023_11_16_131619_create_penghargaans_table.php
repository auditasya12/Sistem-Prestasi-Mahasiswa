<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghargaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghargaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->string('nama'); //nama sertifikasi
            $table->string('instansi');
            $table->string('lokasi');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('kategori');
            $table->string('foto')->nullable();
            $table->boolean('status');
            $table->timestamps(); 
            
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penghargaans');
    }
}
