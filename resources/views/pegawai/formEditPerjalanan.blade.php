@extends('layouts.app')

@section('title', 'Edit Perjalanan Dinas Baru')

@section('content')
  <form action="{{ route('pegawaiUpdate--form', $perjalanan->id) }}" method="POST"
    class="space-y-4  max-w-xl flex flex-col justify-center m-auto">
    @csrf
    @method('PUT')
    <label for="tujuan" class="font-bold">Tujuan Perjalanan</label>
    <input type="text" name="tujuan" placeholder="Tujuan atau Lokasi Perjalanan" id="tujuan"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
      value="{{ old('tujuan', $perjalanan->tujuan) }}" required>

    <label for="berangkat" class="font-bold">Tanggal Berangkat</label>
    <input type="date" name="tgl_berangkat" id="berangkat"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
      value="{{ old('tgl_berangkat', $perjalanan->tgl_berangkat) }}" required>

    <label for="pulang" class="font-bold">Tanggal Pulang</label>
    <input type="date" name="tgl_pulang" id="pulang"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
      value="{{ old('tgl_pulang', $perjalanan->tgl_pulang) }}" required>

    <label for="deskripsi" class="font-bold">Deskripsi Aktivitas</label>
    <textarea name="deskripsi" placeholder="Deskripsi Aktivitas" id="deskripsi"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>{{ old('deskripsi', $perjalanan->deskripsi) }}
                          </textarea>

    <div class="flex justify-between">
      <a href="{{ route('pegawai-dashboard') }}"
        class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
        Kembali
      </a>
      <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition-colors">
        Submit
      </button>
    </div>
  </form>

@endsection