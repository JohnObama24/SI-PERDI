<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    //

    protected $fillable = [
        'pegawai_id',
        'tujuan',
        'tgl_berangkat',
        'tgl_pulang',
        'deskripsi',
        'status'
    ];

        public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    // Relasi ke verifikasi
    public function verifikasi()
    {
        return $this->hasOne(Verifikasi::class, 'perjalanan_id');
    }

    // Relasi ke status riwayat perjalnan
    public function riwayatPerjalanan()
    {
        return $this->hasMany(Riwayat_Perjalanan::class, 'perjalanan_id');
    }
    
}
