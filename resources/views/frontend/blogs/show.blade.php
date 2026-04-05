@extends('layouts.app')

@section('content')

<article class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="text-sm text-gray-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-green-600">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('blogs') }}" class="hover:text-green-600">Blog</a>
            <span class="mx-2">/</span>
            <span class="text-gray-600">{{ Str::limit($blog->title, 40) }}</span>
        </nav>

        {{-- Header --}}
        <header class="mb-8">
            @if($blog->category)
            <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">{{ $blog->category }}</span>
            @endif
            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-4 mb-4 leading-tight">{{ $blog->title }}</h1>
            <div class="flex items-center gap-4 text-sm text-gray-400">
                <span>By {{ $blog->author }}</span>
                <span>•</span>
                <span>{{ $blog->published_at?->format('F d, Y') }}</span>
            </div>
        </header>

        {{-- Featured Image --}}
        @if($blog->featured_image)
        <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}"
             class="w-full h-72 sm:h-96 object-cover rounded-2xl mb-10 shadow-sm" loading="lazy">
        @endif

        {{-- Content --}}
        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed
                    prose-headings:text-gray-900 prose-a:text-green-600 prose-strong:text-gray-900
                    prose-img:rounded-xl prose-blockquote:border-green-500 prose-blockquote:text-gray-600">
            {!! $blog->content !!}
        </div>

        {{-- Tags --}}
        @if($blog->tags)
        <div class="mt-10 pt-6 border-t border-gray-100">
            <div class="flex flex-wrap gap-2">
                @foreach($blog->tags_array as $tag)
                <span class="text-xs bg-gray-100 text-gray-600 px-3 py-1 rounded-full">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endif

        {{-- CTA --}}
        <div class="mt-12 bg-green-50 rounded-2xl p-8 text-center border border-green-100">
            <h3 class="text-xl font-bold text-gray-900 mb-2">Interested in a 7x Basket Franchise?</h3>
            <p class="text-gray-500 text-sm mb-5">Apply today and our team will reach out within 24 hours.</p>
            <a href="{{ route('apply') }}" class="inline-block bg-green-600 text-white font-semibold px-7 py-3 rounded-xl hover:bg-green-700 transition-colors">Apply Now</a>
        </div>
    </div>
</article>

{{-- Related Posts --}}
@if($related->count())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($related as $post)
            <a href="{{ route('blogs.show', $post->slug) }}" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 block">
                @if($post->featured_image)
                <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-40 object-cover" loading="lazy">
                @else
                <div class="w-full h-40 bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center">
                    <span class="text-4xl">🛒</span>
                </div>
                @endif
                <div class="p-5">
                    <h3 class="font-semibold text-gray-900 text-sm line-clamp-2">{{ $post->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection


