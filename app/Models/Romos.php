<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Romos extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'foto',
        'isi',
    ];
    
    // Relasi: Satu romos dapat memiliki banyak jadwal turne.
    public function jadwalTurnes()
    {
        return $this->hasMany(JadwalTurne::class, 'romo_id');
    }
}
