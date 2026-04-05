@extends('layouts.admin')
@section('title', 'Dashboard')
@section('subtitle', 'Here\'s what\'s happening today')

@section('content')

{{-- ── Stat Cards ── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Visitors</p>
            <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-900">{{ number_format($totalVisitors) }}</p>
        <p class="text-xs text-gray-400 mt-1">All time page views</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Inquiries</p>
            <div class="w-9 h-9 rounded-xl bg-green-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-900">{{ number_format($totalInquiries) }}</p>
        <p class="text-xs text-gray-400 mt-1">Franchise applications</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pending</p>
            <div class="w-9 h-9 rounded-xl bg-amber-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-900">{{ number_format($pendingInquiries) }}</p>
        <p class="text-xs text-gray-400 mt-1">Awaiting review</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Blogs</p>
            <div class="w-9 h-9 rounded-xl bg-purple-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-900">{{ number_format($totalBlogs) }}</p>
        <p class="text-xs text-gray-400 mt-1">Published articles</p>
    </div>

</div>

{{-- ── Charts Row ── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">

    <div class="stat-card">
        <div class="flex items-center justify-between mb-5">
            <div>
                <p class="font-semibold text-gray-900 text-sm">Monthly Visitors</p>
                <p class="text-xs text-gray-400 mt-0.5">Last 6 months</p>
            </div>
            <span class="text-xs bg-blue-50 text-blue-600 font-semibold px-2.5 py-1 rounded-full">Trend</span>
        </div>
        <canvas id="visitorsChart" height="130"></canvas>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-5">
            <div>
                <p class="font-semibold text-gray-900 text-sm">Monthly Inquiries</p>
                <p class="text-xs text-gray-400 mt-0.5">Last 6 months</p>
            </div>
            <span class="text-xs bg-green-50 text-green-600 font-semibold px-2.5 py-1 rounded-full">Applications</span>
        </div>
        <canvas id="inquiriesChart" height="130"></canvas>
    </div>

</div>

{{-- ── Bottom Row ── --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

    {{-- Top Pages --}}
    <div class="lg:col-span-2 stat-card">
        <div class="flex items-center justify-between mb-5">
            <p class="font-semibold text-gray-900 text-sm">Top Pages</p>
            <a href="{{ route('admin.visitors.index') }}" class="text-xs text-green-600 hover:underline font-medium">View all →</a>
        </div>
        <div class="space-y-3">
            @forelse($topPages as $page)
            @php $pct = $topPages->first()->visits > 0 ? round(($page->visits / $topPages->first()->visits) * 100) : 0; @endphp
            <div>
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm text-gray-600 truncate max-w-xs font-mono text-xs">/{{ $page->page ?: '(home)' }}</span>
                    <span class="text-sm font-semibold text-gray-900 ml-4 flex-shrink-0">{{ number_format($page->visits) }}</span>
                </div>
                <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-green-500 rounded-full" style="width: {{ $pct }}%"></div>
                </div>
            </div>
            @empty
            <p class="text-sm text-gray-400 py-4 text-center">No page data yet</p>
            @endforelse
        </div>
    </div>

    {{-- Device Breakdown --}}
    <div class="stat-card">
        <div class="flex items-center justify-between mb-5">
            <p class="font-semibold text-gray-900 text-sm">Devices</p>
        </div>
        @if($devices->count())
        <canvas id="devicesChart" height="180"></canvas>
        <div class="mt-4 space-y-2">
            @foreach($devices as $d)
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-500">{{ $d->device ?: 'Unknown' }}</span>
                <span class="font-semibold text-gray-800">{{ $d->total }}</span>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-sm text-gray-400 py-8 text-center">No data yet</p>
        @endif
    </div>

</div>

{{-- ── Quick Actions ── --}}
<div class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-3">
    @foreach([
        [route('admin.blogs.create'),        'New Blog Post',      'bg-green-600',  'text-white'],
        [route('admin.applications.index'),  'View Applications',  'bg-white',      'text-gray-700 border border-gray-200'],
        [route('admin.seo.index'),           'Manage SEO',         'bg-white',      'text-gray-700 border border-gray-200'],
        [route('admin.blocked-ips.index'),   'Blocked IPs',        'bg-white',      'text-gray-700 border border-gray-200'],
    ] as [$url, $label, $bg, $text])
    <a href="{{ $url }}"
       class="flex items-center justify-center gap-2 {{ $bg }} {{ $text }} text-sm font-semibold px-4 py-3 rounded-xl hover:opacity-90 transition-opacity shadow-sm">
        {{ $label }}
    </a>
    @endforeach
</div>

<script>
const monthlyVisits    = @json($monthlyVisits);
const monthlyInquiries = @json($monthlyInquiries);
const devices          = @json($devices);

const chartDefaults = {
    plugins: { legend: { display: false } },
    scales: {
        y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { font: { size: 11 }, color: '#94a3b8' } },
        x: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#94a3b8' } }
    }
};

new Chart(document.getElementById('visitorsChart'), {
    type: 'line',
    data: {
        labels: monthlyVisits.map(d => d.month),
        datasets: [{
            data: monthlyVisits.map(d => d.total),
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.07)',
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#3b82f6',
            pointRadius: 4,
            borderWidth: 2,
        }]
    },
    options: chartDefaults
});

new Chart(document.getElementById('inquiriesChart'), {
    type: 'bar',
    data: {
        labels: monthlyInquiries.map(d => d.month),
        datasets: [{
            data: monthlyInquiries.map(d => d.total),
            backgroundColor: '#16a34a',
            borderRadius: 6,
            borderSkipped: false,
        }]
    },
    options: chartDefaults
});

@if($devices->count())
new Chart(document.getElementById('devicesChart'), {
    type: 'doughnut',
    data: {
        labels: devices.map(d => d.device || 'Unknown'),
        datasets: [{
            data: devices.map(d => d.total),
            backgroundColor: ['#16a34a', '#22c55e', '#86efac', '#d1fae5'],
            borderWidth: 0,
            hoverOffset: 4,
        }]
    },
    options: {
        cutout: '70%',
        plugins: { legend: { display: false } }
    }
});
@endif
</script>

@endsection
