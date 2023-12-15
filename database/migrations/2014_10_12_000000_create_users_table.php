<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('roles');
            $table->rememberToken();
            $table->string('nim')->nullable();  
            $table->string('nis')->nullable();
            $table->string('nip')->nullable();
            $table->timestamps();
        });

        // $2a$10$Fopmqxj6uaHC1Tnl0vINCeJEQb.AGnaerZWqy6tmERAu8Ra02765m (psw adm)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
