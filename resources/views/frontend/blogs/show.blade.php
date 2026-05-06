@extends('layouts.app')
@section('content')

<style>
/* ── Blog Detail Page Styles ─────────────────────────────────────────── */

/* Blog content typography */
.blog-content { font-family: 'Inter', sans-serif; font-size: 16px; line-height: 1.8; color: #374151; }
.blog-content h1 { font-size: 2.25em; font-weight: 800; color: #111827; margin: 1.2em 0 0.5em; line-height: 1.2; }
.blog-content h2 { font-size: 1.875em; font-weight: 700; color: #111827; margin: 1.3em 0 0.5em; line-height: 1.25; padding-bottom: 0.4em; border-bottom: 2px solid #f0fdf4; }
.blog-content h3 { font-size: 1.5em; font-weight: 700; color: #1f2937; margin: 1.2em 0 0.4em; line-height: 1.3; }
.blog-content h4 { font-size: 1.25em; font-weight: 600; color: #374151; margin: 1.1em 0 0.4em; line-height: 1.35; }
.blog-content h5 { font-size: 1.125em; font-weight: 600; color: #4b5563; margin: 1em 0 0.3em; line-height: 1.4; }
.blog-content h6 { font-size: 1em; font-weight: 600; color: #6b7280; margin: 1em 0 0.3em; line-height: 1.5; text-transform: uppercase; letter-spacing: 0.05em; }
.blog-content p  { margin: 0 0 0.9em; color: #4b5563; }
.blog-content a  { color: #109125; text-decoration: underline; text-underline-offset: 3px; }
.blog-content a:hover { color: #0d7a1e; }
.blog-content strong { font-weight: 700; color: #1f2937; }
.blog-content em { font-style: italic; }
.blog-content s  { text-decoration: line-through; color: #9ca3af; }

/* Lists */
.blog-content ul { list-style: none; padding: 0; margin: 0 0 1.2em; }
.blog-content ul li { padding: 0.25em 0 0.25em 1.6em; position: relative; color: #4b5563; }
.blog-content ul li::before { content: ''; position: absolute; left: 0.3em; top: 0.65em; width: 7px; height: 7px; border-radius: 50%; background: #109125; }
.blog-content ol { list-style: decimal; padding-left: 1.5em; margin: 0 0 1.2em; }
.blog-content ol li { padding: 0.2em 0; color: #4b5563; }
.blog-content li + li { margin-top: 0.25em; }

/* Blockquote */
.blog-content blockquote { border-left: 4px solid #109125; background: #f0fdf4; margin: 1.5em 0; padding: 1em 1.25em; border-radius: 0 12px 12px 0; }
.blog-content blockquote p { color: #166534; font-style: italic; margin: 0; }

/* Code */
.blog-content code { background: #f1f5f9; color: #dc2626; padding: 0.15em 0.45em; border-radius: 5px; font-size: 0.875em; font-family: 'Courier New', monospace; }
.blog-content pre  { background: #1e293b; color: #e2e8f0; padding: 1.25em; border-radius: 12px; overflow-x: auto; margin: 1.5em 0; }
.blog-content pre code { background: none; color: inherit; padding: 0; font-size: 0.875em; }

/* Images */
.blog-content img { max-width: 100%; border-radius: 12px; margin: 1.5em 0; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }

/* Tables */
.blog-content table { width: 100%; border-collapse: collapse; margin: 1.2em 0; font-size: 0.875em; border: 1px solid #e5e7eb; border-radius: 10px; overflow: hidden; }
/* TipTap outputs <th> inside <tbody> (no <thead>), so target all th + first-row th */
.blog-content table th { background: #055346 !important; color: #ffffff !important; font-weight: 700; padding: 9px 14px; text-align: left; font-size: 0.82em; letter-spacing: 0.04em; text-transform: uppercase; border: none !important; }
.blog-content table th p { color: #ffffff !important; margin: 0; background: transparent !important; }
.blog-content table td { padding: 8px 14px; border-bottom: 1px solid #f3f4f6; border-right: 1px solid #f3f4f6; color: #374151; vertical-align: top; line-height: 1.5; }
.blog-content table td:last-child, .blog-content table th:last-child { border-right: none; }
.blog-content table tr:last-child td { border-bottom: none; }
.blog-content table tr:nth-child(even) td { background: #f9fafb; }
.blog-content table tr:hover td { background: #f0fdf4; transition: background 0.15s; }
/* Ensure inline color styles on th text don't override white */
.blog-content table th span[style] { color: #ffffff !important; }

/* Horizontal rule */
.blog-content hr { border: none; border-top: 2px solid #f3f4f6; margin: 2em 0; }

/* TOC scroll behavior */
html { scroll-behavior: smooth; }

/* Sidebar sticky */
.sidebar-sticky { position: sticky; top: 96px; }

/* Reading progress bar */
#reading-progress { position: fixed; top: 0; left: 0; height: 3px; background: linear-gradient(90deg, #109125, #4ade80); z-index: 9999; transition: width 0.1s linear; width: 0%; }
</style>

{{-- Reading progress bar --}}
<div id="reading-progress"></div>

{{-- Hero --}}
<section class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] py-12">
    <div class="absolute blob w-72 h-72 bg-[#109125]/20 top-[-60px] left-[-60px]"></div>
    <div class="absolute blob w-56 h-56 bg-[#ec2024]/10 bottom-[-40px] right-[5%]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        @if($blog->category)
        <span class="inline-block bg-white/15 text-green-200 text-xs font-bold px-4 py-1.5 rounded-full border border-white/20 mb-4 uppercase tracking-wider">
            {{ $blog->category }}
        </span>
        @endif
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">{{ $blog->title }}</h1>
        <nav class="text-xs flex items-center gap-1.5 flex-wrap justify-center mt-5 text-green-300">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <span class="text-white/30">/</span>
            <a href="{{ route('blogs') }}" class="hover:text-white transition-colors">Blogs</a>
            <span class="text-white/30">/</span>
            <span class="text-white/70">{{ Str::limit($blog->title, 50) }}</span>
        </nav>
    </div>
</section>

<section class="py-6 bg-[#f8faf8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- ── MAIN CONTENT ─────────────────────────────────────── --}}
            <div class="lg:col-span-8">

                {{-- Featured Image --}}
                @if($blog->featured_image)
                <img src="{{ asset($blog->featured_image) }}"
                     alt="{{ $blog->featured_image_alt ?: $blog->title }}"
                     class="w-full max-h-[480px] object-cover rounded-2xl shadow-md"
                     loading="lazy">
                @else
                <div class="w-full h-64 bg-gradient-to-br from-[#055346] to-[#109125] rounded-2xl flex items-center justify-center shadow-md">
                    <span class="text-7xl">🛒</span>
                </div>
                @endif

                {{-- Article Card --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mt-4 p-5 sm:p-6">

                    {{-- Blog Body --}}
                    <div id="blog-body" class="blog-content">
                        {!! $blog->content !!}
                    </div>

                    {{-- Tags --}}
                    @if($blog->tags)
                    <div class="flex flex-wrap gap-2 mt-10 pt-6 border-t border-gray-100">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider self-center mr-1">Tags:</span>
                        @foreach($blog->tags_array as $tag)
                        <span class="bg-[#f0fdf4] border border-[#bbf7d0] text-[#166534] text-xs font-semibold px-3 py-1.5 rounded-full hover:bg-[#dcfce7] transition-colors cursor-default">
                            #{{ trim($tag) }}
                        </span>
                        @endforeach
                    </div>
                    @endif

                    {{-- Share --}}
                    <div class="flex items-center gap-3 mt-6 pt-5 border-t border-gray-100 flex-wrap">
                        <span class="text-sm font-semibold text-gray-500">Share this article:</span>
                        @php $shareUrl = urlencode(request()->fullUrl()); $shareTitle = urlencode($blog->title); @endphp
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"
                           class="flex items-center gap-1.5 bg-[#1877F2] text-white text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-[#1565d8] transition-colors">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank"
                           class="flex items-center gap-1.5 bg-black text-white text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-gray-800 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            Twitter
                        </a>
                        <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank"
                           class="flex items-center gap-1.5 bg-[#25D366] text-white text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-[#1ebe5a] transition-colors">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.855L.057 23.882l6.198-1.448A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.371l-.36-.214-3.68.859.875-3.593-.234-.369A9.818 9.818 0 1112 21.818z"/></svg>
                            WhatsApp
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank"
                           class="flex items-center gap-1.5 bg-[#0A66C2] text-white text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-[#0855a5] transition-colors">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                            LinkedIn
                        </a>
                    </div>
                </div>

                {{-- CTA Banner --}}
                <div class="bg-gradient-to-br from-[#055346] to-[#076b58] rounded-2xl p-8 mt-6 text-center relative overflow-hidden shadow-lg">
                    <div class="absolute blob w-40 h-40 bg-[#109125]/20 top-[-30px] right-[-20px]"></div>
                    <div class="relative z-10">
                        <span class="inline-block bg-white/15 text-green-200 text-xs font-bold px-3 py-1 rounded-full border border-white/20 mb-3">Franchise Opportunity</span>
                        <h3 class="text-xl font-extrabold text-white">Interested in a 7x Basket Franchise?</h3>
                        <p class="text-green-200 text-sm mt-2">Zero royalty for 2 years. Full support. Apply today and our team will reach out within 24 hours.</p>
                        <button onclick="openLeadPopup(); return false;"
                            class="inline-block bg-[#f5a623] hover:bg-[#e09610] text-[#1a1a1a] font-extrabold px-8 py-3 rounded-xl mt-5 transition-all duration-200 hover:-translate-y-0.5 shadow-lg">
                            Apply Now →
                        </button>
                    </div>
                </div>

                {{-- Related Posts --}}
                @if($related->count())
                <div class="mt-10">
                    <h2 class="text-xl font-extrabold text-gray-900 mb-5 flex items-center gap-2">
                        <span class="w-1 h-6 bg-[#109125] rounded-full inline-block"></span>
                        You Might Also Like
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        @foreach($related as $post)
                        <a href="{{ route('blogs.show', $post->slug) }}"
                           class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 block group">
                            @if($post->featured_image)
                            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}"
                                 class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            @else
                            <div class="w-full h-40 bg-gradient-to-br from-[#055346] to-[#109125] flex items-center justify-center">
                                <span class="text-3xl">🛒</span>
                            </div>
                            @endif
                            <div class="p-4">
                                @if($post->category)
                                <span class="text-[10px] font-bold text-[#109125] uppercase tracking-wider">{{ $post->category }}</span>
                                @endif
                                <h3 class="text-sm font-bold text-gray-900 mt-1 leading-snug line-clamp-2 group-hover:text-[#109125] transition-colors">{{ $post->title }}</h3>
                                <p class="text-[10px] text-gray-400 mt-2">{{ $post->published_at?->format('M d, Y') }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            {{-- ── SIDEBAR ──────────────────────────────────────────── --}}
            <div class="lg:col-span-4">
                <div class="sidebar-sticky space-y-5">

                    {{-- Author Card --}}
                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-[#055346] flex items-center justify-center text-white text-xl font-extrabold flex-shrink-0">
                                {{ substr($blog->author ?? '7', 0, 1) }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">{{ $blog->author ?? '7x Basket Team' }}</p>
                                <p class="text-xs text-[#109125] font-semibold">Franchise Expert</p>
                                <div class="flex items-center gap-2 mt-1 text-[11px] text-gray-400">
                                    <span>{{ $blog->published_at?->format('M d, Y') }}</span>
                                    <span>•</span>
                                    <span>{{ max(1, (int)(str_word_count(strip_tags($blog->content ?? '')) / 200)) }} min read</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3 leading-relaxed border-t border-gray-50 pt-3">The 7x Basket team shares insights on franchise business, grocery retail, and entrepreneurship in India.</p>
                    </div>

                    {{-- Table of Contents --}}
                    @php
                        preg_match_all('/<h([23])[^>]*>(.*?)<\/h[23]>/i', $blog->content ?? '', $headings);
                        $toc = [];
                        foreach(($headings[0] ?? []) as $i => $h) {
                            $level = $headings[1][$i];
                            $text  = strip_tags($headings[2][$i]);
                            $id    = Str::slug($text);
                            $toc[] = ['level' => $level, 'text' => $text, 'id' => $id];
                        }
                    @endphp
                    @if(count($toc))
                    {{-- <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm" style="display: none">
                        <p class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#109125]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h10"/></svg>
                            In This Article
                        </p>
                        <ul class="space-y-1.5">
                            @foreach($toc as $item)
                            <li class="{{ $item['level'] == 3 ? 'pl-4' : '' }}">
                                <a href="#{{ $item['id'] }}"
                                   class="flex items-start gap-2 text-xs text-gray-500 hover:text-[#109125] transition-colors leading-snug group">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $item['level'] == 2 ? 'bg-[#109125]' : 'bg-gray-300 group-hover:bg-[#109125]' }} flex-shrink-0 mt-1.5 transition-colors"></span>
                                    {{ $item['text'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div> --}}
                    @endif

                    {{-- Franchise Apply Card --}}
                    <div class="bg-gradient-to-br from-[#055346] to-[#076b58] rounded-2xl p-6 text-center relative overflow-hidden shadow-md">
                        <div class="absolute blob w-32 h-32 bg-[#109125]/20 top-[-20px] right-[-10px]"></div>
                        <div class="relative z-10">
                            <span class="text-2xl">🏪</span>
                            <p class="text-white font-extrabold text-base mt-2">Own a 7x Basket Store</p>
                            <p class="text-green-200 text-xs mt-1 leading-relaxed">Zero royalty for 2 years. Full support. High returns.</p>
                            <div class="grid grid-cols-3 gap-2 mt-4">
                                @foreach([['150+','Partners'],['25+','States'],['0%','Royalty']] as [$n,$l])
                                <div class="bg-white/10 rounded-xl p-2 text-center border border-white/10">
                                    <p class="text-white font-extrabold text-sm">{{ $n }}</p>
                                    <p class="text-green-300 text-[10px]">{{ $l }}</p>
                                </div>
                                @endforeach
                            </div>
                            <button onclick="openLeadPopup(); return false;"
                                class="w-full bg-[#f5a623] hover:bg-[#e09610] text-[#1a1a1a] font-extrabold py-2.5 rounded-xl mt-4 text-sm transition-all duration-200">
                                Apply for Franchise →
                            </button>
                        </div>
                    </div>

                    {{-- Recent Posts --}}
                    @if(isset($recent) && $recent->count())
                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <p class="text-sm font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#109125] rounded-full inline-block"></span>
                            Recent Posts
                        </p>
                        <ul class="space-y-0 divide-y divide-gray-50">
                            @foreach($recent as $post)
                            <li class="py-3 first:pt-0 last:pb-0">
                                <a href="{{ route('blogs.show', $post->slug) }}" class="flex gap-3 items-start group">
                                    @if($post->featured_image)
                                    <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}"
                                         class="w-16 h-14 rounded-xl object-cover flex-shrink-0 group-hover:opacity-80 transition-opacity">
                                    @else
                                    <div class="w-16 h-14 rounded-xl bg-gradient-to-br from-[#055346] to-[#109125] flex items-center justify-center flex-shrink-0">
                                        <span class="text-base">🛒</span>
                                    </div>
                                    @endif
                                    <div class="min-w-0 flex-1">
                                        @if($post->category)
                                        <span class="text-[10px] text-[#109125] font-bold uppercase tracking-wider">{{ $post->category }}</span>
                                        @endif
                                        <p class="text-xs font-bold text-gray-800 leading-snug mt-0.5 line-clamp-2 group-hover:text-[#109125] transition-colors">{{ $post->title }}</p>
                                        <p class="text-[10px] text-gray-400 mt-1">{{ $post->published_at?->format('M d, Y') }}</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Tags Cloud --}}
                    @if($blog->tags)
                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <p class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#109125] rounded-full inline-block"></span>
                            Tags
                        </p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($blog->tags_array as $tag)
                            <span class="bg-[#f0fdf4] border border-[#bbf7d0] text-[#166534] text-xs font-semibold px-3 py-1.5 rounded-full hover:bg-[#dcfce7] transition-colors cursor-default">
                                #{{ trim($tag) }}
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

<script>
// Reading progress bar
window.addEventListener('scroll', () => {
    const body   = document.getElementById('blog-body');
    const bar    = document.getElementById('reading-progress');
    if (!body || !bar) return;
    const rect   = body.getBoundingClientRect();
    const total  = body.offsetHeight;
    const scrolled = Math.max(0, -rect.top);
    const pct    = Math.min(100, (scrolled / total) * 100);
    bar.style.width = pct + '%';
});

// Auto-add IDs to headings for TOC links
document.querySelectorAll('#blog-body h2, #blog-body h3').forEach(h => {
    if (!h.id) {
        h.id = h.textContent.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
    }
});
</script>

@endsection
