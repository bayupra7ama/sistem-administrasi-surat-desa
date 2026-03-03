<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat_id',
        'penduduk_id',
        'status',
        'data',
        'nomor_surat',
        'file_surat',
        'pesan_admin' 

    ];

    /**
     * Relasi dengan JenisSurat
     */
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    /**
     * Relasi dengan User (penduduk)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'penduduk_id');
    }

    /**
     * Akses untuk mendapatkan data dalam bentuk array
     * Menjamin bahwa data disimpan dalam format JSON yang valid
     */
    public function getDataAttribute($value)
    {
        return json_decode($value, true);  // Mengembalikan data JSON sebagai array
    }

    public function getFileDataAttribute()
    {
        $data = $this->data;
        if (!$data) return [];

        $result = [];
        foreach ($data as $key => $path) {
            $result[$key] = asset('storage/' . $path);
        }
        return $result;
    }


    /**
     * Mutator untuk menyimpan data dalam format JSON
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);  // Menyimpan data dalam format JSON
    }

    /**
     * Mengubah status pengajuan menjadi Disetujui
     */
    public function setStatusApproved()
    {
        $this->status = 'Disetujui';
        $this->save();
    }

    /**
     * Mengubah status pengajuan menjadi Ditolak
     */
    public function setStatusRejected()
    {
        $this->status = 'Ditolak';
        $this->save();
    }

    /**
     * Mengubah status pengajuan menjadi Menunggu
     */
    public function setStatusWaiting()
    {
        $this->status = 'Menunggu';
        $this->save();
    }

    /**
     * Mendapatkan path file surat dengan menambahkan prefix
     */
    public function getFileSuratAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
