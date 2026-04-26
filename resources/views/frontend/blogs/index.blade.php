@extends('layouts.app')
@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] py-10 text-center">
    <div class="absolute blob w-72 h-72 bg-[#109125]/20 top-[-60px] left-[-60px]"></div>
    <div class="absolute blob w-56 h-56 bg-[#ec2024]/10 bottom-[-40px] right-[5%]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-flex items-center gap-2 bg-white/10 text-green-200 text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-white/20">
            <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
            Franchise Insights & Tips
        </span>
        <h1 class="text-4xl font-extrabold text-white mb-3">Blog & Insights</h1>
        <p class="text-green-100/80 text-base max-w-lg mx-auto">Franchise tips, business insights and 7x Basket updates.</p>
        <nav class="text-sm flex items-center gap-1 flex-wrap justify-center mt-4">
            <a href="{{ route('home') }}" class="text-green-300 hover:text-white transition-colors">Home</a>
            <span class="text-white/30">/</span>
            <span class="text-white font-medium">Blogs</span>
        </nav>
    </div>
</section>

{{-- Filters --}}
<section class="bg-white border-b border-gray-100 py-4 sticky top-[var(--header-h,0px)] z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form id="blogFilterForm" method="GET" action="{{ route('blogs') }}" class="flex flex-wrap items-center gap-3">

            {{-- Search --}}
            <div class="relative flex-1 min-w-48">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                    placeholder="Search articles..."
                    class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
            </div>

            {{-- Category filter --}}
            <div class="flex items-center gap-2 flex-wrap">
                <button type="button" onclick="filterCategory('')"
                    class="category-btn px-4 py-2 rounded-xl text-xs font-semibold transition-all border {{ !request('category') ? 'bg-[#109125] text-white border-[#109125]' : 'bg-white text-gray-600 border-gray-200 hover:border-[#109125] hover:text-[#109125]' }}">
                    All
                </button>
                @foreach($categories as $cat)
                <button type="button" onclick="filterCategory('{{ $cat }}')"
                    class="category-btn px-4 py-2 rounded-xl text-xs font-semibold transition-all border {{ request('category') == $cat ? 'bg-[#109125] text-white border-[#109125]' : 'bg-white text-gray-600 border-gray-200 hover:border-[#109125] hover:text-[#109125]' }}">
                    {{ $cat }}
                </button>
                @endforeach
            </div>

            <input type="hidden" name="category" id="categoryInput" value="{{ request('category') }}">
        </form>
    </div>
</section>

{{-- Blog Grid --}}
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($blogs->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @foreach($blogs as $blog)
            <a href="{{ route('blogs.show', $blog->slug) }}"
               class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 hover:-translate-y-1 block">
                @if($blog->featured_image)
                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->featured_image_alt ?: $blog->title }}"
                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-[#055346] to-[#109125] flex items-center justify-center">
                    <span class="text-5xl">🛒</span>
                </div>
                @endif
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-3">
                        @if($blog->category)
                        <span class="text-xs font-bold text-[#109125] bg-green-50 px-2.5 py-1 rounded-full">{{ $blog->category }}</span>
                        @endif
                        <span class="text-xs text-gray-400">{{ $blog->published_at?->format('M d, Y') }}</span>
                    </div>
                    <h2 class="font-bold text-gray-900 mb-2 line-clamp-2 text-base leading-snug group-hover:text-[#109125] transition-colors">
                        {{ $blog->title }}
                    </h2>
                    <p class="text-sm text-gray-500 line-clamp-2 mb-4 leading-relaxed">{{ $blog->excerpt }}</p>
                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                        <span class="text-xs text-gray-400">By {{ $blog->author ?? '7x Basket Team' }}</span>
                        <span class="text-[#109125] text-xs font-semibold group-hover:underline">Read more →</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($blogs->hasPages())
        <div class="flex items-center justify-between mt-10 pt-6 border-t border-gray-100">
            <p class="text-sm text-gray-400">
                Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} articles
            </p>
            <div class="flex items-center gap-1">
                {{-- Prev --}}
                @if($blogs->onFirstPage())
                <span class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </span>
                @else
                <a href="{{ $blogs->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:bg-[#109125] hover:text-white hover:border-[#109125] transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                @endif

                {{-- Pages --}}
                @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                    @if($page == $blogs->currentPage())
                    <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-[#109125] text-white text-sm font-bold">{{ $page }}</span>
                    @else
                    <a href="{{ $url }}" class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 text-sm font-medium hover:bg-[#109125] hover:text-white hover:border-[#109125] transition-all">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if($blogs->hasMorePages())
                <a href="{{ $blogs->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:bg-[#109125] hover:text-white hover:border-[#109125] transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                @else
                <span class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
                @endif
            </div>
        </div>
        @endif

        @else
        <div class="text-center py-20 text-gray-400">
            <div class="text-5xl mb-4">📝</div>
            <p class="text-sm">No articles found. <a href="{{ route('blogs') }}" class="text-[#109125] hover:underline">Clear filters</a></p>
        </div>
        @endif

    </div>
</section>

<script>
function filterCategory(cat) {
    document.getElementById('categoryInput').value = cat;
    submitBlogFilter();
}

// Debounced search
var searchTimer;
document.getElementById('searchInput').addEventListener('input', function () {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(submitBlogFilter, 500);
});

function submitBlogFilter() {
    var form   = document.getElementById('blogFilterForm');
    var search = document.getElementById('searchInput').value;
    var cat    = document.getElementById('categoryInput').value;

    var params = new URLSearchParams();
    if (search) params.set('search', search);
    if (cat)    params.set('category', cat);

    var newUrl = '{{ route("blogs") }}' + (params.toString() ? '?' + params.toString() : '');
    window.history.pushState({}, '', newUrl);
    form.submit();
}
</script>

@endsection
