<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
  public $timestamps = true;
  protected $fillable = [
    'name',
    'email',
    'phone',
    'can_whatsapp',
    'asal_paroki',
    'asal_lingkungan',
    'message',
    'is_read',
  ];

  protected $casts = [
    'can_whatsapp' => 'boolean',
    'is_read' => 'boolean',
  ];
}
