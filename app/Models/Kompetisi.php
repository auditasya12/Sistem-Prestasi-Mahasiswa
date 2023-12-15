<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetisi extends Model
{
    use HasFactory;
    
    protected $fillable = ['mahasiswa_id', 'nama', 'deskripsi', 'kel', 'instansi', 'kategori', 'tahun', 'foto', 'status'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
