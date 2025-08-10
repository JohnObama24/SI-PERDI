<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    //
    protected $fillable = [
        'perjalanan_id',
        'hasil_verifikasi'
    ];


    public function perjalanan()
    {
        return $this->belongsTo(Perjalanan::class, 'perjalanan_id');
    }
}
