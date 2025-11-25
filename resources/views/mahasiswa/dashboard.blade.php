<x-app-layout>
    <div class="mb-8 flex flex-col md:flex-row justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Dashboard Mahasiswa</h1>
            <p class="text-gray-500 mt-1">Pantau perkembangan studi dan bimbinganmu disini.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold border border-blue-200 shadow-sm">
                Semester Aktif: Ganjil 2024/2025
            </span>
        </div>
    </div>

    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 shadow-xl relative overflow-hidden mb-8 group hover:shadow-2xl transition-shadow duration-300 text-white">
        <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-white opacity-10 rounded-full blur-3xl transform group-hover:scale-110 transition-transform duration-700"></div>
        <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-blue-400 opacity-20 rounded-full blur-2xl"></div>

        <div class="relative z-10">
            <h2 class="text-3xl font-bold mb-2">Halo, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-blue-100 mb-8 max-w-2xl text-lg leading-relaxed">
                Sudahkah Anda berkonsultasi minggu ini? Jangan tunda bimbingan skripsi atau akademik Anda agar lulus tepat waktu.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('mahasiswa.consultations.create') }}" class="bg-white text-blue-700 font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-50 transition transform hover:-translate-y-1 flex items-center group-hover:ring-4 ring-white/30">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Ajukan Bimbingan Baru
                </a>

                <a href="{{ route('mahasiswa.consultations.index') }}" class="bg-blue-700 border border-blue-500 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-600 transition flex items-center">
                    <svg class="w-5 h-5 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Lihat Semua Riwayat
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-blue-500 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm text-gray-500 mb-1 font-medium uppercase tracking-wide">Total Konsultasi</p>
                <h3 class="text-4xl font-extrabold text-gray-800">{{ $totalKonsultasi }}</h3>
            </div>
            <div class="p-4 bg-blue-50 rounded-full text-blue-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-yellow-400 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm text-gray-500 mb-1 font-medium uppercase tracking-wide">Menunggu Respon</p>
                <h3 class="text-4xl font-extrabold text-gray-800">{{ $menunggu }}</h3>
            </div>
            <div class="p-4 bg-yellow-50 rounded-full text-yellow-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-green-500 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-sm text-gray-500 mb-1 font-medium uppercase tracking-wide">Bimbingan Selesai</p>
                <h3 class="text-4xl font-extrabold text-gray-800">{{ $selesai }}</h3>
            </div>
            <div class="p-4 bg-green-50 rounded-full text-green-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="font-bold text-gray-700 text-lg flex items-center">
                <span class="w-2 h-6 bg-blue-600 rounded-full mr-3"></span>
                Aktivitas Bimbingan Terakhir
            </h3>
            <a href="{{ route('mahasiswa.consultations.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                Lihat Semua <span class="ml-1">&rarr;</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4">Topik Konsultasi</th>
                        <th class="px-6 py-4">Dosen Pembimbing</th>
                        <th class="px-6 py-4">Tanggal Pengajuan</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($recentActivities as $item)
                    <tr class="bg-white hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-800">{{ Str::limit($item->topic, 40) }}</div>
                            <div class="text-xs text-gray-500 mt-1">{{ ucfirst($item->type) }} • {{ ucfirst(str_replace('_', ' ', $item->mode)) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-xs mr-2">
                                    {{ substr($item->lecturer->name, 0, 1) }}
                                </div>
                                <span class="text-gray-700">{{ $item->lecturer->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $item->created_at->format('d M Y') }}
                            <br>
                            <span class="text-xs text-gray-400">{{ $item->created_at->format('H:i') }} WIB</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($item->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center">
                                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5 animate-pulse"></span> Menunggu
                                </span>
                            @elseif($item->status == 'approved')
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-1.5"></span> Disetujui
                                </span>
                            @elseif($item->status == 'rejected')
                                <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span> Ditolak
                                </span>
                            @elseif($item->status == 'completed')
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> Selesai
                                </span>
                            @elseif($item->status == 'cancelled')
                                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full">
                                    Dibatalkan
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('mahasiswa.consultations.show', $item->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 transition">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <svg class="h-16 w-16 mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                <p class="text-lg font-medium text-gray-600">Belum ada riwayat bimbingan</p>
                                <p class="text-sm mt-1 max-w-xs">Mulai ajukan konsultasi pertama Anda dengan dosen pembimbing.</p>
                                <a href="{{ route('mahasiswa.consultations.create') }}" class="mt-4 text-blue-600 font-bold hover:underline">
                                    + Buat Pengajuan Sekarang
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
