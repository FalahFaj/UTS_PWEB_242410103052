{{-- Menggunakan layout utama --}}
@extends('layouts.app')

{{-- Mengatur judul --}}
@section('title', 'Profile Pengguna')

{{-- Mendefinisikan konten utama --}}
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 max-w-lg mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Profil Anda</h1>
        <div class="space-y-3">
            {{-- Menampilkan username yang dikirim dari controller [cite: 402] --}}
            <p class="text-gray-700"><strong>Username:</strong> <span class="text-violet-700 font-medium">{{ $username ?? 'Guest' }}</span></p> {{-- [cite: 403] --}}
            {{-- Anda bisa menambahkan detail profil lain di sini jika diperlukan --}}
            <p class="text-gray-700"><strong>Email:</strong> (Data dummy)</p>
            <p class="text-gray-700"><strong>Role:</strong> (Data dummy)</p>
        </div>
    </div>
@endsection
