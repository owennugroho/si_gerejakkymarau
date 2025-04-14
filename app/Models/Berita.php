<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'judul',
        'penulis',    // Jika Anda memutuskan untuk menyimpan nama penulis
        'kutipan',    // Jika ingin menyimpan ringkasan berita
        'foto',       // Menyimpan path/URL foto kegiatan
        'isi',
    ];
}
