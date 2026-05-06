@extends('layouts.admin')
@section('title', 'Franchise Applications')

@section('content')

<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <h2 class="text-xl font-bold text-gray-900">Franchise Applications</h2>
    <a href="{{ route('admin.applications.export') }}" class="bg-green-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-green-700 transition-colors">
        Export CSV
    </a>
</div>

{{-- Filters --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-5">
    {{-- Filter Header --}}
    <div class="px-5 py-4 border-b border-gray-100">
        <div class="flex items-center gap-3 flex-wrap">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                <h3 class="text-sm font-bold text-gray-700">Filters</h3>
                @if(request()->hasAny(['search', 'status', 'source', 'spam', 'date_from', 'date_to']))
                    <span class="text-xs bg-green-100 text-green-700 font-semibold px-2 py-0.5 rounded-full">Active</span>
                @endif
            </div>
            
            {{-- Active Filters Summary --}}
            <div class="flex flex-wrap items-center gap-2">
                @if(request('search'))
                    <span class="text-xs bg-blue-50 text-blue-700 font-medium px-2.5 py-1 rounded-lg border border-blue-200">
                        🔍 Search: <strong>{{ Str::limit(request('search'), 20) }}</strong>
                    </span>
                @endif
                @if(request('status'))
                    <span class="text-xs bg-purple-50 text-purple-700 font-medium px-2.5 py-1 rounded-lg border border-purple-200">
                        Status: <strong>{{ ucfirst(request('status')) }}</strong>
                    </span>
                @endif
                @if(request('source'))
                    <span class="text-xs bg-indigo-50 text-indigo-700 font-medium px-2.5 py-1 rounded-lg border border-indigo-200">
                        Source: <strong>{{ ucfirst(request('source')) }}</strong>
                    </span>
                @endif
                @if(request('spam') !== null)
                    <span class="text-xs bg-red-50 text-red-700 font-medium px-2.5 py-1 rounded-lg border border-red-200">
                        {{ request('spam') === '1' ? '🚫 Spam Only' : '✅ Not Spam' }}
                    </span>
                @endif
                @if(request('date_from') || request('date_to'))
                    <span class="text-xs bg-amber-50 text-amber-700 font-medium px-2.5 py-1 rounded-lg border border-amber-200">
                        📅 
                        @if(request('date_from') && request('date_to'))
                            {{ date('M d', strtotime(request('date_from'))) }} - {{ date('M d, Y', strtotime(request('date_to'))) }}
                        @elseif(request('date_from'))
                            From {{ date('M d, Y', strtotime(request('date_from'))) }}
                        @else
                            Until {{ date('M d, Y', strtotime(request('date_to'))) }}
                        @endif
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- Filter Form --}}
    <form method="GET" class="p-4">
        <div class="flex flex-wrap gap-3 mb-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, phone, pincode..."
                class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1 min-w-48">
            <select name="status" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
                <option value="">All Status</option>
                @foreach(['pending','reviewed','approved','rejected'] as $s)
                <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <select name="source" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
                <option value="">All Sources</option>
                <option value="popup" {{ request('source') == 'popup' ? 'selected' : '' }}>Popup</option>
                <option value="website" {{ request('source') == 'website' ? 'selected' : '' }}>Website Form</option>
            </select>
            <select name="spam" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
                <option value="">All</option>
                <option value="0" {{ request('spam') === '0' ? 'selected' : '' }}>Not Spam</option>
                <option value="1" {{ request('spam') === '1' ? 'selected' : '' }}>Spam</option>
            </select>
        </div>
        
        {{-- Date Range Filter --}}
        <div class="flex flex-wrap gap-3 items-center">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Date Range:</label>
            <input type="date" name="date_from" value="{{ request('date_from') }}" 
                class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="From Date">
            <span class="text-gray-400">to</span>
            <input type="date" name="date_to" value="{{ request('date_to') }}" 
                class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="To Date">
            <button type="submit" class="bg-gray-800 text-white text-sm font-semibold px-5 py-2 rounded-xl hover:bg-gray-700 transition-colors">
                Apply Filters
            </button>
            <a href="{{ route('admin.applications.index') }}" class="text-sm text-gray-400 hover:text-gray-600 py-2 transition-colors">
                Clear All
            </a>
        </div>
    </form>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600 w-16">Sr No.</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600">Applicant</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden md:table-cell">Phone</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Pincode</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Store Area</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden xl:table-cell">Timeline</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600">Source</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600">Status</th>
                <th class="text-left px-4 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Date</th>
                <th class="text-right px-4 py-3.5 font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($applications as $index => $app)
            <tr class="hover:bg-gray-50 transition-colors {{ $app->is_spam ? 'bg-red-50' : '' }}">
                <td class="px-4 py-3.5 text-gray-500 font-medium">
                    {{ $applications->firstItem() + $index }}
                </td>
                <td class="px-4 py-3.5">
                    <div class="font-medium text-gray-900 flex items-center gap-1.5">
                        {{ $app->name }}
                        @if($app->is_spam)
                            <span class="text-[10px] bg-red-100 text-red-600 font-bold px-1.5 py-0.5 rounded">SPAM</span>
                        @endif
                    </div>
                    <div class="text-xs text-gray-400">{{ $app->email }}</div>
                </td>
                <td class="px-4 py-3.5 hidden md:table-cell text-gray-600">{{ $app->phone }}</td>
                <td class="px-4 py-3.5 hidden lg:table-cell text-gray-500">{{ $app->pincode ?? '—' }}</td>
                <td class="px-4 py-3.5 hidden lg:table-cell text-gray-500">{{ $app->store_area ?? '—' }}</td>
                <td class="px-4 py-3.5 hidden xl:table-cell text-gray-500 text-xs">{{ $app->opening_timeline ? str_replace('_',' ',$app->opening_timeline) : '—' }}</td>
                <td class="px-4 py-3.5">
                    <span class="px-2 py-0.5 rounded-full text-[11px] font-semibold {{ $app->source === 'popup' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                        {{ ucfirst($app->source ?? 'website') }}
                    </span>
                </td>
                <td class="px-4 py-3.5">
                    @php $colors = ['pending'=>'yellow','reviewed'=>'blue','approved'=>'green','rejected'=>'red']; $c = $colors[$app->status] ?? 'gray'; @endphp
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-{{ $c }}-100 text-{{ $c }}-700">
                        {{ ucfirst($app->status) }}
                    </span>
                </td>
                <td class="px-4 py-3.5 hidden lg:table-cell text-gray-400 text-xs">{{ $app->created_at->format('M d, Y') }}</td>
                <td class="px-4 py-3.5 text-right">
                    <a href="{{ route('admin.applications.show', $app) }}" class="text-xs text-blue-600 hover:underline">View</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="10" class="px-5 py-10 text-center text-gray-400">No applications yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($applications->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $applications->links() }}</div>
    @endif
</div>

@endsection
