<x-app-layout>
    <div class="max-w-4xl mx-auto space-y-6">
        <h1 class="text-2xl font-bold text-gray-800">Pengaturan Akun</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b">Informasi Dasar</h3>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full bg-gray-200 overflow-hidden border">
                            @if(Auth::user()->avatar)
                                <img src="{{ Storage::url('avatars/' . Auth::user()->avatar) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-500 font-bold text-xl">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ganti Foto</label>
                            <input type="file" name="avatar" class="text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIM / NIP (Read Only)</label>
                        <input type="text" value="{{ $user->identity_number }}" disabled class="mt-1 w-full border-gray-200 bg-gray-50 rounded-lg text-gray-500">
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-700">Simpan Profil</button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b">Ganti Password</h3>

                <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <input type="password" name="current_password" required class="mt-1 w-full border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        @error('current_password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password" required class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-red-700">Update Password</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
