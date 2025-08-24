<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    //
public function login(Request $request)
{
    $loginData = $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string']
    ]);

    $pegawai = Pegawai::where('email', $loginData['email'])->first();

    if ($pegawai && Hash::check($loginData['password'], $pegawai->password)) {
        Auth::guard('pegawai')->login($pegawai); // <- perbaikan disini
        $request->session()->regenerate();

        if ($pegawai->role === 'admin') {
            return redirect()->route('admin-dashboard');
        } else {
            return redirect()->route('pegawai-dashboard');
        }

    } else {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

    public function Register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6', // pakai password_confirmation
        ]);

        // Simpan user baru
        $Pegawai = Pegawai::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pegawai', // otomatis role pegawai
        ]);

        Auth::guard('pegawai')->login($Pegawai);
        $request->session()->regenerate();

        return redirect()->route('pegawai-dashboard');
    }



    public function ShowLoginForm()
    {
        return view('auth.login');
    }

    public function ShowRegisForm()
    {
        return view('auth.regis');
    }

}
