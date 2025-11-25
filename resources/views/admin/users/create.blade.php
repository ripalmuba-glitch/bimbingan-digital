<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-indigo-600 flex items-center gap-2">
                &larr; Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-slate-800 px-6 py-4">
                <h2 class="text-xl font-bold text-white">Tambah Pengguna Baru</h2>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email Login</label>
                        <input type="email" name="email" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Password Awal</label>
                        <input type="text" name="password" value="password123" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50">
                        <p class="text-xs text-gray-500 mt-1">Default: password123</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Role / Peran</label>
                        <select name="role" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Induk (NIM/NIP)</label>
                        <input type="text" name="identity_number" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Program Studi (Opsional)</label>
                        <input type="text" name="prodi" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-indigo-700 shadow">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
