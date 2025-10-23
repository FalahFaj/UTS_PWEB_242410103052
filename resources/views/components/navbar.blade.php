{{-- Ini adalah komponen navbar yang bisa digunakan kembali --}}
<nav class="bg-violet-700 text-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            {{-- Gunakan helper route() untuk URL dinamis berdasarkan nama rute --}}
            <a href="{{ route('dashboard', ['username' => session('username')]) }}" class="text-xl font-bold">UTS PWEB</a>
            <div class="space-x-6">
                {{-- Contoh tautan navigasi --}}
                {{-- Menambahkan kelas 'font-bold border-b-2' jika rute saat ini aktif --}}
                <a href="{{ route('dashboard', ['username' => session('username')]) }}" class="hover:text-violet-300 transition duration-150 {{ request()->routeIs('dashboard') ? 'font-bold border-b-2 border-white' : '' }}">Dashboard</a>
                <a href="{{ route('pengelolaan.index') }}" class="hover:text-violet-300 transition duration-150 {{ request()->routeIs('pengelolaan.*') ? 'font-bold border-b-2 border-white' : '' }}">Pengelolaan</a>
                <a href="{{ route('profile') }}" class="hover:text-violet-300 transition duration-150 {{ request()->routeIs('profile') ? 'font-bold border-b-2 border-white' : '' }}">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-violet-300 transition duration-150">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
