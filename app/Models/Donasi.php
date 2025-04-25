<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    // Jika tabelmu bernama "donasis" (sesuai migration), tidak perlu override $table.
    // protected $table = 'donasis';

    protected $fillable = [
        'nama_bank',
        'nomor_rekening',
        'atas_nama',
        'qris_image',
        'keterangan',
    ];
}
