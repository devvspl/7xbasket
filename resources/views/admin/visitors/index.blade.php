@extends('layouts.admin')
@section('title', 'Visitor Analytics')

@section('content')

<h2 class="text-xl font-bold text-gray-900 mb-6">Visitor Analytics</h2>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    {{-- Top Pages --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <h3 class="font-semibold text-gray-900 mb-4">Top Pages</h3>
        <div class="space-y-3">
            @foreach($topPages as $page)
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-600 truncate max-w-xs">/{{ $page->page }}</span>
                <span class="font-semibold text-gray-900 ml-2">{{ $page->visits }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Devices --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <h3 class="font-semibold text-gray-900 mb-4">Devices</h3>
        <canvas id="devicesChart" height="180"></canvas>
    </div>

    {{-- Quick Block --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <h3 class="font-semibold text-gray-900 mb-4">Block an IP</h3>
        <form action="{{ route('admin.blocked-ips.store') }}" method="POST" class="space-y-3">
            @csrf
            <input type="text" name="ip_address" placeholder="IP Address" required
                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="text" name="reason" placeholder="Reason (optional)"
                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
            <button type="submit" class="w-full bg-red-600 text-white font-semibold py-2.5 rounded-xl hover:bg-red-700 transition-colors text-sm">
                Block IP
            </button>
        </form>
    </div>
</div>

{{-- Filter --}}
<form method="GET" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 mb-5 flex gap-3">
    <input type="text" name="ip" value="{{ request('ip') }}" placeholder="Filter by IP..."
        class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1">
    <button type="submit" class="bg-gray-800 text-white text-sm font-semibold px-5 py-2 rounded-xl">Filter</button>
</form>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">IP Address</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden md:table-cell">Page</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Device</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Browser</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Time</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($visitors as $v)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-3 font-mono text-xs text-gray-700">{{ $v->ip_address }}</td>
                <td class="px-5 py-3 hidden md:table-cell text-gray-500 text-xs">/{{ $v->page }}</td>
                <td class="px-5 py-3 hidden lg:table-cell text-gray-500 text-xs">{{ $v->device }}</td>
                <td class="px-5 py-3 hidden lg:table-cell text-gray-500 text-xs">{{ $v->browser }}</td>
                <td class="px-5 py-3 text-gray-400 text-xs">{{ $v->created_at->diffForHumans() }}</td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-5 py-10 text-center text-gray-400">No visitor data yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($visitors->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $visitors->links() }}</div>
    @endif
</div>

<script>
const devices = @json($devices);
new Chart(document.getElementById('devicesChart'), {
    type: 'doughnut',
    data: {
        labels: devices.map(d => d.device || 'Unknown'),
        datasets: [{ data: devices.map(d => d.total), backgroundColor: ['#16a34a','#22c55e','#86efac','#d1fae5'] }]
    },
    options: { plugins: { legend: { position: 'bottom' } } }
});
</script>

@endsection
