{{-- Menggunakan layout utama --}}
@extends('layouts.app')

{{-- Mengatur judul halaman ini --}}
@section('title', 'Dashboard')

{{-- Mendefinisikan bagian konten utama --}}
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        {{-- Menampilkan username yang dikirim dari controller [cite: 402] --}}
        <h1 class="text-3xl font-bold text-gray-800">Selamat datang, <span class="text-violet-700">{{ $username ?? 'Guest' }}</span>!</h1> {{-- [cite: 403] --}}
        <p class="mt-3 text-gray-600">Ini adalah halaman dashboard utama Anda.</p>
        <p class="mt-2 text-gray-500 text-sm">Anda dapat menavigasi ke halaman lain menggunakan navbar di atas.</p>
    </div>

    {{-- Anda bisa menambahkan widget dashboard lain di sini --}}
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded-lg shadow border">
            <h2 class="font-semibold text-lg mb-2">Statistik Cepat</h2>
            <p class="text-gray-600">Contoh widget.</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow border">
            <h2 class="font-semibold text-lg mb-2">Aktivitas Terbaru</h2>
            <p class="text-gray-600">Contoh widget lain.</p>
        </div>
    </div>
@endsection
