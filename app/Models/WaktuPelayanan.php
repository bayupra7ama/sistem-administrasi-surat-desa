<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuPelayanan extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'hari',
        'jam_buka',
        'jam_tutup'
    ];
}
