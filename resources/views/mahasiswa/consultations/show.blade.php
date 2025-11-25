<x-app-layout>
    <div class="max-w-6xl mx-auto h-[calc(100vh-140px)] flex flex-col">
        <div class="flex-none mb-4 flex justify-between items-center">
            <a href="{{ route('mahasiswa.consultations.index') }}" class="text-gray-600 hover:text-blue-600 flex items-center gap-2 font-medium">
                &larr; Kembali
            </a>
            <div class="text-right">
                <h2 class="text-lg font-bold text-gray-800">{{ $consultation->topic }}</h2>
                <p class="text-xs text-gray-500">Dosen: {{ $consultation->lecturer->name }}</p>
            </div>
        </div>

        <div class="flex-1 grid grid-cols-1 lg:grid-cols-3 gap-6 overflow-hidden">

            <div class="hidden lg:block lg:col-span-1 bg-white rounded-xl shadow-sm border border-gray-200 overflow-y-auto p-6">
                <h3 class="font-bold text-gray-800 border-b pb-2 mb-4">Detail Pengajuan</h3>

                <div class="space-y-4 text-sm">
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-bold">Status</label>
                        <div class="mt-1">
                            @if($consultation->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-bold">Menunggu</span>
                            @elseif($consultation->status == 'approved')
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-bold">Disetujui</span>
                            @elseif($consultation->status == 'rejected')
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full font-bold">Ditolak</span>
                            @elseif($consultation->status == 'completed')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold">Selesai</span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 uppercase font-bold">Waktu & Mode</label>
                        <p class="font-medium">{{ $consultation->consultation_date->format('d M Y, H:i') }}</p>
                        <p class="text-gray-500 capitalize">{{ str_replace('_', ' ', $consultation->mode) }}</p>
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 uppercase font-bold">Deskripsi Awal</label>
                        <p class="text-gray-700 bg-gray-50 p-3 rounded border mt-1">
                            {{ $consultation->description }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg border border-gray-200 flex flex-col overflow-hidden">

                <div class="flex-none p-4 border-b bg-gray-50 flex justify-between items-center">
                    <span class="font-bold text-gray-700">Ruang Diskusi & Revisi</span>
                    @if($consultation->status != 'approved')
                        <span class="text-xs text-red-500 bg-red-50 px-2 py-1 rounded border border-red-200">
                            Chat terkunci (Status: {{ ucfirst($consultation->status) }})
                        </span>
                    @else
                         <span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded border border-green-200 flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span> Sesi Aktif
                        </span>
                    @endif
                </div>

                <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-100" id="chatContainer">

                    <div class="flex justify-center">
                        <span class="text-xs text-gray-400 bg-gray-200 px-3 py-1 rounded-full">
                            Sesi konsultasi dibuat pada {{ $consultation->created_at->format('d M Y') }}
                        </span>
                    </div>

                    @php
                        // Ambil detail chat (relasi harus didefinisikan di Model, tapi kita pakai query manual dulu biar cepat)
                        $chats = \App\Models\ConsultationDetail::where('consultation_id', $consultation->id)->orderBy('created_at', 'asc')->get();
                    @endphp

                    @foreach($chats as $chat)
                        @if($chat->sender_id == Auth::id())
                            <div class="flex justify-end">
                                <div class="max-w-[80%]">
                                    <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-tr-lg shadow-sm">
                                        @if($chat->message)
                                            <p class="text-sm">{{ $chat->message }}</p>
                                        @endif

                                        @if($chat->attachment)
                                            <div class="mt-2 bg-blue-700 rounded p-2 flex items-center gap-2">
                                                <svg class="w-6 h-6 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                                <a href="{{ Storage::url($chat->attachment) }}" target="_blank" class="text-xs text-blue-100 underline truncate hover:text-white">Unduh Lampiran</a>
                                            </div>
                                        @endif
                                    </div>
                                    <span class="text-[10px] text-gray-500 mt-1 block text-right">{{ $chat->created_at->format('H:i') }}</span>
                                </div>
                            </div>
                        @else
                            <div class="flex justify-start">
                                <div class="flex items-end gap-2 max-w-[80%]">
                                    <div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-[10px] font-bold text-gray-600 mb-4">
                                        D
                                    </div>
                                    <div>
                                        <div class="bg-white text-gray-800 p-3 rounded-r-lg rounded-tl-lg shadow-sm border border-gray-200">
                                            @if($chat->message)
                                                <p class="text-sm">{{ $chat->message }}</p>
                                            @endif

                                            @if($chat->attachment)
                                                 <div class="mt-2 bg-gray-50 rounded p-2 flex items-center gap-2 border border-gray-200">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                                    <a href="{{ Storage::url($chat->attachment) }}" target="_blank" class="text-xs text-blue-600 underline truncate">Lihat File</a>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="text-[10px] text-gray-500 mt-1 block">{{ $chat->created_at->format('H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

                <div class="flex-none p-4 bg-white border-t">
                    @if($consultation->status == 'approved')
                        <form action="{{ route('consultation.reply', $consultation->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                            @csrf
                            <textarea name="message" rows="2" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm resize-none" placeholder="Tulis pesan atau catatan revisi..."></textarea>

                            <div class="flex justify-between items-center">
                                <input type="file" name="attachment" class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">

                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition flex items-center gap-2">
                                    <span>Kirim</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="text-center p-4 bg-gray-50 text-gray-500 text-sm rounded-lg border border-dashed">
                            Kolom komentar terkunci karena sesi ini belum disetujui atau sudah selesai.
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script>
        const chatContainer = document.getElementById('chatContainer');
        chatContainer.scrollTop = chatContainer.scrollHeight;
    </script>
</x-app-layout>
