<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa - Bimbingan Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-white w-full lg:w-1/2">
            <div class="mx-auto w-full max-w-sm lg:w-96">

                <div class="text-center lg:text-left">
                    <h2 class="mt-6 text-3xl font-extrabold text-blue-700">
                        Portal Mahasiswa
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Masuk untuk memulai konsultasi & bimbingan.
                    </p>
                </div>

                @if ($errors->any())
                <div class="mt-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-md animate-pulse">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Gagal Masuk</h3>
                            <div class="mt-1 text-sm text-red-700">
                                {{ $errors->first() }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="mt-8">
                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email Kampus </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out"
                                    value="{{ old('email') }}" placeholder="nim@mahasiswa.kampus.ac.id">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                            <div class="mt-1 relative">
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-200 ease-in-out"
                                    placeholder="••••••••">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900"> Ingat saya </label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:scale-[1.02]">
                                Masuk Sekarang
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="{{ url('/') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                            &larr; Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden lg:block relative w-0 flex-1">
            <div class="absolute inset-0 h-full w-full bg-blue-900">
                <img class="absolute inset-0 h-full w-full object-cover opacity-60 mix-blend-overlay"
                     src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                     alt="Mahasiswa Belajar">
                <div class="absolute inset-0 flex items-center justify-center p-12">
                    <div class="text-white text-center">
                        <h1 class="text-4xl font-bold mb-4">Masa Depan Dimulai Di Sini</h1>
                        <p class="text-lg text-blue-100">Konsultasikan skripsi dan akademikmu dengan mudah dan terstruktur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
