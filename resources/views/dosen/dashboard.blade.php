<x-app-layout>
    <div class="mb-8 flex flex-col md:flex-row justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Ruang Kerja Dosen</h1>
            <p class="text-gray-500 mt-1">Halo, {{ Auth::user()->name }}. Anda memiliki <strong class="text-emerald-600">{{ $perluReview ?? 0 }} permintaan baru</strong>.</p>
        </div>
        <div class="mt-4 md:mt-0">
             <a href="{{ route('dosen.consultations.index') }}" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-semibold py-2 px-4 rounded shadow-sm text-sm">
                Lihat Semua Jadwal
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-8">

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                    <div class="text-gray-500 text-xs uppercase font-bold tracking-wider">Mahasiswa Bimbingan</div>
                    <div class="text-2xl font-bold text-gray-800 mt-1">{{ $totalMahasiswa ?? 0 }}</div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                    <div class="text-gray-500 text-xs uppercase font-bold tracking-wider">Perlu Review</div>
                    <div class="text-2xl font-bold text-red-500 mt-1">{{ $perluReview ?? 0 }}</div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                    <div class="text-gray-500 text-xs uppercase font-bold tracking-wider">Agenda Hari Ini</div>
                    <div class="text-2xl font-bold text-emerald-600 mt-1">{{ $agendaHariIni ?? 0 }}</div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-lg">Permintaan Konsultasi Masuk</h3>
                    @if(isset($perluReview) && $perluReview > 0)
                        <span class="bg-red-100 text-red-600 py-1 px-3 rounded-full text-xs font-bold animate-pulse">{{ $perluReview }} Baru</span>
                    @endif
                </div>
                <div class="divide-y divide-gray-100">

                    {{-- LOOP 1: Menggunakan variabel $req --}}
                    @forelse($incomingRequests as $req)
                    <div class="p-5 flex flex-col md:flex-row items-start md:items-center justify-between hover:bg-gray-50 transition">
                        <div class="flex items-center space-x-4">
                            <div class="h-12 w-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-lg">
                                {{ substr($req->student->name, 0, 2) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">{{ $req->student->name }}</h4>
                                <p class="text-sm text-gray-500">Topik: <span class="text-gray-700 font-medium">{{ Str::limit($req->topic, 30) }}</span></p>
                                <p class="text-xs text-gray-400 mt-1">Diajukan: {{ $req->created_at->diffForHumans() }} • Tgl: {{ $req->consultation_date->format('d M, H:i') }}</p>
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 flex space-x-2">
                            <a href="{{ route('dosen.consultations.show', $req->id) }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-600 text-sm rounded hover:bg-gray-50 font-medium">
                                Review
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-gray-500">
                        <p>Tidak ada permintaan baru saat ini.</p>
                    </div>
                    @endforelse
                    {{-- END LOOP 1 --}}

                </div>
                <div class="p-4 bg-gray-50 text-center border-t border-gray-100">
                    <a href="{{ route('dosen.consultations.index') }}" class="text-sm text-emerald-600 font-medium hover:underline">Lihat Semua Riwayat</a>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-6">

            <div class="bg-gradient-to-b from-emerald-700 to-emerald-900 rounded-xl text-white shadow-lg p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                <h3 class="font-bold text-lg mb-4 border-b border-emerald-600 pb-2">Agenda Hari Ini</h3>

                <ul class="space-y-4">
                    {{-- LOOP 2: Menggunakan variabel $schedule --}}
                    {{-- Pastikan TIDAK ADA variabel $req di dalam blok ini --}}

                    @forelse($todaysSchedule as $schedule)
                    <li class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-16 text-center">
                            <div class="text-sm font-bold text-emerald-200">{{ $schedule->consultation_date->format('H:i') }}</div>
                            <div class="text-xs opacity-75">WIB</div>
                        </div>
                        <div class="border-l-2 border-emerald-400 pl-3">
                            <h4 class="font-bold text-sm">{{ $schedule->student->name }}</h4>
                            <p class="text-xs text-emerald-100 truncate">{{ $schedule->topic }}</p>
                            <span class="inline-block mt-1 px-2 py-0.5 rounded bg-emerald-800 text-xs text-emerald-200">
                                {{ ucfirst($schedule->mode) }}
                            </span>
                        </div>
                    </li>
                    @empty
                    <li class="text-center py-4 opacity-75 text-sm">
                        Tidak ada jadwal bimbingan hari ini.
                    </li>
                    @endforelse
                    {{-- END LOOP 2 --}}

                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
