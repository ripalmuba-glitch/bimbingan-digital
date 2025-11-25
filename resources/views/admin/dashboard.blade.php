<x-app-layout>
    <div class="mb-8 flex flex-col md:flex-row justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Control Panel</h1>
            <p class="text-gray-500 mt-1">Overview sistem dan statistik performa akademik.</p>
        </div>
        <div class="mt-4 md:mt-0">
             <span class="bg-slate-800 text-white py-2 px-4 rounded-lg text-sm font-bold shadow-md">
                Administrator Mode
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <div class="bg-slate-800 rounded-xl p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
            <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <h3 class="text-slate-400 text-xs uppercase font-bold tracking-wider">Total User</h3>
            <div class="text-4xl font-bold mt-2">{{ $totalUsers ?? 0 }}</div>
            <div class="mt-4 text-xs text-slate-400 flex items-center">
                <span class="text-green-400 mr-1">●</span> Akun Terdaftar
            </div>
        </div>

        <div class="bg-slate-700 rounded-xl p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
             <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-slate-300 text-xs uppercase font-bold tracking-wider">Total Dosen</h3>
            <div class="text-4xl font-bold mt-2 text-emerald-400">{{ $totalDosen ?? 0 }}</div>
             <div class="mt-4 text-xs text-slate-400 flex items-center">
                Pembimbing Akademik
            </div>
        </div>

        <div class="bg-slate-700 rounded-xl p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
             <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
            </div>
            <h3 class="text-slate-300 text-xs uppercase font-bold tracking-wider">Total Mahasiswa</h3>
            <div class="text-4xl font-bold mt-2 text-blue-400">{{ $totalMahasiswa ?? 0 }}</div>
             <div class="mt-4 text-xs text-slate-400 flex items-center">
                Mahasiswa Aktif
            </div>
        </div>

         <div class="bg-indigo-900 rounded-xl p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
             <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </div>
            <h3 class="text-indigo-300 text-xs uppercase font-bold tracking-wider">Sesi Bimbingan</h3>
            <div class="text-4xl font-bold mt-2">{{ $activeSessions ?? 0 }}</div>
             <div class="mt-4 text-xs text-indigo-300 flex items-center">
                Status: Approved / Berjalan
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Manajemen Data Master
            </h3>
            <div class="grid grid-cols-2 gap-4">

                <a href="{{ route('admin.users.create') }}" class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-200 rounded-xl hover:border-slate-600 hover:bg-slate-50 transition group cursor-pointer">
                    <div class="p-3 bg-slate-100 rounded-full text-slate-600 group-hover:bg-slate-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </div>
                    <span class="mt-3 font-semibold text-gray-700 group-hover:text-slate-700 text-sm">Tambah User Baru</span>
                </a>

                <a href="{{ route('admin.users.index') }}" class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-200 rounded-xl hover:border-blue-600 hover:bg-blue-50 transition group cursor-pointer">
                     <div class="p-3 bg-blue-100 rounded-full text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <span class="mt-3 font-semibold text-gray-700 group-hover:text-blue-700 text-sm">Kelola Data User</span>
                </a>

            </div>

            <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-100 flex items-start">
                <svg class="w-5 h-5 text-yellow-600 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-sm text-yellow-800">
                    <strong>Catatan Admin:</strong> Pastikan NIP/NIM unik saat menambahkan pengguna baru. Data yang dihapus tidak dapat dikembalikan.
                </p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-gray-800">User Baru Terdaftar</h3>
                <a href="{{ route('admin.users.index') }}" class="text-xs text-indigo-600 hover:underline">Lihat Semua</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-white text-gray-500 border-b">
                        <tr>
                            <th class="px-6 py-3 font-medium">Nama</th>
                            <th class="px-6 py-3 font-medium">Role</th>
                            <th class="px-6 py-3 font-medium">Terdaftar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($latestUsers as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <div class="flex items-center">
                                    <div class="h-6 w-6 rounded-full bg-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-600 mr-2">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="font-medium text-gray-700">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                @if($user->role == 'dosen')
                                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">Dosen</span>
                                @elseif($user->role == 'mahasiswa')
                                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">Mhs</span>
                                @else
                                    <span class="text-xs font-bold text-gray-600 bg-gray-100 px-2 py-0.5 rounded">Admin</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-gray-400 text-xs">
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-400">Belum ada user baru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
