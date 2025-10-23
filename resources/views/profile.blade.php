@extends('layouts.app')

@section('title', 'Profile Pengguna')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200 max-w-xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Profil Anda</h1>

        <div class="space-y-4">
            <div class="flex items-center border-b pb-3">
                <strong class="w-1/3 text-gray-500">Username:</strong>
                <span class="w-2/3 text-violet-700 font-medium">{{ $username ?? 'Guest' }}</span>
            </div>

            <div class="flex items-center border-b pb-3">
                <strong class="w-1/3 text-gray-500">Email:</strong>
                <span class="w-2/3 text-gray-700">{{ $profile['email'] ?? '(Data dummy)' }}</span>
            </div>

            <div class="flex items-center border-b pb-3">
                <strong class="w-1/3 text-gray-500">Role:</strong>
                <span class="w-2/3 text-gray-700">{{ $profile['role'] ?? '(Data dummy)' }}</span>
            </div>

            <div class="flex items-center pt-2">
                <strong class="w-1/3 text-gray-500">Password:</strong>
                <span class="w-2/3 text-gray-700 font-mono bg-gray-100 px-2 py-1 rounded">{{ $profile['password_dummy'] ?? '********' }}</span>
            </div>
            <p class="text-xs text-red-500 mt-1 text-center">

        </div>
    </div>
@endsection
