<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('mahasiswa.dashboard') }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-2 font-medium">
                &larr; Kembali ke Dashboard
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-blue-600 p-6 text-white">
                <h2 class="text-2xl font-bold">Form Pengajuan Konsultasi</h2>
                <p class="opacity-90 mt-1">Isi data di bawah ini untuk menjadwalkan bimbingan dengan dosen.</p>
            </div>

            <form action="{{ route('mahasiswa.consultations.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Dosen Pembimbing <span class="text-red-500">*</span></label>
                        <select name="lecturer_id" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach($lecturers as $dosen)
                                <option value="{{ $dosen->id }}">{{ $dosen->name }} - {{ $dosen->prodi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Topik / Judul Konsultasi <span class="text-red-500">*</span></label>
                        <input type="text" name="topic" required placeholder="Contoh: Revisi BAB 1 Latar Belakang" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Konsultasi <span class="text-red-500">*</span></label>
                        <select name="type" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="akademik">Akademik Umum</option>
                            <option value="skripsi">Bimbingan Skripsi</option>
                            <option value="ta">Tugas Akhir</option>
                            <option value="krs">Konsultasi KRS</option>
                            <option value="pribadi">Masalah Pribadi/Studi</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Rencana Tanggal & Waktu <span class="text-red-500">*</span></label>
                        <input type="datetime-local" name="consultation_date" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Metode Pertemuan <span class="text-red-500">*</span></label>
                        <select name="mode" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="online_chat">Online (Chat System)</option>
                            <option value="offline">Offline (Tatap Muka)</option>
                            <option value="video_call">Video Call (Zoom/Gmeet)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Masalah / Catatan</label>
                    <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Jelaskan secara singkat apa yang ingin dikonsultasikan..."></textarea>
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <button type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">Reset</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-bold shadow-md transition transform hover:scale-105">
                        Kirim Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
