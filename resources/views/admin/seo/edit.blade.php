@extends('layouts.admin')
@section('title', 'SEO — ' . ucfirst($page))
@section('subtitle', 'Manage search engine settings for the ' . ucfirst($page) . ' page')

@section('content')

@php
    $appUrl = config('app.url');
    $pageUrls = [
        'home'       => '/',
        'about'      => '/about',
        'blogs'      => '/blogs',
        'apply'      => '/apply-franchise',
        'contact'    => '/contact',
        'calculator' => '/investment-calculator',
    ];
    $pageUrl = $pageUrls[$page] ?? '/' . $page;
@endphp

<form action="{{ route('admin.seo.update', $page) }}" method="POST">
    @csrf @method('PUT')

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5 text-sm text-red-700">
        <ul class="space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <div class="flex flex-col xl:flex-row gap-5">

        {{-- ── LEFT: Main SEO fields ── --}}
        <div class="flex-1 min-w-0 space-y-4">

            {{-- Meta Title --}}
            <div class="stat-card">
                <div class="flex items-center justify-between mb-2">
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Meta Title</label>
                    <span class="text-xs text-gray-400" id="metaTitleCount">0/60</span>
                </div>
                <input type="text" name="title" id="metaTitle"
                       value="{{ old('title', $meta->title) }}" maxlength="60"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="Page title shown in search results (50–60 chars)">
                <p class="text-xs text-gray-400 mt-1.5">Recommended: 50–60 characters. Leave blank to use the default site title.</p>
            </div>

            {{-- Meta Description --}}
            <div class="stat-card">
                <div class="flex items-center justify-between mb-2">
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Meta Description</label>
                    <span class="text-xs text-gray-400" id="metaDescCount">0/160</span>
                </div>
                <textarea name="description" id="metaDesc" rows="3" maxlength="160"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                    placeholder="Brief description shown under the title in search results (150–160 chars)">{{ old('description', $meta->description) }}</textarea>
                <p class="text-xs text-gray-400 mt-1.5">Recommended: 150–160 characters.</p>
            </div>

            {{-- Keywords --}}
            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Keywords</label>
                <input type="text" name="keywords" value="{{ old('keywords', $meta->keywords) }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="keyword1, keyword2, keyword3">
                <p class="text-xs text-gray-400 mt-1.5">Comma-separated. Not heavily used by Google but good for reference.</p>
            </div>

            {{-- Open Graph --}}
            <div class="stat-card space-y-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Open Graph (Social Media)</p>
                <p class="text-xs text-gray-400 -mt-2">Controls how this page looks when shared on Facebook, WhatsApp, LinkedIn etc.</p>

                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1.5">OG Title</label>
                    <input type="text" name="og_title" value="{{ old('og_title', $meta->og_title) }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Leave blank to use Meta Title">
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1.5">OG Description</label>
                    <textarea name="og_description" rows="2"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                        placeholder="Leave blank to use Meta Description">{{ old('og_description', $meta->og_description) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1.5">OG Image URL</label>
                    <input type="text" name="og_image" id="ogImageUrl" value="{{ old('og_image', $meta->og_image) }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="https://... (recommended: 1200×630px)">
                    <p class="text-xs text-gray-400 mt-1.5">Recommended size: 1200 × 630 pixels.</p>
                </div>
            </div>

            {{-- Schema Markup --}}
            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Schema Markup (JSON-LD)</label>
                <p class="text-xs text-gray-400 mb-3">Structured data for rich results in Google. Must be valid JSON-LD.</p>
                <textarea name="schema_markup" id="schemaMarkup" rows="8"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-xs font-mono focus:outline-none focus:ring-2 focus:ring-green-500 resize-y"
                    placeholder="{{ '{"@context":"https://schema.org","@type":"WebPage","name":"Page Name"}' }}">{{ old('schema_markup', $meta->schema_markup) }}</textarea>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xs text-gray-400" id="schemaStatus"></span>
                    <button type="button" id="validateSchema"
                            class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 px-3 py-1.5 rounded-lg transition-colors font-medium">
                        Validate JSON
                    </button>
                </div>
            </div>

        </div>

        {{-- ── RIGHT: Preview & Actions ── --}}
        <div class="w-full xl:w-80 space-y-4 flex-shrink-0">

            {{-- Save button --}}
            <div class="stat-card">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Actions</p>
                <div class="space-y-2">
                    <button type="submit"
                            class="w-full bg-green-600 text-white font-semibold py-2.5 rounded-xl hover:bg-green-700 transition-colors text-sm">
                        Save SEO Settings
                    </button>
                    <a href="{{ route('admin.seo.index') }}"
                       class="block w-full bg-gray-100 text-gray-700 font-semibold py-2.5 rounded-xl hover:bg-gray-200 transition-colors text-sm text-center">
                        Cancel
                    </a>
                    <a href="{{ $appUrl . $pageUrl }}" target="_blank"
                       class="flex items-center justify-center gap-1.5 w-full border border-gray-200 text-gray-500 font-medium py-2.5 rounded-xl hover:bg-gray-50 transition-colors text-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        View Page
                    </a>
                </div>
            </div>

            {{-- SERP Preview --}}
            <div class="stat-card">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Google Search Preview</p>
                <div class="bg-white border border-gray-200 rounded-xl p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-5 h-5 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white text-[8px] font-bold">7x</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-700 leading-tight font-medium">7x Basket</p>
                            <p class="text-[10px] text-gray-400 leading-tight" id="serpUrl">{{ $appUrl . $pageUrl }}</p>
                        </div>
                    </div>
                    <p class="text-blue-600 text-sm font-medium leading-snug mb-1 line-clamp-2" id="serpTitle">
                        {{ $meta->title ?: '7x Basket — ' . ucfirst($page) }}
                    </p>
                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-3" id="serpDesc">
                        {{ $meta->description ?: 'No description set. Add a meta description to improve click-through rate.' }}
                    </p>
                </div>
                <div class="mt-3 space-y-1.5">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-500">Title length</span>
                        <span id="titleLengthBadge" class="font-semibold px-2 py-0.5 rounded-full bg-gray-100 text-gray-600">0</span>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-500">Description length</span>
                        <span id="descLengthBadge" class="font-semibold px-2 py-0.5 rounded-full bg-gray-100 text-gray-600">0</span>
                    </div>
                </div>
            </div>

            {{-- Social Preview --}}
            <div class="stat-card">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Social Share Preview</p>
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <div id="ogImagePreview" class="w-full h-28 bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center">
                        <span class="text-3xl">🛒</span>
                    </div>
                    <div class="p-3 bg-gray-50">
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider">7xbasket.com</p>
                        <p class="text-sm font-semibold text-gray-900 mt-0.5 line-clamp-1" id="ogTitlePreview">
                            {{ $meta->og_title ?: $meta->title ?: ucfirst($page) . ' — 7x Basket' }}
                        </p>
                        <p class="text-xs text-gray-500 mt-0.5 line-clamp-2" id="ogDescPreview">
                            {{ $meta->og_description ?: $meta->description ?: 'No description set.' }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
const metaTitle  = document.getElementById('metaTitle');
const metaDesc   = document.getElementById('metaDesc');
const ogImageUrl = document.getElementById('ogImageUrl');

const metaTitleCount = document.getElementById('metaTitleCount');
const metaDescCount  = document.getElementById('metaDescCount');

const serpTitle  = document.getElementById('serpTitle');
const serpDesc   = document.getElementById('serpDesc');
const ogTitlePreview = document.getElementById('ogTitlePreview');
const ogDescPreview  = document.getElementById('ogDescPreview');
const ogImagePreview = document.getElementById('ogImagePreview');

const titleLengthBadge = document.getElementById('titleLengthBadge');
const descLengthBadge  = document.getElementById('descLengthBadge');

function getBadgeClass(len, warn, max) {
    if (len === 0) return 'bg-gray-100 text-gray-500';
    if (len <= warn) return 'bg-green-100 text-green-700';
    if (len <= max)  return 'bg-yellow-100 text-yellow-700';
    return 'bg-red-100 text-red-600';
}

function updateChecklist() {
    const checks = {
        'check-title':     metaTitle.value.trim().length > 0,
        'check-desc':      metaDesc.value.trim().length > 0,
        'check-title-len': metaTitle.value.length > 0 && metaTitle.value.length <= 60,
        'check-desc-len':  metaDesc.value.length > 0 && metaDesc.value.length <= 160,
        'check-og':        ogImageUrl.value.trim().length > 0,
    };
    Object.entries(checks).forEach(([id, pass]) => {
        const el  = document.getElementById(id);
        const dot = el.querySelector('div');
        dot.className = pass
            ? 'w-4 h-4 rounded-full bg-green-500 flex-shrink-0 flex items-center justify-center'
            : 'w-4 h-4 rounded-full bg-gray-200 flex-shrink-0';
        dot.innerHTML = pass ? '<svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>' : '';
        el.querySelector('span').className = pass ? 'text-gray-700' : 'text-gray-400';
    });
}

function update() {
    const tLen = metaTitle.value.length;
    const dLen = metaDesc.value.length;

    // Counters
    metaTitleCount.textContent = tLen + '/60';
    metaTitleCount.className   = tLen > 55 ? 'text-red-500 text-xs' : 'text-gray-400 text-xs';
    metaDescCount.textContent  = dLen + '/160';
    metaDescCount.className    = dLen > 150 ? 'text-red-500 text-xs' : 'text-gray-400 text-xs';

    // SERP
    serpTitle.textContent = metaTitle.value || '7x Basket — {{ ucfirst($page) }}';
    serpDesc.textContent  = metaDesc.value  || 'No description set.';

    // Badges
    titleLengthBadge.textContent = tLen;
    titleLengthBadge.className   = 'font-semibold px-2 py-0.5 rounded-full text-xs ' + getBadgeClass(tLen, 55, 60);
    descLengthBadge.textContent  = dLen;
    descLengthBadge.className    = 'font-semibold px-2 py-0.5 rounded-full text-xs ' + getBadgeClass(dLen, 150, 160);

    // OG preview
    ogTitlePreview.textContent = metaTitle.value || '{{ ucfirst($page) }} — 7x Basket';
    ogDescPreview.textContent  = metaDesc.value  || 'No description set.';

    updateChecklist();
}

// OG image preview
ogImageUrl.addEventListener('input', function() {
    if (this.value.trim()) {
        ogImagePreview.innerHTML = '<img src="' + this.value + '" class="w-full h-28 object-cover" onerror="this.parentElement.innerHTML=\'<div class=\\\"w-full h-28 bg-gray-100 flex items-center justify-center text-gray-400 text-xs\\\">Invalid image URL</div>\'">';
    } else {
        ogImagePreview.innerHTML = '<div class="w-full h-28 bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center"><span class="text-3xl">🛒</span></div>';
    }
    updateChecklist();
});

// Schema validator
document.getElementById('validateSchema').addEventListener('click', function() {
    const val = document.getElementById('schemaMarkup').value.trim();
    const status = document.getElementById('schemaStatus');
    if (!val) { status.textContent = ''; return; }
    try {
        JSON.parse(val);
        status.textContent = '✓ Valid JSON';
        status.className = 'text-xs text-green-600 font-medium';
    } catch(e) {
        status.textContent = '✗ ' + e.message;
        status.className = 'text-xs text-red-500 font-medium';
    }
});

metaTitle.addEventListener('input', update);
metaDesc.addEventListener('input', update);

// Init on load
update();

// Init OG image if set
@if($meta->og_image)
ogImagePreview.innerHTML = '<img src="{{ $meta->og_image }}" class="w-full h-28 object-cover" onerror="this.parentElement.innerHTML=\'<div class=\\\"w-full h-28 bg-gray-100 flex items-center justify-center text-gray-400 text-xs\\\">Image not found</div>\'">';
@endif
</script>

@endsection
