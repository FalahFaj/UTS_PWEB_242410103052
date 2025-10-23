<nav class="bg-white shadow-md rounded-xl max-w-6xl w-full mx-auto my-4 relative z-20">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            <div class="flex items-center">
                <a href="{{ route('dashboard', ['username' => session('username')]) }}" class="text-xl font-bold text-violet-700 flex items-center">
                    <svg class="w-7 h-7 mr-2 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path> </svg>
                    UTS PWEB
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('dashboard', ['username' => session('username')]) }}"
                   class="text-gray-600 hover:text-violet-700 px-3 py-2 rounded-md text-sm font-medium transition duration-150 {{ request()->routeIs('dashboard') ? 'text-violet-700 font-semibold' : '' }}">
                   Dashboard
                </a>
                <a href="{{ route('pengelolaan.index') }}"
                   class="text-gray-600 hover:text-violet-700 px-3 py-2 rounded-md text-sm font-medium transition duration-150 {{ request()->routeIs('pengelolaan.*') ? 'text-violet-700 font-semibold' : '' }}">
                   Pengelolaan
                </a>
                <a href="{{ route('profile', ['username' => session('username')]) }}"
                   class="text-gray-600 hover:text-violet-700 px-3 py-2 rounded-md text-sm font-medium transition duration-150 {{ request()->routeIs('profile') ? 'text-violet-700 font-semibold' : '' }}">
                   Profile
                </a>
            </div>

            <div class="hidden md:block">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-violet-600 hover:bg-violet-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition duration-150 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
