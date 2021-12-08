<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'dokter_id',
        'klinik_id', 
    ];
}
