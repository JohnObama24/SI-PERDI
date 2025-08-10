<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'role'
    ];

    // jadi disini kita mendefinisikan relasi antara pegawai dan perjalanan yg udah dibuat, disini kita menggunakan hasMany karena satu pegwai bisa buat banyak perjalanan 
    public function perjalanans() {
        return $this->hasMany(Perjalanan::class, 'pegawai_id');
    }
}
