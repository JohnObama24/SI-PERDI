<?php

namespace App\Exports;

use App\Models\Perjalanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PerjalananExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $from;
    protected $to;

    // constructor biar bisa terima parameter tanggal
    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection()
    {
        return Perjalanan::with('pegawai:id,nama_lengkap')
            ->whereBetween('tgl_berangkat', [$this->from, $this->to])
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

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'color' => ['rgb' => '2196F3'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
        ];
    }


}
