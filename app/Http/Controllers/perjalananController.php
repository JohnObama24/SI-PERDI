<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Perjalanan;

use Illuminate\Support\Facades\Auth;

class perjalananController extends Controller
{
    //

    public function index(Request $request)
    {
        $user = Auth::user();

        // filter berdasarkan role
        $query = Perjalanan::query();
        if ($user->role !== 'admin') {
            $query->where('pegawai_id', $user->id);
        }

        if ($request->filter === 'menunggu') {
            $query->where('isVerified', 'belum diverifikasi');
        } elseif ($request->filter === 'disetujui') {
            $query->where('isVerified', 'diverifikasi')
                ->where('status', 'belum selesai');
        } elseif ($request->filter === 'selesai') {
            $query->where('status', 'selesai');
        }


        $perjalanans = $query->latest()->get();

        $totalPerjalanan = $query->count(); 
        $totalMenunggu = Perjalanan::where('isVerified', 'belum diverifikasi')
            ->when($user->role !== 'admin', fn($q) => $q->where('pegawai_id', $user->id))
            ->count();
        $totalBelumSelesai = Perjalanan::where('status', 'belum selesai')
            ->when($user->role !== 'admin', fn($q) => $q->where('pegawai_id', $user->id))
            ->count();
        $totalSelesai = Perjalanan::where('status', 'selesai')
            ->when($user->role !== 'admin', fn($q) => $q->where('pegawai_id', $user->id))
            ->count();

        return view('pegawai.dashboardPegawai', compact(
            'perjalanans',
            'totalPerjalanan',
            'totalMenunggu',
            'totalBelumSelesai',
            'totalSelesai'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tujuan' => 'required|string|max:255',
            'tgl_berangkat' => 'required|date',
            'tgl_pulang' => 'required|date',
            'deskripsi' => 'required|string'
        ]);


        Perjalanan::create([
            'pegawai_id' => Auth::id(),
            'tujuan' => $validated['tujuan'],
            'tgl_berangkat' => $validated['tgl_berangkat'],
            'tgl_pulang' => $validated['tgl_pulang'],
            'deskripsi' => $validated['deskripsi'],
            'status' => 'belum selesai',
            'isVerified' => 'belum diverifikasi',
        ]);

        return redirect()->route('pegawai-dashboard')->with('success', 'Perjalanan berhasil dibuat!');
    }

    public function updateStatus($id)
    {
        $perjalanan = Perjalanan::findOrFail($id);


        $perjalanan->status = $perjalanan->status === 'selesai'
            ? 'belum selesai'
            : 'selesai';

        $perjalanan->save();

        return redirect()->back()->with('success', 'Status perjalanan berhasil diperbarui.');
    }



}
