@extends('layouts.admin')
@section('title', 'Blocked IPs')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-gray-900">Blocked IPs</h2>
    <a href="{{ route('admin.visitors.index') }}" class="text-sm text-gray-400 hover:text-gray-600">← Visitors</a>
</div>

{{-- Add Block Form --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
    <h3 class="font-semibold text-gray-900 mb-4">Block New IP</h3>
    <form action="{{ route('admin.blocked-ips.store') }}" method="POST" class="flex flex-wrap gap-3">
        @csrf
        <input type="text" name="ip_address" placeholder="IP Address (e.g. 192.168.1.1)" required
            class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1 min-w-48">
        <input type="text" name="reason" placeholder="Reason (optional)"
            class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1 min-w-48">
        <button type="submit" class="bg-red-600 text-white font-semibold px-5 py-2.5 rounded-xl hover:bg-red-700 transition-colors text-sm">
            Block IP
        </button>
    </form>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">IP Address</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden md:table-cell">Reason</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Status</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Date</th>
                <th class="text-right px-5 py-3.5 font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($blocked as $ip)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-3 font-mono text-xs text-gray-700">{{ $ip->ip_address }}</td>
                <td class="px-5 py-3 hidden md:table-cell text-gray-500 text-xs">{{ $ip->reason ?? '—' }}</td>
                <td class="px-5 py-3">
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $ip->is_active ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $ip->is_active ? 'Blocked' : 'Unblocked' }}
                    </span>
                </td>
                <td class="px-5 py-3 hidden lg:table-cell text-gray-400 text-xs">{{ $ip->created_at->format('M d, Y') }}</td>
                <td class="px-5 py-3 text-right">
                    <div class="flex items-center justify-end gap-3">
                        @if($ip->is_active)
                        <form action="{{ route('admin.blocked-ips.unblock', $ip) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="text-xs text-green-600 hover:underline">Unblock</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.blocked-ips.destroy', $ip) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-5 py-10 text-center text-gray-400">No blocked IPs.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($blocked->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $blocked->links() }}</div>
    @endif
</div>

@endsection
