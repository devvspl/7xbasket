@extends('layouts.admin')
@section('title', 'Application Details')

@section('content')

<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.applications.index') }}" class="text-gray-400 hover:text-gray-600">← Back</a>
        <h2 class="text-xl font-bold text-gray-900">Application #{{ $application->id }}</h2>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-4 mb-5">
        @foreach([
            ['Name', $application->name],
            ['Email', $application->email],
            ['Phone', $application->phone],
            ['City', $application->city],
            ['Investment Budget', $application->investment_budget],
            ['IP Address', $application->ip_address],
            ['Submitted', $application->created_at->format('F d, Y h:i A')],
        ] as [$label, $value])
        <div class="flex gap-4">
            <span class="text-sm text-gray-400 w-36 flex-shrink-0">{{ $label }}</span>
            <span class="text-sm font-medium text-gray-900">{{ $value }}</span>
        </div>
        @endforeach

        @if($application->message)
        <div class="pt-3 border-t border-gray-100">
            <p class="text-sm text-gray-400 mb-1">Message</p>
            <p class="text-sm text-gray-700 leading-relaxed">{{ $application->message }}</p>
        </div>
        @endif
    </div>

    {{-- Status Update --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h3 class="font-semibold text-gray-900 mb-4">Update Status</h3>
        <form action="{{ route('admin.applications.status', $application) }}" method="POST" class="flex gap-3">
            @csrf @method('PATCH')
            <select name="status" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white flex-1">
                @foreach(['pending','reviewed','approved','rejected'] as $s)
                <option value="{{ $s }}" {{ $application->status == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-green-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-green-700 transition-colors text-sm">
                Update
            </button>
        </form>

        <form action="{{ route('admin.applications.destroy', $application) }}" method="POST" class="mt-4" onsubmit="return confirm('Delete this application?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-sm text-red-500 hover:underline">Delete Application</button>
        </form>
    </div>
</div>

@endsection
