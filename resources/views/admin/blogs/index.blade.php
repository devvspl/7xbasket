@extends('layouts.admin')
@section('title', 'Blogs')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-gray-900">All Blogs</h2>
    <a href="{{ route('admin.blogs.create') }}" class="bg-green-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-green-700 transition-colors">
        + New Blog
    </a>
</div>

{{-- Filters --}}
<form method="GET" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 mb-5 flex flex-wrap gap-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title, category, author..."
        class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 flex-1 min-w-48">

    <select name="category" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
        <option value="">All Categories</option>
        @foreach($categories as $cat)
        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
        @endforeach
    </select>

    <select name="status" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
        <option value="">All Status</option>
        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
    </select>

    <button type="submit" class="bg-gray-800 text-white text-sm font-semibold px-5 py-2 rounded-xl hover:bg-gray-700">Filter</button>
    <a href="{{ route('admin.blogs.index') }}" class="text-sm text-gray-400 hover:text-gray-600 py-2">Clear</a>
</form>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 w-10">#</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600">Title</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden md:table-cell">Category</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Author</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Status</th>
                <th class="text-left px-5 py-3.5 font-semibold text-gray-600 hidden lg:table-cell">Date</th>
                <th class="text-right px-5 py-3.5 font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($blogs as $blog)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-5 py-4 text-xs text-gray-400">{{ $blogs->firstItem() + $loop->index }}</td>
                <td class="px-5 py-4">
                    <div class="font-medium text-gray-900 line-clamp-1">{{ $blog->title }}</div>
                    <div class="text-xs text-gray-400 mt-0.5">/blogs/{{ $blog->slug }}</div>
                </td>
                <td class="px-5 py-4 hidden md:table-cell text-gray-500">{{ $blog->category ?? '—' }}</td>
                <td class="px-5 py-4 hidden lg:table-cell text-gray-500 text-xs">{{ $blog->author ?? '—' }}</td>
                <td class="px-5 py-4 hidden lg:table-cell">
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $blog->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $blog->is_published ? 'Published' : 'Draft' }}
                    </span>
                </td>
                <td class="px-5 py-4 hidden lg:table-cell text-gray-400 text-xs">{{ $blog->created_at->format('M d, Y') }}</td>
                <td class="px-5 py-4 text-right">
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-xs text-blue-600 hover:underline">Edit</a>
                        <a href="{{ route('blogs.show', $blog->slug) }}" target="_blank" class="text-xs text-gray-400 hover:underline">View</a>
                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Delete this blog?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-5 py-10 text-center text-gray-400">No blogs found.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($blogs->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $blogs->links() }}</div>
    @endif
</div>

@endsection
