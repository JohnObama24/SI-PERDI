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
        'status',
        'isVerified'
    ];

        public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }


}
