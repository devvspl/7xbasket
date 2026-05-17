@extends('layouts.admin')
@section('title', 'SEO Manager')

@section('content')

<h2 class="text-xl font-bold text-gray-900 mb-6">SEO Manager</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
    @foreach($pages as $page)
    @php $meta = $metas[$page] ?? null; @endphp
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-semibold text-gray-900 capitalize">{{ $page }}</h3>
            <span class="text-xs {{ $meta ? 'text-green-600 bg-green-50' : 'text-gray-400 bg-gray-100' }} px-2.5 py-1 rounded-full font-medium">
                {{ $meta ? 'Configured' : 'Default' }}
            </span>
        </div>
        @if($meta)
        <p class="text-xs text-gray-500 line-clamp-2 mb-4">{{ $meta->title }}</p>
        @else
        <p class="text-xs text-gray-400 mb-4">Using default SEO settings</p>
        @endif
        <a href="{{ route('admin.seo.edit', $page) }}" class="text-sm text-green-600 font-medium hover:underline">
            {{ $meta ? 'Edit SEO' : 'Configure SEO' }} →
        </a>
    </div>
    @endforeach
</div>

{{-- Global Organization Schema --}}
<div class="mt-10">
    <h2 class="text-xl font-bold text-gray-900 mb-2">Global Schema</h2>
    <p class="text-sm text-gray-500 mb-5">Organization schema that appears on <strong>all pages</strong> of the website.</p>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.seo.global.update') }}">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between mb-3">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Organization Schema (JSON-LD)</label>
                <span class="text-xs {{ $global->schema_markup ? 'text-green-600 bg-green-50' : 'text-gray-400 bg-gray-100' }} px-2.5 py-1 rounded-full font-medium">
                    {{ $global->schema_markup ? 'Active' : 'Not Set' }}
                </span>
            </div>

            <p class="text-xs text-gray-400 mb-3">This schema is injected on every frontend page. Use it for your Organization, WebSite, or LocalBusiness structured data.</p>

            <textarea name="organization_schema" id="orgSchema" rows="12"
                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs font-mono focus:outline-none focus:ring-2 focus:ring-green-500 resize-y"
                placeholder="Paste Organization JSON-LD schema here...">{{ old('organization_schema', $global->schema_markup) }}</textarea>

            <div class="flex items-center justify-between mt-3">
                <span class="text-xs text-gray-400" id="orgSchemaStatus"></span>
                <div class="flex items-center gap-3">
                    <button type="button" id="validateOrgSchema"
                            class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 px-3 py-1.5 rounded-lg transition-colors font-medium">
                        Validate JSON
                    </button>
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-5 py-2 rounded-xl transition-colors shadow-sm">
                        Save Global Schema
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('validateOrgSchema').addEventListener('click', function() {
    const val = document.getElementById('orgSchema').value.trim();
    const status = document.getElementById('orgSchemaStatus');
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
</script>

@endsection
