{{-- SEO Head Component --}}
<title>{{ $seo['title'] ?? '7x Basket' }}</title>
<meta name="description" content="{{ $seo['description'] ?? '' }}">
<meta name="keywords" content="{{ $seo['keywords'] ?? '' }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? '7x Basket' }}">
<meta property="og:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? '' }}">
<meta property="og:image" content="{{ $seo['og_image'] ?? asset('images/og-default.jpg') }}">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? '7x Basket' }}">
<meta name="twitter:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? '' }}">
<meta name="twitter:image" content="{{ $seo['og_image'] ?? asset('images/og-default.jpg') }}">

{{-- Schema Markup --}}
@if(!empty($seo['schema_markup']))
<script type="application/ld+json">{!! $seo['schema_markup'] !!}</script>
@endif

{{-- Default Organization Schema --}}
@php
$orgSchema = json_encode([
    '@context'     => 'https://schema.org',
    '@type'        => 'Organization',
    'name'         => '7x Basket',
    'url'          => config('app.url'),
    'logo'         => asset('images/logo.png'),
    'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service'],
]);
@endphp
<script type="application/ld+json">{!! $orgSchema !!}</script>
