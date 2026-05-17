{{-- SEO Head Component --}}
<title>{{ $seo['title'] ?? '7x Basket' }}</title>
<meta name="description" content="{{ $seo['description'] ?? '' }}">
@if(!empty($seo['keywords']))
<meta name="keywords" content="{{ $seo['keywords'] }}">
@endif
<meta name="robots" content="{{ ($seo['meta_index'] ?? true) ? 'index' : 'noindex' }}, {{ ($seo['meta_follow'] ?? true) ? 'follow' : 'nofollow' }}">
<link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

{{-- Open Graph --}}
<meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? '7x Basket' }}">
<meta property="og:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? '' }}">
<meta property="og:image" content="{{ $seo['og_image'] ?? asset('custom/logo.png') }}">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? '7x Basket' }}">
<meta name="twitter:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? '' }}">
<meta name="twitter:image" content="{{ $seo['og_image'] ?? asset('custom/logo.png') }}">

{{-- Schema Markup — supports single string or array of schemas --}}
@if(!empty($seo['schemas']))
    @foreach($seo['schemas'] as $schema)
    <script type="application/ld+json">{!! $schema['markup'] !!}</script>
    @endforeach
@elseif(!empty($seo['schema_markup']))
<script type="application/ld+json">{!! $seo['schema_markup'] !!}</script>
@endif

{{-- Global Organization Schema (from SEO Manager) --}}
@php
    $globalSeo = \App\Models\SeoMeta::where('page_key', '_global')->first();
@endphp
@if($globalSeo && $globalSeo->schema_markup)
<script type="application/ld+json">{!! $globalSeo->schema_markup !!}</script>
@endif
