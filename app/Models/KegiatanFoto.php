<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanFoto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',  // Path atau URL ke file foto
    ];
}
