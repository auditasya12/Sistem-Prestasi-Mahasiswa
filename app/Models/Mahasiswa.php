<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    
    protected $fillable = ['user_id','nim', 'nama', 'prodi', 'alamat', 'angkatan_id', 'telp', 'foto', 'status'];

    use HasFactory;
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }
    public function kompetisis()
    {
        return $this->hasMany(Kompetisi::class, 'mahasiswa_id');
    }
   
}
