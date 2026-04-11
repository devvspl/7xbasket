@extends('layouts.app')
@section('content')

    {{-- Hero / Breadcrumb --}}
    <section class="bg-[#f0faf4] py-10 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span
                class="inline-flex items-center gap-2 bg-[#109125]/10 text-[#055346] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-[#109125]/20">
                <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                Franchise Insights & Tips
            </span>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Blog & Insights</h1>
            <p class="text-gray-500 text-base max-w-lg mx-auto">Franchise tips, business insights and 7x Basket updates.</p>
            <nav class="text-sm text-gray-400 flex items-center gap-1 flex-wrap justify-center mt-4">
                <a href="{{ route('home') }}" class="hover:text-[#109125] transition-colors">Home</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-600 font-medium">Blog</span>
            </nav>
        </div>
    </section>

    {{-- Blog Grid --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if ($blogs->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    @foreach ($blogs as $blog)
                        <a href="{{ route('blogs.show', $blog->slug) }}"
                            class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 hover:-translate-y-1 block">
                            {{-- Thumbnail --}}
                            @if ($blog->featured_image)
                                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy">
                            @else
                                <div
                                    class="w-full h-48 bg-gradient-to-br from-[#055346] to-[#109125] flex items-center justify-center">
                                    <span class="text-5xl">🛒</span>
                                </div>
                            @endif

                            {{-- Body --}}
                            <div class="p-5">
                                <div class="flex items-center gap-2 mb-3">
                                    @if ($blog->category)
                                        <span
                                            class="text-xs font-bold text-[#109125] bg-green-50 px-2.5 py-1 rounded-full">{{ $blog->category }}</span>
                                    @endif
                                    <span class="text-xs text-gray-400">{{ $blog->published_at?->format('M d, Y') }}</span>
                                </div>
                                <h2
                                    class="font-bold text-gray-900 mb-2 line-clamp-2 text-base leading-snug group-hover:text-[#109125] transition-colors">
                                    {{ $blog->title }}
                                </h2>
                                <p class="text-sm text-gray-500 line-clamp-2 mb-4 leading-relaxed">{{ $blog->excerpt }}</p>
                                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                    <span class="text-xs text-gray-400">By {{ $blog->author ?? '7x Basket Team' }}</span>
                                    <span class="text-[#109125] text-xs font-semibold group-hover:underline">Read more
                                        →</span>
                                </div>
                            </div>
                        </a>
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
