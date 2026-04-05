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
<form method="GET" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 mb-5 flex flex-wrap gap-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, city..."
        class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1 min-w-48">
    <select name="status" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
        <option value="">All Status</option>
        @foreach(['pending','reviewed','approved','rejected'] as $s)
        <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
        @endforeach
    </select>
    <button type="submit" class="bg-gray-800 text-white text-sm font-semibold px-5 py-2 rounded-xl hover:bg-gray-700">Filter</button>
    <a href="{{ route('admin.applications.index') }}" class="text-sm text-gray-400 hover:text-gray-600 py-2">Clear</a>
</form>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Applicant</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden md:table-cell">City</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Budget</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Status</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Date</th>
                <th class="text-right px-5 py-3.5 font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($applications as $app)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-5 py-4">
                    <div class="font-medium text-gray-900">{{ $app->name }}</div>
                    <div class="text-xs text-gray-400">{{ $app->email }}</div>
                </td>
                <td class="px-5 py-4 hidden md:table-cell text-gray-500">{{ $app->city }}</td>
                <td class="px-5 py-4 hidden lg:table-cell text-gray-500">{{ $app->investment_budget }}</td>
                <td class="px-5 py-4">
                    @php $colors = ['pending'=>'yellow','reviewed'=>'blue','approved'=>'green','rejected'=>'red']; $c = $colors[$app->status] ?? 'gray'; @endphp
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-{{ $c }}-100 text-{{ $c }}-700">
                        {{ ucfirst($app->status) }}
                    </span>
                </td>
                <td class="px-5 py-4 hidden lg:table-cell text-gray-400 text-xs">{{ $app->created_at->format('M d, Y') }}</td>
                <td class="px-5 py-4 text-right">
                    <a href="{{ route('admin.applications.show', $app) }}" class="text-xs text-blue-600 hover:underline">View</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-5 py-10 text-center text-gray-400">No applications yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($applications->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $applications->links() }}</div>
    @endif
</div>

@endsection
