<x-app-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Jadwal Konsultasi</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Mahasiswa</th>
                        <th class="px-6 py-3">Topik</th>
                        <th class="px-6 py-3">Waktu</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($consultations as $item)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $item->student->name }}
                            <div class="text-xs text-gray-500">{{ $item->student->identity_number }}</div>
                        </td>
                        <td class="px-6 py-4">{{ Str::limit($item->topic, 30) }}</td>
                        <td class="px-6 py-4">
                            {{ $item->consultation_date->format('d M Y') }}<br>
                            <span class="text-xs">{{ $item->consultation_date->format('H:i') }} WIB</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($item->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded">Perlu Review</span>
                            @elseif($item->status == 'approved')
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded">Disetujui</span>
                            @elseif($item->status == 'completed')
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-1 rounded">Selesai</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('dosen.consultations.show', $item->id) }}" class="text-emerald-600 hover:text-emerald-900 font-medium">Buka</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada data konsultasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $consultations->links() }}
        </div>
    </div>
</x-app-layout>
