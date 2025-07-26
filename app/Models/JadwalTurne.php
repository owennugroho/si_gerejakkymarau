<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Romos;  
use App\Models\Stasi;  

class JadwalTurne extends Model
{
    use HasFactory;

    protected $table = 'jadwal_turnes';

    protected $fillable = [
        'stasi_id',    
        'tanggal',
        'hari',
        'jam_mulai',
        'romo_id',
        'deskripsi',
    ];

    /**
     * Relasi ke Romo (pastor).
     */
    public function romo()
    {
        return $this->belongsTo(Romos::class, 'romo_id');
    }

    /**
     * Relasi ke Stasi (lokasi).
     */
    public function stasi()
    {
        return $this->belongsTo(Stasi::class, 'stasi_id');
    }
}
