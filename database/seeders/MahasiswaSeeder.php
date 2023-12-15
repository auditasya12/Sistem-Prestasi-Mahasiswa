<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nama' => 'Kevin Hartanto',
            'nim' => '123454321',
            'prodi' => 'Teknik Informatika',
            'alamat' => 'Jl. Kevin Hartanto',
            'angkatan_id' => 1,
            'telp' => '081234567890',
            'status' => 1,
        ]);

        DB::table('mahasiswas')->insert([
            'nama' => 'Siska Saraswati',
            'nim' => '543212345',
            'prodi' => 'Teknik Informatika',
            'alamat' => 'Jl. Siska Saraswati',
            'angkatan_id' => 1,
            'telp' => '089876543210',
            'status' => 1,
        ]);

        DB::table('mahasiswas')->insert([
            'nama' => 'Rosa',
            'nim' => '123456789',
            'prodi' => 'Teknik Informatika',
            'alamat' => 'Jl. Rosa Melati',
            'angkatan_id' => 1,
            'telp' => '089876543210',
            'status' => 1,
        ]);
    }
}
