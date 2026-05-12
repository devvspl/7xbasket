@extends('layouts.admin')

@section('title', 'Redirect Manager')
@section('subtitle', 'Manage 301/302 URL redirects')

@section('content')
<div class="space-y-5">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-lg font-semibold text-gray-900">Redirects</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $redirects->total() }} redirect{{ $redirects->total() !== 1 ? 's' : '' }} total</p>
        </div>
        <a href="{{ route('admin.redirects.create') }}"
           class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-xl transition-colors shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Redirect
        </a>
    </div>

    {{-- Filters --}}
    <form method="GET" action="{{ route('admin.redirects.index') }}"
          class="flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search from / to path…"
               class="flex-1 border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/30 focus:border-green-400">
        <select name="status"
                class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/30 focus:border-green-400">
            <option value="">All statuses</option>
            <option value="active"   {{ request('status') === 'active'   ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        <button type="submit"
                class="bg-slate-800 hover:bg-slate-700 text-white text-sm font-medium px-4 py-2 rounded-xl transition-colors">
            Filter
        </button>
        @if(request()->hasAny(['search','status']))
        <a href="{{ route('admin.redirects.index') }}"
           class="text-sm text-gray-500 hover:text-gray-700 px-3 py-2 rounded-xl border border-gray-200 hover:bg-gray-50 transition-colors">
            Clear
        </a>
        @endif
    </form>

    {{-- Table --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        @if($redirects->isEmpty())
        <div class="py-16 text-center text-gray-400">
            <svg class="w-10 h-10 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
            </svg>
            <p class="text-sm font-medium">No redirects found</p>
            <p class="text-xs mt-1">Add your first redirect to get started.</p>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/60">
                        <th class="text-left px-5 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wide">From Path</th>
                        <th class="text-left px-5 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wide">To Path</th>
                        <th class="text-center px-4 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wide">Code</th>
                        <th class="text-center px-4 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wide">Status</th>
                        <th class="text-right px-5 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wide">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($redirects as $redirect)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-5 py-3.5">
                            <code class="text-xs bg-slate-100 text-slate-700 px-2 py-0.5 rounded-md font-mono">{{ $redirect->from_path }}</code>
                        </td>
                        <td class="px-5 py-3.5">
                            <code class="text-xs bg-green-50 text-green-700 px-2 py-0.5 rounded-md font-mono">{{ $redirect->to_path }}</code>
                        </td>
                        <td class="px-4 py-3.5 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                                {{ $redirect->status_code === 301 ? 'bg-blue-50 text-blue-700' : 'bg-amber-50 text-amber-700' }}">
                                {{ $redirect->status_code }}
                            </span>
                        </td>
                        <td class="px-4 py-3.5 text-center">
                            <form method="POST" action="{{ route('admin.redirects.toggle', $redirect) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold transition-colors
                                            {{ $redirect->is_active
                                                ? 'bg-green-50 text-green-700 hover:bg-green-100'
                                                : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $redirect->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                    {{ $redirect->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-5 py-3.5">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.redirects.edit', $redirect) }}"
                                   class="text-xs font-medium text-gray-600 hover:text-green-600 bg-gray-50 hover:bg-green-50 border border-gray-200 hover:border-green-300 px-3 py-1.5 rounded-lg transition-all">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.redirects.destroy', $redirect) }}"
                                      onsubmit="return confirm('Delete this redirect?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-xs font-medium text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 border border-red-100 hover:border-red-200 px-3 py-1.5 rounded-lg transition-all">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($redirects->hasPages())
        <div class="px-5 py-4 border-t border-gray-100">
            {{ $redirects->links() }}
        </div>
        @endif
        @endif
    </div>

</div>
@endsection
