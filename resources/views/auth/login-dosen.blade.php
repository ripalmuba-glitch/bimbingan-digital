<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dosen - Sistem Bimbingan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex flex-row-reverse">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-white w-full lg:w-1/2 shadow-xl z-10">
            <div class="mx-auto w-full max-w-sm lg:w-96">

                <div class="text-center lg:text-left">
                    <span class="inline-block p-2 rounded-lg bg-emerald-100 text-emerald-700 mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </span>
                    <h2 class="text-3xl font-extrabold text-emerald-900">
                        Area Dosen
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Masuk untuk mengelola bimbingan dan jadwal mahasiswa.
                    </p>
                </div>

                @if ($errors->any())
                <div class="mt-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Akses Ditolak!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
                @endif

                <div class="mt-8">
                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email Institusi </label>
                            <input id="email" name="email" type="email" required
                                class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
                                placeholder="nama@dosen.kampus.ac.id">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700"> Kata Sandi </label>
                            <input id="password" name="password" type="password" required
                                class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900"> Ingat sesi saya </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-700 hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                            Masuk Dashboard
                        </button>
                    </form>

                     <div class="mt-6 text-center">
                        <a href="{{ url('/') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">
                            &larr; Halaman Depan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden lg:block relative w-0 flex-1">
            <div class="absolute inset-0 h-full w-full bg-emerald-900">
                <img class="absolute inset-0 h-full w-full object-cover opacity-40"
                     src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                     alt="Dosen Mengajar">
                <div class="absolute bottom-0 left-0 p-12 text-white">
                    <blockquote class="text-2xl font-serif italic">
                        "Pendidikan adalah senjata paling mematikan di dunia, karena dengan pendidikan, Anda dapat mengubah dunia."
                    </blockquote>
                    <p class="mt-4 font-bold">- Nelson Mandela</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
