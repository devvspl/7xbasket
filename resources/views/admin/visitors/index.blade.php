@extends('layouts.admin')
@section('title', 'Visitors & Blocked IPs')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-gray-900">Visitors & Blocked IPs</h2>
</div>

{{-- Stats Row --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([
        ['Total Visits',    $totalVisitors,  'text-blue-600',  'bg-blue-50'],
        ['Today',           $todayVisitors,  'text-green-600', 'bg-green-50'],
        ['Unique IPs',      $uniqueIps,      'text-purple-600','bg-purple-50'],
        ['Blocked IPs',     $blockedCount,   'text-red-600',   'bg-red-50'],
    ] as [$label, $val, $color, $bg])
    <div class="stat-card flex items-center gap-4">
        <div class="w-10 h-10 {{ $bg }} rounded-xl flex items-center justify-center flex-shrink-0">
            <span class="{{ $color }} font-extrabold text-sm">{{ $val }}</span>
        </div>
        <div>
            <p class="text-xs text-gray-400 uppercase tracking-wider">{{ $label }}</p>
            <p class="text-xl font-extrabold text-gray-900">{{ number_format($val) }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Charts Row --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-6">
    {{-- Top Pages --}}
    <div class="stat-card lg:col-span-2">
        <h3 class="text-sm font-semibold text-gray-700 mb-4">Top Pages</h3>
        <div class="space-y-2">
            @foreach($topPages as $p)
            @php $pct = $topPages->first()->visits > 0 ? round(($p->visits / $topPages->first()->visits) * 100) : 0; @endphp
            <div class="flex items-center gap-3">
                <span class="text-xs text-gray-500 w-40 truncate">/{{ $p->page }}</span>
                <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#109125] rounded-full" style="width:{{ $pct }}%"></div>
                </div>
                <span class="text-xs font-semibold text-gray-700 w-8 text-right">{{ $p->visits }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Devices + Block Form --}}
    <div class="space-y-5">
        <div class="stat-card">
            <h3 class="text-sm font-semibold text-gray-700 mb-3">Devices</h3>
            <canvas id="devicesChart" height="160"></canvas>
        </div>
        <div class="stat-card">
            <h3 class="text-sm font-semibold text-gray-700 mb-3">Block an IP</h3>
            <form action="{{ route('admin.blocked-ips.store') }}" method="POST" class="space-y-2">
                @csrf
                <input type="text" name="ip_address" placeholder="IP Address" required
                    class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                <input type="text" name="reason" placeholder="Reason (optional)"
                    class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                <button type="submit" class="w-full bg-red-600 text-white font-semibold py-2 rounded-xl hover:bg-red-700 text-sm transition-colors">
                    Block IP
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Tabs --}}
<div x-data="{ tab: new URLSearchParams(window.location.search).get('tab') || 'visitors' }">

    <div class="flex gap-1 bg-gray-100 rounded-2xl p-1 w-fit mb-5">
        <button @click="tab = 'visitors'; window.history.pushState({}, '', '{{ route('admin.visitors.index') }}')"
            :class="tab === 'visitors' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'"
            class="px-5 py-2 rounded-xl text-sm font-semibold transition-all">
            Visitors <span class="ml-1 text-xs text-gray-400">({{ $totalVisitors }})</span>
        </button>
        <button @click="tab = 'blocked'; window.history.pushState({}, '', '{{ route('admin.visitors.index') }}?tab=blocked')"
            :class="tab === 'blocked' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'"
            class="px-5 py-2 rounded-xl text-sm font-semibold transition-all">
            Blocked IPs <span class="ml-1 text-xs text-red-400">({{ $blockedCount }})</span>
        </button>
    </div>

    {{-- ── Visitors Tab ── --}}
    <div x-show="tab === 'visitors'">
        <form method="GET" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 mb-4 flex flex-wrap gap-3">
            <input type="hidden" name="tab" value="visitors">
            <input type="text" name="ip" value="{{ request('ip') }}" placeholder="Filter by IP..."
                class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1 min-w-40">
            <input type="text" name="page_filter" value="{{ request('page_filter') }}" placeholder="Filter by page..."
                class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1 min-w-40">
            <button type="submit" class="bg-gray-800 text-white text-sm font-semibold px-5 py-2 rounded-xl hover:bg-gray-700">Filter</button>
            <a href="{{ route('admin.visitors.index') }}" class="text-sm text-gray-400 hover:text-gray-600 py-2">Clear</a>
        </form>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600">IP Address</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden md:table-cell">Page</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Device</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Browser</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600">Applied</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600">Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($visitors as $v)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-mono text-xs text-gray-700">
                            {{ $v->ip_address }}
                            @if(\App\Models\BlockedIp::isBlocked($v->ip_address))
                                <span class="ml-1 text-[10px] bg-red-100 text-red-600 font-bold px-1.5 py-0.5 rounded">BLOCKED</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell text-gray-500 text-xs">/{{ $v->page }}</td>
                        <td class="px-4 py-3 hidden lg:table-cell text-gray-500 text-xs capitalize">{{ $v->device }}</td>
                        <td class="px-4 py-3 hidden lg:table-cell text-gray-500 text-xs">{{ $v->browser }}</td>
                        <td class="px-4 py-3">
                            @if(isset($appliedIps[$v->ip_address]))
                                <span class="text-[10px] bg-green-100 text-green-700 font-bold px-2 py-0.5 rounded-full">✓ Applied</span>
                            @else
                                <span class="text-[10px] text-gray-300">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-gray-400 text-xs">{{ $v->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-5 py-10 text-center text-gray-400">No visitor data yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
            @if($visitors->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">{{ $visitors->links() }}</div>
            @endif
        </div>
    </div>

    {{-- ── Blocked IPs Tab ── --}}
    <div x-show="tab === 'blocked'">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600">IP Address</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden md:table-cell">Reason</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600">Status</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Expires</th>
                        <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Blocked On</th>
                        <th class="text-right px-4 py-3.5 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($blocked as $ip)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-mono text-xs text-gray-700">{{ $ip->ip_address }}</td>
                        <td class="px-4 py-3 hidden md:table-cell text-gray-500 text-xs">{{ $ip->reason ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $ip->is_active ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-500' }}">
                                {{ $ip->is_active ? 'Blocked' : 'Unblocked' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 hidden lg:table-cell text-gray-400 text-xs">
                            {{ $ip->expires_at ? $ip->expires_at->format('M d, Y') : 'Permanent' }}
                        </td>
                        <td class="px-4 py-3 hidden lg:table-cell text-gray-400 text-xs">{{ $ip->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3 text-right">
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
                    <tr><td colspan="6" class="px-5 py-10 text-center text-gray-400">No blocked IPs.</td></tr>
                    @endforelse
                </tbody>
            </table>
            @if($blocked->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">{{ $blocked->links() }}</div>
            @endif
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const devices = @json($devices);
new Chart(document.getElementById('devicesChart'), {
    type: 'doughnut',
    data: {
        labels: devices.map(d => d.device || 'Unknown'),
        datasets: [{ data: devices.map(d => d.total), backgroundColor: ['#109125','#055346','#4ade80','#d1fae5'] }]
    },
    options: { plugins: { legend: { position: 'bottom', labels: { font: { size: 11 } } } }, cutout: '65%' }
});
</script>

@endsection
