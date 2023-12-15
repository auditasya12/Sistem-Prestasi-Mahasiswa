<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    use HasFactory; 
    protected $fillable = ['mahasiswa_id', 'nama', 'instansi', 'lokasi', 'tgl_mulai', 'tgl_selesai', 'foto', 'kategori', 'status'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
