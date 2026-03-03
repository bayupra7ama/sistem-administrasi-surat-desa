<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    //

    protected $fillable=['nama_surat', 'kode','deskripsi'];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'jenis_surat_id');
    }
    
}
