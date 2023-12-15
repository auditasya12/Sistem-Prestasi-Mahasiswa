<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikom extends Model
{
    use HasFactory;
    protected $fillable = ['mahasiswa_id', 'nama', 'versi', 'kel', 'deskripsi', 'foto', 'tahun', 'status'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
