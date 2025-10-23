<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Mini Projek!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-violet-700">UTS PWEB</h1>
            <a href="{{ route('login.form') }}" class="bg-violet-600 text-white font-semibold px-5 py-2 rounded-lg shadow hover:bg-violet-700 transition duration-300">
                Login
            </a>
        </div>
    </header>

    <main class="grow">
        <section class="container mx-auto px-6 py-24">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 text-center lg:text-left mb-10 lg:mb-0">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                         Projek Laravel
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        {{ $info ?? 'Sebuah aplikasi sederhana yang dibuat untuk memenuhi tugas UTS Pemrograman Web, mendemonstrasikan fundamental Laravel.' }}
                    </p>
                    <a href="{{ route('login.form') }}" class="inline-block bg-violet-600 text-white font-bold text-lg px-8 py-4 rounded-xl shadow-lg hover:bg-violet-700 transition transform hover:-translate-y-1 duration-300">
                        Mulai Sekarang &rarr;
                    </a>
                </div>
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('storage/unet.png') }}" alt="Logo Universitas Jember" class="w-full max-w-xs md:max-w-sm">
                </div>
            </div>
        </section>

        <section class="bg-white py-20">
            <div class="container mx-auto px-6 text-center">
                <h3 class="text-3xl font-bold mb-3">Fitur Utama</h3>
                <p class="text-gray-500 mb-12">Mengelola data mahasiswa.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-8 border border-gray-200 rounded-xl shadow-sm">
                        <h4 class="text-xl font-semibold text-violet-700 mb-2">Menampilkan Data</h4>
                        <p class="text-gray-600">Menampilkan seluruh data mahasiswa</p>
                    </div>
                    <div class="p-8 border border-gray-200 rounded-xl shadow-sm">
                        <h4 class="text-xl font-semibold text-violet-700 mb-2">Mengubah Data</h4>
                        <p class="text-gray-600">Mengubah mulai dari nama, nim, dan jurusan</p>
                    </div>
                    <div class="p-8 border border-gray-200 rounded-xl shadow-sm">
                        <h4 class="text-xl font-semibold text-violet-700 mb-2">Menghapus Data</h4>
                        <p class="text-gray-600">Menghapus data mahasiswa yang diinginkan</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')

</body>
</html>
