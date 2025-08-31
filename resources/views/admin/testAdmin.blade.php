@extends('layouts.app')

@section('title', 'Dashboard Admin - Sistem Informasi Perjalanan Dinas')

@section('content')
<div class="min-h-screen bg-gray-100">


    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang, Laythan Lateesha!</h2>
            <p class="text-lg text-gray-600">Kelola Perjalanan Dinas Karyawan dengan Mudah dan Efisien.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Perjalanan Karyawan -->
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Total Perjalanan Karyawan</p>
                        <p class="text-3xl font-bold text-gray-900">35</p>
                    </div>
                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0h6M8 7l-6 8h20l-6-8M8 7h8m-8 8v6a1 1 0 001 1h6a1 1 0 001-1v-6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Menunggu Persetujuan -->
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Menunggu Persetujuan</p>
                        <p class="text-3xl font-bold text-gray-900">5</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Sedang Berlangsung -->
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Sedang Berlangsung</p>
                        <p class="text-3xl font-bold text-gray-900">7</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Selesai -->
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Selesai</p>
                        <p class="text-3xl font-bold text-gray-900">20</p>
                    </div>
                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Line Chart -->
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Jumlah Karyawan yang Perjalanan Dinas Setiap Tahun</h3>
                <div class="h-64">
                    <canvas id="lineChart" width="400" height="200"></canvas>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Distribusi Perjalanan Dinas</h3>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="pieChart" width="300" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Footer -->
    </main>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    // Line Chart
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Nov', 'Oct', 'Dec'],
            datasets: [{
                label: 'Series 1',
                data: [15, 17, 22, 30, 30, 35, 32, 34, 29, 29, 19, 24],
                borderColor: '#06b6d4',
                backgroundColor: 'rgba(6, 182, 212, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Series 2',
                data: [8, 10, 16, 20, 22, 19, 25, 23, 15, 12, 8, 0],
                borderColor: '#fbbf24',
                backgroundColor: 'rgba(251, 191, 36, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 40,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pria', 'Wanita'],
            datasets: [{
                data: [50, 33, 17],
                backgroundColor: [
                    '#06b6d4',
                    '#4ade80',
                    '#a3a3a3'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        generateLabels: function(chart) {
                            const data = chart.data;
                            return data.labels.map((label, i) => {
                                const value = data.datasets[0].data[i];
                                return {
                                    text: `${label} ${value}%`,
                                    fillStyle: data.datasets[0].backgroundColor[i],
                                    strokeStyle: data.datasets[0].backgroundColor[i],
                                    pointStyle: 'circle'
                                };
                            });
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
