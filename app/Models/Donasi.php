<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_bank',
        'nomor_rekening',
        'atas_nama',
        'qris_image',
        'keterangan',
    ];
}
