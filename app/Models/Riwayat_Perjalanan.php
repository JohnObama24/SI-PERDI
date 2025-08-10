<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat_Perjalanan extends Model
{
    protected $fillable = [
        'perjalanan_id',
        'status',
        'keterangan'
    ];

        public function perjalanan()
    {
        return $this->belongsTo(Perjalanan::class, 'perjalanan_id');
    }
}
