<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-indigo-600 flex items-center gap-2">
                &larr; Batal & Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-slate-800 px-6 py-4 flex justify-between items-center">
                <h2 class="text-xl font-bold text-white">Edit Pengguna</h2>
                <span class="text-xs text-slate-400">ID: {{ $user->id }}</span>
            </div>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email Login</label>
                        <input type="email" name="email" value="{{ $user->email }}" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Reset Password</label>
                        <input type="text" name="password" placeholder="Kosongkan jika tidak diubah" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Role / Peran</label>
                        <select name="role" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Induk (NIM/NIP)</label>
                        <input type="text" name="identity_number" value="{{ $user->identity_number }}" required class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Program Studi</label>
                        <input type="text" name="prodi" value="{{ $user->prodi }}" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="col-span-2">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-indigo-600 rounded">
                            <span class="text-gray-700 font-bold">Akun Aktif (Bisa Login)</span>
                        </label>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-indigo-700 shadow">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
