<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nim');
            $table->string('nama');
            $table->string('prodi');
            $table->text('alamat');
            $table->unsignedBigInteger('angkatan_id')->nullable();
            $table->string('telp');
            $table->string('foto')->nullable();
            $table->boolean('status');
            $table->timestamps();
            
            // Relation Tables
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('angkatan_id')->references('id')->on('angkatans')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
