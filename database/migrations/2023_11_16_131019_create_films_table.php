<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->unsigned();
            $table->string('nama');
            $table->string('sutradara');
            $table->string('pemain');
            $table->string('genre');
            $table->string('durasi');
            $table->text('sinopsis');
            $table->string('foto')->nullable();
            $table->string('tahun');
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
        Schema::dropIfExists('films');
    }
}
