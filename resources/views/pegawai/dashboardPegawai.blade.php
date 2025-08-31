@extends('layouts.app')

@section('title', 'Dashboard Karyawan')

@section('nav-title')Halaman Pegawai @endsection

@section('content')
    <!-- Welcome Message -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6 flex items-center justify-between w-full">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang, {{ $nama }}</h2>
            <p class="text-gray-600">Kelola Perjalanan Dinas Anda dengan Mudah dan Efisien.</p>
        </div>
        <form action="{{ route('logout.process') }}" method="post">
            @csrf
            <button
                class="bg-black text-white px-6 py-3 rounded-lg flex items-center space-x-2 hover:bg-gray-800 transition-colors">
                Log out
            </button>
        </form>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Perjalanan -->
        <div class="bg-white rounded-lg shadow-sm p-6 {{ $activeFilter == null ? 'ring-2 ring-blue-500 bg-blue-50' : '' }} cursor-pointer"
            onclick="window.location='{{ route('pegawai-dashboard', ['filter' => null]) }}'">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2
                                              0 01-2-2V5a2 2 0 012-2h5.586a1
                                              1 0 01.707.293l5.414 5.414a1 1
                                              0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-1">Total Perjalanan</h3>
                <p class="text-3xl font-bold text-gray-900">{{ $totalPerjalanan }}</p>
            </div>
        </div>

        {{-- total yg masih nunggu --}}
        <div class="bg-white rounded-lg shadow-sm p-6 {{ $activeFilter == 'menunggu' ? 'ring-2 ring-orange-500 bg-orange-50' : '' }} cursor-pointer"
            onclick="window.location='{{ route('pegawai-dashboard', ['filter' => 'menunggu']) }}'">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-orange-100 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0
                                              11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-1">Menunggu Persetujuan</h3>
                <p class="text-3xl font-bold text-gray-900">{{ $totalMenunggu }}</p>
            </div>
        </div>


        {{-- totoal yg belum selesao --}}
        <div class="bg-white rounded-lg shadow-sm p-6 {{ $activeFilter == 'berlangsung' ? 'ring-2 ring-green-500 bg-green-50' : '' }} cursor-pointer"
            onclick="window.location='{{ route('pegawai-dashboard', ['filter' => 'belum selesai']) }}'">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-green-100 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0
                                              010-12.728m12.728 0a9 9 0
                                              010 12.728m-9.9-2.829a5 5
                                              0 010-7.07m7.072 0a5 5
                                              0 010 7.07M13 12a1 1 0
                                              11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-1">Sedang Berlangsung</h3>
                <p class="text-3xl font-bold text-gray-900">{{ $totalBelumSelesai }}</p>
            </div>
        </div>


        {{-- totsl selesai --}}
        <div class="bg-white rounded-lg shadow-sm p-6 {{ $activeFilter == 'selesai' ? 'ring-2 ring-gray-500 bg-gray-50' : '' }} cursor-pointer"
            onclick="window.location='{{ route('pegawai-dashboard', ['filter' => 'selesai']) }}'">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-gray-100 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0
                                              11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-1">Selesai</h3>
                <p class="text-3xl font-bold text-gray-900">{{ $totalSelesai }}</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center mb-6">
        @if ($activeFilter === 'menunggu')
            <h3 class="text-lg font-semibold text-yellow-600 mb-2">Perjalanan yang Menunggu Persetujuan</h3>
            <p class="text-sm text-gray-600">Semua perjalanan yang masih menunggu persetujuan admin.</p>
        @elseif ($activeFilter === 'selesai')
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Perjalanan yang Sudah Selesai</h3>
            <p class="text-sm text-gray-600">Daftar perjalanan yang sudah selesai dilakukan.</p>
        @elseif ($activeFilter === 'belum selesai')
            <h3 class="text-lg font-semibold text-green-600 mb-2">Perjalanan yang Sedang Berlangsung</h3>
            <p class="text-sm text-gray-600">Daftar perjalanan yang sedang berjalan.</p>
        @else
            <h3 class="text-lg font-semibold text-blue-600 mb-2">Riwayat Perjalanan Dinas</h3>
            <p class="text-sm text-gray-600">Daftar semua perjalanan dinas yang Anda lakukan.</p>
        @endif
    </div>

    <!-- Tombol Ajukan Perjalanan -->
    <div class="mb-8">
        <button
            class="bg-black text-white px-6 py-3 rounded-lg flex items-center space-x-2 hover:bg-gray-800 transition-colors"
            onclick="window.location='{{ route('pegawai-form') }}'">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6
                                      0H6" />
            </svg>
            <span>Ajukan Perjalanan Dinas Baru</span>
        </button>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Riwayat Perjalanan Dinas</h3>
            <p class="text-sm text-gray-600">Daftar Semua Perjalanan Dinas yang Anda Lakukan</p>
        </div>

        <div class="space-y-4">
            @forelse($perjalanans as $p)
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-2">
                                <h4 class="font-semibold text-gray-900">{{ $p->tujuan }}</h4>

                                {{-- Status Verifikasi --}}
                                @if ($p->isVerified === 'ditolak')
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Ditolak</span>
                                @elseif($p->isVerified === 'diverifikasi')
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Disetujui</span>
                                @else
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Menunggu</span>
                                @endif
                            </div>

                            <p class="text-sm text-gray-600 mb-2">{{ $p->deskripsi }}</p>

                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                <span>{{ \Carbon\Carbon::parse($p->tgl_berangkat)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($p->tgl_pulang)->format('d/m/Y') }}</span>
                                <span>Diajukan {{ $p->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>

                        <div>
                            @if ($p->isVerified === 'diverifikasi')
                                <form action="{{ route('pegawai-status', $p->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="px-4 py-2 rounded-lg text-white text-sm
                                    {{ $p->status === 'selesai' ? 'bg-green-600 hover:bg-green-700' : 'bg-gray-500 hover:bg-gray-600' }}">
                                        {{ $p->status === 'selesai' ? 'Selesai' : 'Belum Selesai' }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Belum ada perjalanan dinas yang diajukan.</p>
            @endforelse
        </div>
    </div>
@endsection
