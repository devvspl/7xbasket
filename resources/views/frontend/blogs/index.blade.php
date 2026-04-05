@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-br from-green-50 to-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Blog & Insights</h1>
            <p class="text-gray-500">Franchise tips, business insights and 7x Basket updates</p>
        </div>

        @if($blogs->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @foreach($blogs as $blog)
            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                @if($blog->featured_image)
                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover" loading="lazy">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center">
                    <span class="text-5xl">🛒</span>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        @if($blog->category)
                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-full">{{ $blog->category }}</span>
                        @endif
                        <span class="text-xs text-gray-400">{{ $blog->published_at?->format('M d, Y') }}</span>
                    </div>
                    <h2 class="font-bold text-gray-900 mb-2 line-clamp-2 text-lg leading-snug">{{ $blog->title }}</h2>
                    <p class="text-sm text-gray-500 line-clamp-3 mb-4 leading-relaxed">{{ $blog->excerpt }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-400">By {{ $blog->author }}</span>
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="text-green-600 text-sm font-medium hover:underline">Read more →</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{ $blogs->links() }}
        @else
        <div class="text-center py-20 text-gray-400">
            <div class="text-5xl mb-4">📝</div>
            <p>No blogs published yet. Check back soon!</p>
        </div>
        @endif
    </div>
</section>

@endsection

