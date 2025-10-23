<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .btn-gradient {
            background-image: linear-gradient(to right, #8B5CF6, #6D28D9);
        }
        .btn-gradient:hover {
            background-image: linear-gradient(to right, #7C3AED, #5B21B6);
        }
        .input-with-icon {
            position: relative;
        }
        .input-with-icon svg.input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 1.1rem;
            height: 1.1rem;
            color: #9ca3af;
        }
        .input-with-icon input {
            padding-left: 48px !important;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            padding-right: 0.75rem;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            transition: border-color 0.2s, box-shadow 0.2s;
            width: 100%;
        }
        .input-with-icon input:focus {
             border-color: #8B5CF6;
             box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
             outline: none;
        }
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9ca3af;
        }
         .password-toggle svg {
            width: 1.25rem;
            height: 1.25rem;
         }

        .wave-shape {
            position: absolute;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            z-index: 0;
        }
        .wave-top {
            top: 0;
            transform: rotate(180deg);
        }
        .wave-bottom {
            bottom: 0;
        }
        .wave-shape svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 150px;
        }
        .wave-shape .shape-fill {
            fill: #8B5CF6;
            opacity: 0.8;
        }

    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen relative overflow-hidden px-4">

    <div class="wave-shape wave-top">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
     <div class="wave-shape wave-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="relative z-10 w-full max-w-4xl bg-white p-6 md:p-10 rounded-3xl shadow-2xl flex flex-col md:flex-row overflow-hidden m-4 border border-gray-200">

        <div class="w-full md:w-1/2 md:pr-10 lg:pr-16 mb-8 md:mb-0">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Halo!</h1>
            <p class="text-gray-500 mb-8 text-sm">Masuk ke akun Anda</p>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="GET" class="space-y-6">
                <div class="input-with-icon">
                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Username" class="mt-1 block" required>
                </div>

                {{-- Input Password --}}
                <div class="input-with-icon">
                   <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                   </svg>
                    <input type="password" name="password" id="password" placeholder="Password" class="mt-1 block pr-12" required>
                    <span class="password-toggle" onclick="togglePasswordVisibility()">
                        {{-- Ikon mata terlihat --}}
                        <svg id="eye-icon-visible" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                           <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg id="eye-icon-hidden" class="hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </span>
                </div>

                <button type="submit" class="w-full btn-gradient text-white font-semibold py-3 px-4 rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500 transition duration-150 transform hover:-translate-y-0.5">
                    SIGN IN
                </button>

            </form>
        </div>

        <div class="w-full md:w-1/2 md:pl-10 lg:pl-16 text-center md:text-left pt-8 md:pt-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang!</h2>
            <p class="text-gray-600 leading-relaxed text-sm">
                Silahkan masukkan username dan password untuk bisa masuk ke sistem
            </p>
        </div>

    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIconVisible = document.getElementById('eye-icon-visible');
            const eyeIconHidden = document.getElementById('eye-icon-hidden');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIconVisible.classList.add('hidden');
                eyeIconHidden.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIconVisible.classList.remove('hidden');
                eyeIconHidden.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
