<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->unsigned();
            $table->string('nama');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('kategori');
            $table->integer('jumlah_hal');
            $table->string('isbn');
            $table->text('sinopsis');
            $table->string('tahun');
            $table->string('foto')->nullable();
            $table->boolean('status');
            $table->timestamps();

            // Relation Tables
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
        Schema::dropIfExists('bukus');
    }
}
