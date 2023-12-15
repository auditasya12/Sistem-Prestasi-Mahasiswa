<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKompetisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetisis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('kel'); //kelompok atau individu
            $table->string('instansi');
            $table->string('kategori');
            $table->string('tahun');
            $table->string('foto')->nullable();
            $table->boolean('status');
            $table->timestamps();

            // Relation tabels
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
        Schema::dropIfExists('kompetisis');
    }
}
