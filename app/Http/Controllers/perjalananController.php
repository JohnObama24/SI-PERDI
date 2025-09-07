<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perjalanan;
use Illuminate\Support\Facades\Auth;
use App\Exports\PerjalananExport;
use Maatwebsite\Excel\Facades\Excel;

class perjalananController extends Controller
{
    //

    public function index(Request $request)
    {
        $user = Auth::user();

        $nama = $user->nama_lengkap;
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

        $perjalanans = $query->with('pegawai')->latest()->get();

        $totalPerjalanan = $query->count();

        if ($user->role === 'admin') {
            $totalPerjalanan = Perjalanan::count();
            $totalMenunggu = Perjalanan::where('isVerified', 'belum diverifikasi')->count();
            $totalBelumSelesai = Perjalanan::where('status', 'belum selesai')->count();
            $totalSelesai = Perjalanan::where('status', 'selesai')->count();

        } else {
            $totalPerjalanan = Perjalanan::where('pegawai_id', $user->id)->count();
            $totalMenunggu = Perjalanan::where('pegawai_id', $user->id)->where('isVerified', 'belum diverifikasi')->count();
            $totalBelumSelesai = Perjalanan::where('pegawai_id', $user->id)->where('status', 'belum selesai')->count();
            $totalSelesai = Perjalanan::where('pegawai_id', $user->id)->where('status', 'selesai')->count();

        }

        $activeFilter = $request->filter;

        $view = $user->role === 'admin' ? 'admin.dashboardAdmin' : 'pegawai.dashboardPegawai';

        return view($view, compact(
            'perjalanans',
            'totalPerjalanan',
            'totalMenunggu',
            'totalBelumSelesai',
            'totalSelesai',
            'activeFilter',
            'nama'
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

    public function verifikasiAccept($id)
    {
        $perjalanan = Perjalanan::findOrFail($id);

        $perjalanan->isVerified = 'diverifikasi';

        $perjalanan->save();

        return redirect()->back()->with('success', 'Perjalanan berhasil diverifikasi.');
    }

    public function verifikasiReject($id)
    {
        $perjalanan = Perjalanan::findOrFail($id);

        $perjalanan->isVerified = 'ditolak';

        $perjalanan->save();

        return redirect()->back()->with('success', 'Perjalanan berhasil diverifikasi.');

    }


    public function edit($id)
    {
        $perjalanan = Perjalanan::findOrFail($id);
        return view("pegawai.formEditPerjalanan", compact('perjalanan'));
    }
    public function update(Request $request, $id)
    {
        $perjalanan = Perjalanan::findOrFail($id);
        $perjalanan->update($request->all());

        return redirect()->route('pegawai-dashboard')->with('success', 'Perjalanan berhasil diperbarui');
    }

    public function ShowExportForm()
    {
        return view('admin.exportForm');
    }

    public function export(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        return Excel::download(new PerjalananExport($request->from_date, $request->to_date), 'perjalanan.xlsx');
    }


}
