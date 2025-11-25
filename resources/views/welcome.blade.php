<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Bimbingan Akademik</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-800">

        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-red-500 selection:text-white">

            <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl mb-4">
                    Platform Konsultasi Akademik
                </h1>
                <p class="text-lg text-gray-600 mb-12 max-w-2xl mx-auto">
                    Hubungkan aspirasi akademik Anda dengan bimbingan dosen yang tepat. Terstruktur, tercatat, dan efisien.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">

                    <a href="{{ route('login.mahasiswa') }}" class="group block p-6 bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-100 transition-all transform hover:-translate-y-1">
                        <div class="h-12 w-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Mahasiswa</h3>
                        <p class="mt-2 text-sm text-gray-500">Ajukan bimbingan, cek jadwal, dan kirim revisi skripsi.</p>
                    </a>

                    <a href="{{ route('login.dosen') }}" class="group block p-6 bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-100 transition-all transform hover:-translate-y-1">
                        <div class="h-12 w-12 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Dosen</h3>
                        <p class="mt-2 text-sm text-gray-500">Kelola jadwal konsultasi dan pantau progres mahasiswa.</p>
                    </a>

                    <a href="{{ route('login.admin') }}" class="group block p-6 bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-100 transition-all transform hover:-translate-y-1">
                        <div class="h-12 w-12 bg-gray-100 text-gray-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-gray-800 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Administrator</h3>
                        <p class="mt-2 text-sm text-gray-500">Panel kendali sistem dan data master.</p>
                    </a>

                </div>
            </div>
        </div>
    </body>
</html>
