<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Karyawan')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-500 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0
                               00-2 2v6a2 2 0 002 2h2a2 2
                               0 002-2zm0 0V9a2 2 0
                               012-2h2a2 2 0 012 2v10m-6
                               0a2 2 0 002 2h2a2 2 0
                               002-2m0 0V5a2 2 0
                               012-2h2a2 2 0 012
                               2v14a2 2 0 01-2 2h-2a2
                               2 0 01-2-2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Dashboard @yield('nav-title')</h1>
                    <p class="text-sm text-gray-500">Sistem Informasi Perjalanan Dinas</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="text-center mt-8 py-4">
        <p class="text-sm text-gray-500">© 2025 Kelompok 4 All Right Reserved</p>
    </div>

</body>

</html>