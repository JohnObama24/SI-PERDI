<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-PERDI - Sistem Informasi Perjalanan Dinas</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body
    class="min-h-screen bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 flex items-center justify-center p-4">

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-36 left-72   w-[600px] h-[600px] bg-[#BEBEBE] bg-opacity-70 rounded-full"></div>
        <div class="absolute top-60 right-72   w-[600px] h-[600px] bg-[#D5D5D5] bg-opacity-10 rounded-full"></div>
    </div>

    <div class="relative z-10 max-w-md w-full">

        <div class="text-center mb-2">
            <div class="flex justify-center items-center gap-4">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-xl mb-4 shadow-lg">
                    <i class="fas fa-plane text-white text-2xl"></i>
                </div>
                <h1 class="text-5xl font-bold text-gray-800 mb-2">SI-PERDI</h1>
            </div>
            <p class="text-gray-800 font-bold text-base">Sistem Informasi Perjalanan Dinas</p>
        </div>

        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/pict2-removebg-preview 1(1).png') }}" alt="Team Illustration"
                class="max-w-full h-auto max-h-80 object-contain">
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Selamat Datang di SI-PERDI !
        </h2>

        <div class="flex gap-5">
            <a href="{{ route('login')}}"
                class="w-full bg-black hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-full text-center transition duration-300 transform hover:scale-105">
                LOGIN
            </a>
        </div>

        <div class="text-center text-sm mt-2 text-gray-600">
            <p>Dengan Masuk dan Mendaftar Kamu Menyetujui
                <a href="" class="text-blue-600 hover:text-blue-800 hover:underline">Kebijakan Layanan</a>
                dan
                <a href="" class="text-blue-600 hover:text-blue-800 hover:underline">Kebijakan Privasi</a>
            </p>
        </div>
    </div>
</body>

</html>