<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa = Mahasiswa::all();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'roles' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Kevin Hartanto',
            'email' => 'kevin@mail.com',
            'password' => Hash::make('kevin123'),
            'roles' => 'mahasiswa',
            'nim' => '123454321',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Siska Saraswati',
            'email' => 'siska@mail.com',
            'password' => Hash::make('siska123'),
            'roles' => 'mahasiswa',
            'nim' => '543212345',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Rosa',
            'email' => 'oca@mail.com',
            'password' => Hash::make('oca123'),
            'roles' => 'mahasiswa',
            'nim' => '123456789',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        // update user_id to siswa table as user id
        foreach ($mahasiswa as $s) {
            DB::table('mahasiswas')->where('nim', $s->nim)->update([
                'user_id' => DB::table('users')->where('nim', $s->nim)->first()->id
            ]);
        }
    }
}
