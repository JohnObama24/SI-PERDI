<?php

namespace App\Exports;

use App\Models\Perjalanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerjalananExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
 public function collection()
    {
        return Perjalanan::with('pegawai:id,nama_lengkap')
            ->get()
            ->map(function ($item) {
                return [
                    'ID' => $item->id,
                    'Nama Pegawai' => $item->pegawai->nama_lengkap ?? '-',
                    'Tujuan' => $item->tujuan,
                    'Tanggal Berangkat' => $item->tgl_berangkat,
                    'Tanggal Pulang' => $item->tgl_pulang,
                    'Deskripsi' => $item->deskripsi,
                    'Status' => $item->status,
                    'Verifikasi' => $item->isVerified,
                    'Created At' => $item->created_at,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pegawai',
            'Tujuan',
            'Tanggal Berangkat',
            'Tanggal Pulang',
            'Deskripsi',
            'Status',
            'Verifikasi',
            'Created At',
        ];
    }
}
