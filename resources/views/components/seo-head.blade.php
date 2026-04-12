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

{{-- Default Organization Schema --}}
@php
$orgSchema = json_encode([
    '@context'     => 'https://schema.org',
    '@type'        => 'Organization',
    'name'         => '7x Basket',
    'url'          => config('app.url'),
    'logo'         => asset('custom/logo.png'),
    'contactPoint' => ['@type' => 'ContactPoint', 'telephone' => '+91-9870275327', 'contactType' => 'customer service'],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
<script type="application/ld+json">{!! $orgSchema !!}</script>
