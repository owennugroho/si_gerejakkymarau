<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_stasi',
        'desa',
        'alamat',
        'deskripsi',
        'umat_laki',
        'umat_perempuan',
        'foto_gereja',
        'foto_tanah',
    ];
    
    // Jika nantinya diperlukan relasi atau accessor, Anda dapat menambahkannya di sini.
    // Misalnya, Anda dapat menambahkan accessor total umat:
    public function getTotalUmatAttribute()
    {
        return $this->umat_laki + $this->umat_perempuan;
    }
}
