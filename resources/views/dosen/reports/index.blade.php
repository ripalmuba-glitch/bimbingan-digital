<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Laporan Kinerja Bimbingan</h1>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-6">
        <form method="GET" action="{{ route('dosen.reports.index') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Dari Tanggal</label>
                <input type="date" name="start_date" value="{{ $startDate }}" class="border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sampai Tanggal</label>
                <input type="date" name="end_date" value="{{ $endDate }}" class="border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-emerald-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-emerald-700">Tampilkan</button>

                <a href="{{ route('dosen.reports.print', ['start_date' => $startDate, 'end_date' => $endDate]) }}" target="_blank" class="bg-gray-800 text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-700 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Cetak Laporan
                </a>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="p-4 bg-gray-50 border-b border-gray-100 flex justify-between">
            <span class="font-bold text-gray-700">Preview Data</span>
            <span class="text-sm text-gray-500">Total: {{ count($consultations) }} Sesi Selesai</span>
        </div>
        <table class="w-full text-sm text-left">
            <thead class="bg-white text-gray-500 uppercase font-bold text-xs border-b">
                <tr>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Mahasiswa</th>
                    <th class="px-6 py-3">Topik</th>
                    <th class="px-6 py-3">Mode</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($consultations as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3">{{ $item->consultation_date->format('d M Y') }}</td>
                    <td class="px-6 py-3">{{ $item->student->name }}</td>
                    <td class="px-6 py-3">{{ Str::limit($item->topic, 40) }}</td>
                    <td class="px-6 py-3 capitalize">{{ $item->mode }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-400">Tidak ada data pada periode ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
