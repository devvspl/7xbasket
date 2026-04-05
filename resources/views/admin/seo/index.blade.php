@extends('layouts.admin')
@section('title', 'SEO Manager')

@section('content')

<h2 class="text-xl font-bold text-gray-900 mb-6">SEO Manager</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
    @foreach($pages as $page)
    @php $meta = $metas[$page] ?? null; @endphp
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-semibold text-gray-900 capitalize">{{ $page }}</h3>
            <span class="text-xs {{ $meta ? 'text-green-600 bg-green-50' : 'text-gray-400 bg-gray-100' }} px-2.5 py-1 rounded-full font-medium">
                {{ $meta ? 'Configured' : 'Default' }}
            </span>
        </div>
        @if($meta)
        <p class="text-xs text-gray-500 line-clamp-2 mb-4">{{ $meta->title }}</p>
        @else
        <p class="text-xs text-gray-400 mb-4">Using default SEO settings</p>
        @endif
        <a href="{{ route('admin.seo.edit', $page) }}" class="text-sm text-green-600 font-medium hover:underline">
            {{ $meta ? 'Edit SEO' : 'Configure SEO' }} →
        </a>
    </div>
    @endforeach
</div>

@endsection
