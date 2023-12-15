<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplikomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplikoms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('nama');
            $table->string('versi');
            $table->string('kel'); //beregu atau perorangan
            $table->string('deskripsi');
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
        Schema::dropIfExists('aplikoms');
    }
}
