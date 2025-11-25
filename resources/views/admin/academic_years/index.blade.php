<x-app-layout>
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tahun Akademik</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-lg mb-4">Set Semester Baru</h3>
                <form action="{{ route('admin.academic.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Semester</label>
                        <input type="text" name="name" placeholder="Cth: Ganjil 2024/2025" class="w-full border-gray-300 rounded-lg focus:ring-slate-500 focus:border-slate-500" required>
                    </div>
                    <button type="submit" class="w-full bg-slate-800 text-white py-2 rounded-lg hover:bg-slate-700 font-bold">Tambahkan</button>
                </form>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <table class="w-full text-sm text-left">
                    <thead class="bg-slate-50 text-slate-700 uppercase font-bold text-xs">
                        <tr>
                            <th class="px-6 py-3">Semester</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($years as $item)
                        <tr class="hover:bg-gray-50 {{ $item->is_active ? 'bg-green-50' : '' }}">
                            <td class="px-6 py-4 font-medium">{{ $item->name }}</td>
                            <td class="px-6 py-4">
                                @if($item->is_active)
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-bold">AKTIF</span>
                                @else
                                    <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">Arsip</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center flex justify-center gap-2">
                                @if(!$item->is_active)
                                    <form action="{{ route('admin.academic.active', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="text-blue-600 hover:text-blue-800 font-medium text-xs border border-blue-200 px-2 py-1 rounded hover:bg-blue-50">Set Aktif</button>
                                    </form>
                                    <form action="{{ route('admin.academic.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium text-xs border border-red-200 px-2 py-1 rounded hover:bg-red-50">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-400">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
