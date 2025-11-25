<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Bimbingan') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-50" x-data="{ sidebarOpen: false }">

    @php
        $role = Auth::user()->role;

        // Warna Background Sidebar
        $themeClass = match($role) {
            'mahasiswa' => 'bg-blue-600',
            'dosen' => 'bg-emerald-700',
            'admin' => 'bg-slate-800',
            default => 'bg-gray-800'
        };

        // Warna Hover Item Menu
        $hoverClass = match($role) {
            'mahasiswa' => 'hover:bg-blue-700',
            'dosen' => 'hover:bg-emerald-800',
            'admin' => 'hover:bg-slate-700',
            default => 'hover:bg-gray-700'
        };

        // Warna Teks Icon Profil
        $textClass = match($role) {
            'mahasiswa' => 'text-blue-600',
            'dosen' => 'text-emerald-600',
            'admin' => 'text-slate-600',
            default => 'text-gray-600'
        };

        // Tentukan Route Dashboard agar dinamis saat klik logo/dashboard
        $dashboardRoute = match($role) {
            'mahasiswa' => route('mahasiswa.dashboard'),
            'dosen' => route('dosen.dashboard'),
            'admin' => route('admin.dashboard'),
            default => '#'
        };
    @endphp

    <div class="min-h-screen flex">

        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 {{ $themeClass }} text-white transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-0 shadow-xl">

            <div class="flex items-center justify-center h-16 bg-black/20 font-bold text-xl tracking-wider">
                AKADEMIK<span class="font-light opacity-75">APP</span>
            </div>

            <nav class="mt-5 px-2 space-y-2">

                <a href="{{ $dashboardRoute }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white bg-white/10 border border-white/10">
                    <svg class="mr-4 h-6 w-6 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>

                @if($role === 'mahasiswa')
                    <a href="{{ route('mahasiswa.consultations.create') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Ajukan Konsultasi
                    </a>

                    <a href="{{ route('mahasiswa.consultations.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Riwayat Bimbingan
                    </a>

                    <a href="{{ route('mahasiswa.logbook.print') }}" target="_blank" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                        Cetak Logbook
                    </a>
                @endif

                @if($role === 'dosen')
                    <div class="pt-2 pb-1 text-xs text-emerald-200/70 uppercase font-bold px-4">Bimbingan</div>

                    <a href="{{ route('dosen.consultations.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                        Permintaan Masuk
                    </a>

                    <div class="pt-4 pb-1 text-xs text-emerald-200/70 uppercase font-bold px-4">Administrasi</div>

                    <a href="{{ route('dosen.schedules.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Atur Jadwal
                    </a>

                    <a href="{{ route('dosen.reports.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                         <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        Laporan Kinerja
                    </a>
                @endif

                @if($role === 'admin')
                    <div class="pt-2 pb-1 text-xs text-gray-400 uppercase font-bold px-4">Pengguna</div>

                    <a href="{{ route('admin.users.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        Kelola User
                    </a>

                    <div class="pt-4 pb-1 text-xs text-gray-400 uppercase font-bold px-4">Master Data</div>

                    <a href="{{ route('admin.prodi.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        Program Studi
                    </a>

                    <a href="{{ route('admin.academic.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                        <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Tahun Akademik
                    </a>

                    <div class="pt-4 pb-1 text-xs text-gray-400 uppercase font-bold px-4">System</div>

                    <a href="{{ route('admin.logs.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                         <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                        Audit Logs
                    </a>

                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white/80 {{ $hoverClass }} hover:text-white transition">
                         <svg class="mr-4 h-6 w-6 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                        Laporan Statistik
                    </a>
                @endif

            </nav>

            <div class="absolute bottom-0 w-full bg-black/10 p-4 border-t border-white/10">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('profile.edit') }}">
                            <div class="h-8 w-8 rounded-full bg-white flex items-center justify-center {{ $textClass }} font-bold overflow-hidden">
                                @if(Auth::user()->avatar)
                                    <img src="{{ Storage::url('avatars/' . Auth::user()->avatar) }}" class="w-full h-full object-cover">
                                @else
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="ml-3 overflow-hidden">
                        <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-white hover:underline truncate block" title="Edit Profil">
                            {{ Auth::user()->name }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-xs text-white/70 hover:text-white">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">

            <header class="md:hidden flex items-center justify-between bg-white shadow p-4 z-20">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <span class="font-bold text-gray-700">Sistem Bimbingan</span>
                <div class="h-8 w-8 rounded-full {{ $themeClass }} text-white flex items-center justify-center font-bold text-sm overflow-hidden">
                     @if(Auth::user()->avatar)
                        <img src="{{ Storage::url('avatars/' . Auth::user()->avatar) }}" class="w-full h-full object-cover">
                    @else
                        {{ substr(Auth::user()->name, 0, 1) }}
                    @endif
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">

                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm flex justify-between items-center">
                        <div>
                            <p class="font-bold">Berhasil!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-green-700 hover:text-green-900 font-bold">&times;</button>
                    </div>
                @endif

                @if(session('error'))
                    <div x-data="{ show: true }" x-show="show" class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm flex justify-between items-center">
                        <div>
                            <p class="font-bold">Terjadi Kesalahan!</p>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-red-700 hover:text-red-900 font-bold">&times;</button>
                    </div>
                @endif

                {{ $slot }}

            </main>
        </div>
    </div>
</body>
</html>
