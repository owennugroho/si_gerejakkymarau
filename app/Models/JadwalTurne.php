<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTurne extends Model
{
    use HasFactory;

    // (opsional jika tabelmu memang bernama "jadwal_turnes")
    protected $table = 'jadwal_turnes';

    protected $fillable = [
        'lokasi',
        'tanggal',
        'hari',
        'jam_mulai',
        'romo_id',
        'deskripsi',
    ];

    /**
     * Relasi ke Romos.
     * Note: nama method "romo" (singular) agar
     * ->with('romo') dan $jadwalTurne->romo() berhasil.
     */
    public function romo()
    {
        return $this->belongsTo(Romos::class, 'romo_id');
    }
}
