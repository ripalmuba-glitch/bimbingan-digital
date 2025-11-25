<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Audit Log Sistem</h1>
        <span class="text-sm text-gray-500">Rekam jejak aktivitas pengguna</span>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-800 text-white uppercase font-bold text-xs">
                    <tr>
                        <th class="px-6 py-3">Waktu</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Modul</th>
                        <th class="px-6 py-3">Aksi</th>
                        <th class="px-6 py-3">Deskripsi</th>
                        <th class="px-6 py-3">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($logs as $log)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 text-gray-500 whitespace-nowrap">
                            {{ $log->created_at->format('d M Y H:i:s') }}
                        </td>
                        <td class="px-6 py-3 font-medium">
                            {{ $log->user->name ?? 'System/Deleted' }}
                            <div class="text-xs text-gray-400">{{ $log->user->role ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-3">
                            <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded text-xs border">{{ $log->module }}</span>
                        </td>
                        <td class="px-6 py-3">
                            @if($log->action == 'CREATE')
                                <span class="text-green-600 font-bold text-xs">CREATE</span>
                            @elseif($log->action == 'UPDATE')
                                <span class="text-blue-600 font-bold text-xs">UPDATE</span>
                            @elseif($log->action == 'DELETE')
                                <span class="text-red-600 font-bold text-xs">DELETE</span>
                            @else
                                <span class="text-gray-600 font-bold text-xs">{{ $log->action }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-600 max-w-xs truncate" title="{{ $log->description }}">
                            {{ $log->description }}
                        </td>
                        <td class="px-6 py-3 text-gray-400 text-xs font-mono">
                            {{ $log->ip_address }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada aktivitas tercatat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 bg-gray-50">
            {{ $logs->links() }}
        </div>
    </div>
</x-app-layout>
