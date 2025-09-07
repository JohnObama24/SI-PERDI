@extends('layouts.app')

@section('title', 'Export Data Perjalanan Dinas')

@section('content')
  <form method="POST" action="" class="space-y-4">
    @csrf

    <label class="block">
      Dari Tanggal:
      <input type="date" name="from_date"
             class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
    </label>

    <label class="block">
      Sampai Tanggal:
      <input type="date" name="to_date"
             class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
    </label>

    <div class="flex justify-between">
      <a href="{{ route('pegawai-dashboard') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
        Kembali
      </a>

      <div class="flex gap-2">
        <button type="submit" formaction="{{ route('export.excel') }}"
          class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
          Export Excel
        </button>

      </div>
    </div>
  </form>
@endsection
