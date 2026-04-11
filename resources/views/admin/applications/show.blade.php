@extends('layouts.admin')
@section('title', 'Application #' . $application->id)

@section('content')

<div class="flex flex-col xl:flex-row gap-5">

    {{-- ── LEFT: Details ── --}}
    <div class="flex-1 min-w-0 space-y-4">

        {{-- Header row --}}
        <div class="stat-card flex items-center justify-between gap-4 flex-wrap">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.applications.index') }}" class="text-gray-400 hover:text-gray-600 text-sm">← Back</a>
                <h2 class="text-lg font-bold text-gray-900">Application #{{ $application->id }}</h2>
                @if($application->is_spam)
                    <span class="text-xs bg-red-100 text-red-600 font-bold px-2.5 py-1 rounded-full">SPAM</span>
                @endif
                <span class="text-xs px-2.5 py-1 rounded-full font-semibold {{ $application->source === 'popup' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                    {{ ucfirst($application->source ?? 'website') }}
                </span>
            </div>
            @php $colors = ['pending'=>'yellow','reviewed'=>'blue','approved'=>'green','rejected'=>'red']; $c = $colors[$application->status] ?? 'gray'; @endphp
            <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-{{ $c }}-100 text-{{ $c }}-700">
                {{ ucfirst($application->status) }}
            </span>
        </div>

        {{-- Contact Details --}}
        <div class="stat-card">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Contact Details</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach([
                    ['Full Name',   $application->name,       'person'],
                    ['Phone',       $application->phone,      'phone'],
                    ['Email',       $application->email,      'email'],
                    ['IP Address',  $application->ip_address, 'ip'],
                ] as [$label, $value, $type])
                <div class="bg-gray-50 rounded-xl p-3.5 border border-gray-100">
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-1">{{ $label }}</p>
                    <p class="text-sm font-semibold text-gray-900">{{ $value ?? '—' }}</p>
                </div>
                @endforeach
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                <div class="bg-gray-50 rounded-xl p-3.5 border border-gray-100">
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-1">Submitted</p>
                    <p class="text-sm font-semibold text-gray-900">{{ $application->created_at->format('M d, Y') }}</p>
                    <p class="text-xs text-gray-400">{{ $application->created_at->format('h:i A') }}</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-3.5 border border-gray-100">
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-1">Submissions from IP</p>
                    <p class="text-sm font-semibold {{ $application->submission_count >= 3 ? 'text-red-600' : 'text-gray-900' }}">
                        {{ $application->submission_count }} time(s)
                    </p>
                </div>
            </div>
        </div>

        {{-- Franchise Details --}}
        <div class="stat-card">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Franchise Details</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach([
                    ['Pincode',           $application->pincode],
                    ['Store Area',        $application->store_area],
                    ['Property Type',     $application->property_type ? ucfirst(str_replace('_', ' ', $application->property_type)) : null],
                    ['Opening Timeline',  $application->opening_timeline ? ucfirst(str_replace('_', ' ', $application->opening_timeline)) : null],
                    ['City',              $application->city],
                    ['Investment Budget', $application->investment_budget],
                ] as [$label, $value])
                <div class="bg-gray-50 rounded-xl p-3.5 border border-gray-100">
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-1">{{ $label }}</p>
                    <p class="text-sm font-semibold text-gray-900">{{ $value ?? '—' }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Message --}}
        @if($application->message)
        <div class="stat-card">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Message</p>
            <p class="text-sm text-gray-700 leading-relaxed bg-gray-50 rounded-xl p-4 border border-gray-100">{{ $application->message }}</p>
        </div>
        @endif

    </div>

    {{-- ── RIGHT: Sidebar ── --}}
    <div class="w-full xl:w-72 space-y-4 flex-shrink-0">

        {{-- Update Status --}}
        <div class="stat-card">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Update Status</p>
            <form action="{{ route('admin.applications.status', $application) }}" method="POST" class="space-y-3">
                @csrf @method('PATCH')
                <select name="status" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
                    @foreach(['pending','reviewed','approved','rejected'] as $s)
                    <option value="{{ $s }}" {{ $application->status == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
                <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2.5 rounded-xl hover:bg-green-700 transition-colors text-sm">
                    Update Status
                </button>
            </form>
        </div>

        {{-- Quick Info --}}
        <div class="stat-card space-y-3">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Quick Info</p>
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-500">Source</span>
                <span class="text-xs font-semibold {{ $application->source === 'popup' ? 'text-purple-600' : 'text-blue-600' }}">
                    {{ ucfirst($application->source ?? 'website') }}
                </span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-500">Spam Flag</span>
                <span class="text-xs font-semibold {{ $application->is_spam ? 'text-red-600' : 'text-green-600' }}">
                    {{ $application->is_spam ? 'Yes' : 'No' }}
                </span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-xs text-gray-500">IP Submissions</span>
                <span class="text-xs font-semibold text-gray-700">{{ $application->submission_count }}</span>
            </div>
            <div class="flex justify-between items-center py-2">
                <span class="text-xs text-gray-500">Submitted</span>
                <span class="text-xs font-semibold text-gray-700">{{ $application->created_at->diffForHumans() }}</span>
            </div>
        </div>

        {{-- Danger Zone --}}
        <div class="stat-card">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Danger Zone</p>
            <form action="{{ route('admin.applications.destroy', $application) }}" method="POST"
                  onsubmit="return confirm('Delete this application permanently?')">
                @csrf @method('DELETE')
                <button type="submit"
                    class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-2.5 rounded-xl transition-colors text-sm border border-red-100">
                    Delete Application
                </button>
            </form>
        </div>

    </div>
</div>

@endsection
