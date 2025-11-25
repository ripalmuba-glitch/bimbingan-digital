<x-app-layout>
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Pengguna</h1>
        <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition shadow">
            + Tambah User Baru
        </a>
    </div>

    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-6">
        <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col md:flex-row gap-4">
            <input type="text" name="search" placeholder="Cari Nama / Email / NIP..." value="{{ request('search') }}" class="flex-1 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">

            <select name="role" class="border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Semua Role</option>
                <option value="dosen" {{ request('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="mahasiswa" {{ request('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>

            <button type="submit" class="bg-slate-800 text-white px-6 py-2 rounded-lg hover:bg-slate-700">Filter</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Nama Lengkap</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">ID (NIP/NIM)</th>
                        <th class="px-6 py-3">Prodi</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-6 py-4 flex items-center">
                            <div class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600 mr-3">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">{{ $user->name }}</div>
                                <div class="text-xs text-gray-400">{{ $user->email }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($user->role == 'admin')
                                <span class="bg-gray-100 text-gray-800 text-xs font-bold px-2 py-1 rounded">Admin</span>
                            @elseif($user->role == 'dosen')
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-2 py-1 rounded">Dosen</span>
                            @else
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded">Mahasiswa</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-mono">{{ $user->identity_number ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $user->prodi ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if($user->is_active)
                                <span class="text-green-600 font-bold text-xs">● Aktif</span>
                            @else
                                <span class="text-red-500 font-bold text-xs">● Non-Aktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user ini? Data konsultasi terkait akan ikut terhapus!');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
