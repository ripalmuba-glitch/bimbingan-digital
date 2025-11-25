<x-app-layout>
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Master Program Studi</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-lg mb-4">Tambah Prodi</h3>
                <form action="{{ route('admin.prodi.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kode Prodi</label>
                        <input type="text" name="code" placeholder="Contoh: TI" class="w-full border-gray-300 rounded-lg focus:ring-slate-500 focus:border-slate-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Prodi</label>
                        <input type="text" name="name" placeholder="Contoh: Teknik Informatika" class="w-full border-gray-300 rounded-lg focus:ring-slate-500 focus:border-slate-500" required>
                    </div>
                    <button type="submit" class="w-full bg-slate-800 text-white py-2 rounded-lg hover:bg-slate-700 font-bold">Simpan</button>
                </form>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <table class="w-full text-sm text-left">
                    <thead class="bg-slate-50 text-slate-700 uppercase font-bold text-xs">
                        <tr>
                            <th class="px-6 py-3">Kode</th>
                            <th class="px-6 py-3">Nama Program Studi</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($prodi as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold">{{ $item->code }}</td>
                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('admin.prodi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus Prodi ini?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-400">Belum ada data prodi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
