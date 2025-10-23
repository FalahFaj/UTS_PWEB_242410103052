@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Ubah Mahasiswa</h1>

     @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <ul class="mt-1 list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 max-w-lg mx-auto">
        <form action="{{ route('pengelolaan.update', $mahasiswa['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa['nama']) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                <input type="number" name="nim" id="nim" value="{{ old('nim', $mahasiswa['nim']) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required>
            </div>

            <div class="mb-6">
                <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $mahasiswa['jurusan']) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required>
            </div>

            <div class="flex justify-end space-x-3">
                 <a href="{{ route('pengelolaan.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow transition duration-150">
                    Batal
                 </a>
                 <button type="submit" class="bg-violet-600 hover:bg-violet-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-150">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
