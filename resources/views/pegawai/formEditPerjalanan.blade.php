@extends('layouts.app')

@section('title', 'Edit Perjalanan Dinas Baru')

@section('content')
  <form action="{{ route('pegawaiUpdate--form', $perjalanan->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <input type="text" name="tujuan" placeholder="Tujuan atau Lokasi Perjalanan"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
      value="{{ old('tujuan', $perjalanan->tujuan) }}" required>

    <input type="date" name="tgl_berangkat"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
      value="{{ old('tgl_berangkat', $perjalanan->tgl_berangkat) }}" required>

    <input type="date" name="tgl_pulang"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
      value="{{ old('tgl_pulang', $perjalanan->tgl_pulang) }}" required>

    <textarea name="deskripsi" placeholder="Deskripsi Aktivitas"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>{{ old('deskripsi', $perjalanan->deskripsi) }}
    </textarea>

    <div class="flex justify-between">
      <a href="{{ route('pegawai-dashboard') }}"
        class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
        Kembali
      </a>
      <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition-colors">
        SUBMIT
      </button>
    </div>
  </form>

@endsection