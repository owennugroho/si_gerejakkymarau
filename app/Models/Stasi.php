<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $umat_laki
 * @property int $umat_perempuan
 * @property int $total_umat    
 */
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
    
    public function getTotalUmatAttribute()
    {
        return $this->umat_laki + $this->umat_perempuan;
    }
}
