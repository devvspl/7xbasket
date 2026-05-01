@extends('layouts.app')
@section('content')

{{-- Hero / Breadcrumb --}}
<section class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] py-10">
    <div class="absolute blob w-72 h-72 bg-[#109125]/20 top-[-60px] left-[-60px]"></div>
    <div class="absolute blob w-56 h-56 bg-[#ec2024]/10 bottom-[-40px] right-[5%]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        @if($blog->category)
        <span class="inline-block bg-white/10 text-green-200 text-xs font-bold px-3 py-1 rounded-full border border-white/20 mb-3">
            {{ $blog->category }}
        </span>
        @endif
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight max-w-3xl mx-auto">{{ $blog->title }}</h1>
        <nav class="text-sm flex items-center gap-1 flex-wrap justify-center mt-4">
            <a href="{{ route('home') }}" class="text-green-300 hover:text-white transition-colors">Home</a>
            <span class="text-white/30">/</span>
            <a href="{{ route('blogs') }}" class="text-green-300 hover:text-white transition-colors">Blogs</a>
            <span class="text-white/30">/</span>
            <span class="text-white font-medium">{{ Str::limit($blog->title, 45) }}</span>
        </nav>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- ══════════════════════════════════════════
                 LEFT — Main Content (col-8)
            ══════════════════════════════════════════ --}}
            <div class="lg:col-span-8">

                {{-- Thumbnail --}}
                @if($blog->featured_image)
                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->featured_image_alt ?: $blog->title }}"
                     class="w-full h-115 object-cover rounded-2xl mt-6 shadow-sm" loading="lazy">
                @else
                <div class="w-full h-115 bg-gradient-to-br from-[#055346] to-[#109125] rounded-2xl mt-6 flex items-center justify-center">
                    <span class="text-6xl">🛒</span>
                </div>
                @endif

                {{-- 6. Blog Body --}}
                <div class="mt-8 prose prose-gray max-w-none
                            prose-headings:text-gray-900 prose-h2:text-xl prose-h2:font-extrabold prose-h2:mt-8 prose-h2:mb-3
                            prose-h3:text-lg prose-h3:font-bold prose-h3:mt-6 prose-h3:mb-2
                            prose-p:text-gray-500 prose-p:leading-relaxed prose-p:mb-4
                            prose-a:text-[#109125] prose-strong:text-gray-800
                            prose-ul:list-disc prose-ul:list-inside prose-ul:text-gray-500 prose-ul:space-y-2
                            prose-img:rounded-xl prose-blockquote:border-[#109125] prose-blockquote:text-gray-500">
                    {!! $blog->content !!}
                </div>

                {{-- 7. Tags --}}
                @if($blog->tags)
                <div class="flex flex-wrap gap-2 mt-8">
                    @foreach($blog->tags_array as $tag)
                    <span class="bg-gray-100 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full hover:bg-gray-200 transition-colors cursor-default">
                        #{{ trim($tag) }}
                    </span>
                    @endforeach
                </div>
                @endif

                {{-- 8. Share Row --}}
                <div class="flex items-center gap-3 mt-6">
                    <span class="text-sm text-gray-400 font-medium">Share:</span>
                    @php $shareUrl = urlencode(request()->fullUrl()); $shareTitle = urlencode($blog->title); @endphp
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"
                       class="w-8 h-8 rounded-full bg-gray-100 hover:bg-[#1877F2] hover:text-white text-gray-500 flex items-center justify-center transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank"
                       class="w-8 h-8 rounded-full bg-gray-100 hover:bg-black hover:text-white text-gray-500 flex items-center justify-center transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank"
                       class="w-8 h-8 rounded-full bg-gray-100 hover:bg-[#25D366] hover:text-white text-gray-500 flex items-center justify-center transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.855L.057 23.882l6.198-1.448A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.371l-.36-.214-3.68.859.875-3.593-.234-.369A9.818 9.818 0 1112 21.818z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank"
                       class="w-8 h-8 rounded-full bg-gray-100 hover:bg-[#0A66C2] hover:text-white text-gray-500 flex items-center justify-center transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                </div>

                {{-- 9. CTA Banner --}}
                <div class="bg-[#f0faf4] border border-green-100 rounded-2xl p-8 mt-10 text-center">
                    <h3 class="text-xl font-extrabold text-gray-900">Interested in a 7x Basket Franchise?</h3>
                    <p class="text-gray-500 text-sm mt-1">Apply today and our team will reach out within 24 hours.</p>
                    <button onclick="openLeadPopup(); return false;"
                        class="inline-block bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-8 py-3 rounded-xl mt-5 transition-all duration-200 hover:-translate-y-0.5 shadow-sm">
                        Apply Now →
                    </button>
                </div>

                {{-- 10. Related Posts --}}
                @if($related->count())
                <div class="mt-14">
                    <h2 class="text-xl font-extrabold text-gray-900 mb-6">You Might Also Like</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach($related as $post)
                        <a href="{{ route('blogs.show', $post->slug) }}"
                           class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow block">
                            @if($post->featured_image)
                            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}"
                                 class="w-full h-40 object-cover" loading="lazy">
                            @else
                            <div class="w-full h-40 bg-gradient-to-br from-[#055346] to-[#109125] flex items-center justify-center">
                                <span class="text-3xl">🛒</span>
                            </div>
                            @endif
                            <div class="p-4">
                                @if($post->category)
                                <span class="text-[10px] font-bold text-[#109125] uppercase">{{ $post->category }}</span>
                                @endif
                                <h3 class="text-sm font-bold text-gray-900 mt-1 leading-snug line-clamp-2">{{ $post->title }}</h3>
                                <p class="text-[10px] text-gray-400 mt-1">{{ $post->published_at?->format('M d, Y') }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            {{-- ══════════════════════════════════════════
                 RIGHT — Sidebar (col-4)
            ══════════════════════════════════════════ --}}
            <div class="lg:col-span-4">
                <div class="sticky top-24 space-y-6">

                    {{-- 1. Author Card --}}
                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm text-center">
                        <div class="w-16 h-16 rounded-full bg-[#055346] flex items-center justify-center text-white text-2xl font-extrabold mx-auto">
                            {{ substr($blog->author ?? '7', 0, 1) }}
                        </div>
                        <p class="text-base font-bold text-gray-900 mt-3">{{ $blog->author ?? '7x Basket Team' }}</p>
                        <p class="text-xs text-[#109125] font-semibold">Franchise Expert</p>
                        <p class="text-xs text-gray-400 mt-2 leading-relaxed">The 7x Basket team shares insights on franchise business, grocery retail, and entrepreneurship in India.</p>
                        <div class="flex items-center justify-center gap-3 mt-4 pt-4 border-t border-gray-100 text-xs text-gray-400 flex-wrap">
                            <span>📅 {{ $blog->published_at?->format('M d, Y') }}</span>
                            <span>•</span>
                            <span>⏱ {{ max(1, (int)(str_word_count(strip_tags($blog->content ?? '')) / 200)) }} min read</span>
                        </div>
                    </div>

                    {{-- 2. Table of Contents --}}
                    @php
                        preg_match_all('/<h2[^>]*>(.*?)<\/h2>/i', $blog->content ?? '', $headings);
                        $toc = $headings[1] ?? [];
                    @endphp
                    @if(count($toc))
                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
                        <p class="text-sm font-bold text-gray-900 mb-3">In This Article</p>
                        <ul class="space-y-2">
                            @foreach($toc as $heading)
                            <li class="flex items-center gap-2 text-sm text-gray-500 hover:text-[#109125] cursor-pointer transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#109125] flex-shrink-0"></span>
                                {{ strip_tags($heading) }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- 3. Franchise Apply Card --}}
                    <div class="bg-[#055346] rounded-2xl p-6 text-center">
                        <p class="text-white font-extrabold text-base">Own a 7x Basket Store</p>
                        <p class="text-green-200 text-xs mt-1">Zero royalty. Full support. High returns.</p>
                        <div class="grid grid-cols-3 gap-2 mt-4">
                            @foreach([['500+','Partners'],['20+','Cities'],['30%','ROI']] as [$n,$l])
                            <div class="bg-white/10 rounded-xl p-2 text-center">
                                <p class="text-white font-extrabold text-sm">{{ $n }}</p>
                                <p class="text-green-300 text-[10px]">{{ $l }}</p>
                            </div>
                            @endforeach
                        </div>
                        <button onclick="openLeadPopup(); return false;"
                            class="w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold py-3 rounded-xl mt-5 text-sm transition-all duration-200">
                            Apply for Franchise →
                        </button>
                    </div>

                    {{-- 4. Recent Posts --}}
                    @if(isset($recent) && $recent->count())
                    <div class="bg-white border border-gray-100 rounded-2xl p-5">
                        <p class="text-sm font-bold text-gray-900 mb-4">Recent Posts</p>
                        <ul class="space-y-0">
                            @foreach($recent as $post)
                            <li class="flex gap-3 items-start pb-3 border-b border-gray-100 last:border-0 last:pb-0 pt-3 first:pt-0">
                                <a href="{{ route('blogs.show', $post->slug) }}" class="flex gap-3 items-start w-full hover:opacity-80 transition-opacity">
                                    @if($post->featured_image)
                                    <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}"
                                         class="w-16 h-16 rounded-xl object-cover flex-shrink-0">
                                    @else
                                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#055346] to-[#109125] flex items-center justify-center flex-shrink-0">
                                        <span class="text-lg">🛒</span>
                                    </div>
                                    @endif
                                    <div class="min-w-0">
                                        @if($post->category)
                                        <span class="text-[10px] text-[#109125] font-bold uppercase">{{ $post->category }}</span>
                                        @endif
                                        <p class="text-xs font-bold text-gray-800 leading-snug mt-0.5 line-clamp-2">{{ $post->title }}</p>
                                        <p class="text-[10px] text-gray-400 mt-1">{{ $post->published_at?->format('M d, Y') }}</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- 5. Tags Cloud --}}
                    @if($blog->tags)
                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
                        <p class="text-sm font-bold text-gray-900 mb-3">Popular Tags</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($blog->tags_array as $tag)
                            <span class="bg-white border border-gray-200 text-gray-500 text-xs px-3 py-1.5 rounded-full hover:border-[#109125] hover:text-[#109125] transition-colors cursor-default">
                                {{ trim($tag) }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
