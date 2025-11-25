<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Pengaturan Ketersediaan</h1>
                <p class="text-gray-500">Atur hari dan jam kerja Anda agar mahasiswa tahu kapan bisa bimbingan.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-emerald-700 px-6 py-4 text-white">
                <h3 class="font-bold text-lg">Jadwal Bimbingan Mingguan</h3>
            </div>

            <form action="{{ route('dosen.schedules.update') }}" method="POST" class="p-6">
                @csrf

                <div class="space-y-4">
                    @foreach($days as $day)
                        @php
                            $schedule = $schedules[$day] ?? null;
                            $isActive = $schedule ? true : false;
                            $startTime = $schedule ? \Carbon\Carbon::parse($schedule->start_time)->format('H:i') : '09:00';
                            $endTime = $schedule ? \Carbon\Carbon::parse($schedule->end_time)->format('H:i') : '16:00';
                        @endphp

                        <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 {{ $isActive ? 'border-emerald-200 bg-emerald-50' : 'border-gray-200' }}">
                            <div class="flex items-center w-1/4">
                                <input type="checkbox" name="active_{{ $day }}" id="check_{{ $day }}"
                                       class="w-5 h-5 text-emerald-600 rounded border-gray-300 focus:ring-emerald-500"
                                       {{ $isActive ? 'checked' : '' }}
                                       onchange="document.getElementById('time_{{ $day }}').classList.toggle('opacity-50')">
                                <label for="check_{{ $day }}" class="ml-3 font-bold text-gray-700">{{ $day }}</label>
                            </div>

                            <div id="time_{{ $day }}" class="flex items-center gap-4 w-3/4 {{ !$isActive ? 'opacity-50' : '' }}">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-gray-500 uppercase">Mulai</span>
                                    <input type="time" name="start_{{ $day }}" value="{{ $startTime }}" class="border-gray-300 rounded-md text-sm focus:ring-emerald-500 focus:border-emerald-500">
                                </div>
                                <span class="text-gray-400 font-bold">-</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-gray-500 uppercase">Selesai</span>
                                    <input type="time" name="end_{{ $day }}" value="{{ $endTime }}" class="border-gray-300 rounded-md text-sm focus:ring-emerald-500 focus:border-emerald-500">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-emerald-700 shadow-md transition transform hover:scale-105">
                        Simpan Perubahan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
