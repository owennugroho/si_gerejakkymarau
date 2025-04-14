<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTurne extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lokasi',
        'tanggal',
        'hari',
        'jam_mulai',
        'romo_id',
        'deskripsi',
    ];
    
    // Relasi ke model Romos
    public function romos()
    {
        return $this->belongsTo(Romos::class, 'romo_id');
    }
}
