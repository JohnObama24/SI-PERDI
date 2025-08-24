@extends('layouts.app')

@section('title', 'Buat Perjalanan Dinas Baru')

@section('content')
    <!-- Judul Halaman -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Buat Perjalanan Dinas Baru</h2>
        <p class="text-gray-600">Kelola Perjalanan Dinas Anda dengan Mudah dan Efisien.</p>
    </div>

    <!-- Form Pengajuan -->
    <div class="bg-gray-50 rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Form Pengajuan Perjalanan Dinas</h3>

        <form action="" class="space-y-4">
            @csrf

            <!-- NIK - Nama Lengkap -->
            <input type="text" name="nama" placeholder="NIK - Nama Lengkap"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <!-- Tujuan Perjalanan -->
            <input type="text" name="tujuan" placeholder="Tujuan atau Lokasi Perjalanan"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <!-- Waktu Perjalanan -->
            <div class="flex items-center border rounded-lg px-4 py-2">
                <input type="date" name="tanggal" placeholder="Waktu Perjalanan" class="w-full focus:outline-none">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0
                              002-2V7a2 2 0 00-2-2H5a2 2 0
                              00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>

            <!-- Waktu Berangkat & Pulang -->
            <input type="text" name="waktu" placeholder="Waktu Berangkat - Waktu Pulang"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <!-- Deskripsi Aktivitas -->
            <textarea name="deskripsi" placeholder="Deskripsi Aktivitas"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>

            <!-- Tombol Submit -->
            <div class="flex justify-between">
                <button onclick="window.location='{{ route('pegawai-dashboard') }}'"
                    class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition-colors">
                    Kembali
                </button>
                <button type="submit" onclick="window.location='{{ route('pegawai-dashboard') }}'"
                    class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition-colors">
                    SUBMIT
                </button>
            </div>
        </form>
    </div>
@endsection
