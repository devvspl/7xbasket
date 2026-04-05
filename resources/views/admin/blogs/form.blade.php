@extends('layouts.admin')
@section('title', $blog->exists ? 'Edit Blog' : 'New Blog')

@section('content')

<form action="{{ $blog->exists ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}"
      method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
    @if($blog->exists) @method('PUT') @endif

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5 text-sm text-red-700">
        <ul class="space-y-1">@foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <div class="flex flex-col xl:flex-row gap-5">

        {{-- ── LEFT: Main content ── --}}
        <div class="flex-1 min-w-0 space-y-4">

            {{-- Title --}}
            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="titleInput" value="{{ old('title', $blog->title) }}" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-base font-semibold text-gray-900
                           focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    placeholder="Enter blog title...">
            </div>

            {{-- Slug --}}
            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">URL Slug</label>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-400 flex-shrink-0">/blogs/</span>
                    <input type="text" name="slug" id="slugInput" value="{{ old('slug', $blog->slug) }}"
                        class="flex-1 border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-mono text-gray-700
                               focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="auto-generated-from-title">
                    <button type="button" id="regenSlug"
                            class="flex-shrink-0 text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 px-3 py-2.5 rounded-xl transition-colors font-medium">
                        Regenerate
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-1.5">Leave blank to auto-generate from title. Only lowercase letters, numbers and hyphens.</p>
            </div>

            {{-- Excerpt --}}
            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Excerpt</label>
                <textarea name="excerpt" rows="2" maxlength="500"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700
                           focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                    placeholder="Short summary shown in blog listings (max 500 chars)...">{{ old('excerpt', $blog->excerpt) }}</textarea>
            </div>

            {{-- Content Editor --}}
            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Content <span class="text-red-500">*</span></label>
                <textarea name="content" id="blogContent">{{ old('content', $blog->content) }}</textarea>
            </div>

        </div>

        {{-- ── RIGHT: Sidebar options ── --}}
        <div class="w-full xl:w-80 space-y-4 flex-shrink-0">

            {{-- Publish --}}
            <div class="stat-card">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Publish</p>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-medium text-gray-700">Status</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" name="is_published" value="1" id="publishToggle"
                               {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-10 h-5 bg-gray-200 peer-focus:ring-2 peer-focus:ring-green-500 rounded-full peer
                                    peer-checked:after:translate-x-5 peer-checked:bg-green-500
                                    after:content-[''] after:absolute after:top-0.5 after:left-0.5
                                    after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        <span class="ml-2 text-sm text-gray-600 peer-checked:text-green-600 font-medium" id="publishLabel">
                            {{ old('is_published', $blog->is_published) ? 'Published' : 'Draft' }}
                        </span>
                    </label>
                </div>
                @if($blog->published_at)
                <p class="text-xs text-gray-400">Published: {{ $blog->published_at->format('M d, Y') }}</p>
                @endif
                <div class="flex gap-2 mt-4">
                    <button type="submit"
                            class="flex-1 bg-green-600 text-white font-semibold py-2.5 rounded-xl hover:bg-green-700 transition-colors text-sm">
                        {{ $blog->exists ? 'Update' : 'Save' }}
                    </button>
                    <a href="{{ route('admin.blogs.index') }}"
                       class="flex-1 bg-gray-100 text-gray-700 font-semibold py-2.5 rounded-xl hover:bg-gray-200 transition-colors text-sm text-center">
                        Cancel
                    </a>
                </div>
            </div>

            {{-- Featured Image --}}
            <div class="stat-card">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Featured Image</p>
                @if($blog->featured_image)
                <img id="imgPreview" src="{{ asset($blog->featured_image) }}"
                     class="w-full h-36 object-cover rounded-xl mb-3" alt="Featured image">
                @else
                <div id="imgPlaceholder" class="w-full h-36 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl flex items-center justify-center mb-3 cursor-pointer"
                     onclick="document.getElementById('featuredImageInput').click()">
                    <div class="text-center">
                        <svg class="w-8 h-8 text-gray-300 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-xs text-gray-400">Click to upload</p>
                    </div>
                </div>
                @endif
                <input type="file" name="featured_image" id="featuredImageInput" accept="image/*" class="hidden">
                <button type="button" onclick="document.getElementById('featuredImageInput').click()"
                        class="w-full text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 py-2 rounded-xl transition-colors font-medium">
                    {{ $blog->featured_image ? 'Change Image' : 'Upload Image' }}
                </button>
            </div>

            {{-- Category & Tags --}}
            <div class="stat-card space-y-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Categorization</p>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Category</label>
                    <input type="text" name="category" value="{{ old('category', $blog->category) }}"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="e.g. Business, Tips">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Tags <span class="text-gray-400">(comma separated)</span></label>
                    <input type="text" name="tags" value="{{ old('tags', $blog->tags) }}"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="franchise, grocery, tips">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Author</label>
                    <input type="text" name="author" value="{{ old('author', $blog->author ?? '7x Basket Team') }}"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            {{-- SEO Panel --}}
            <div class="stat-card space-y-4" x-data="{ seoOpen: true }">
                <button type="button" @click="seoOpen = !seoOpen"
                        class="flex items-center justify-between w-full">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">SEO Settings</p>
                    <svg :class="seoOpen ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="seoOpen" class="space-y-4">

                    {{-- SERP Preview --}}
                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase mb-2">Search Preview</p>
                        <p class="text-blue-600 text-sm font-medium leading-tight truncate" id="serpTitle">
                            {{ $blog->meta_title ?: $blog->title ?: 'Blog Title' }}
                        </p>
                        <p class="text-green-700 text-[11px] mt-0.5">/blogs/{{ $blog->slug ?: 'your-slug' }}</p>
                        <p class="text-gray-500 text-xs mt-1 line-clamp-2" id="serpDesc">
                            {{ $blog->meta_description ?: $blog->excerpt ?: 'Meta description will appear here...' }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">
                            Meta Title
                            <span class="text-gray-400 float-right" id="metaTitleCount">0/60</span>
                        </label>
                        <input type="text" name="meta_title" id="metaTitle"
                               value="{{ old('meta_title', $blog->meta_title) }}" maxlength="60"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Leave blank to use blog title">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">
                            Meta Description
                            <span class="text-gray-400 float-right" id="metaDescCount">0/160</span>
                        </label>
                        <textarea name="meta_description" id="metaDesc" rows="3" maxlength="160"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                            placeholder="Leave blank to use excerpt">{{ old('meta_description', $blog->meta_description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Meta Keywords</label>
                        <input type="text" name="meta_keywords"
                               value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="keyword1, keyword2">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">OG Image URL</label>
                        <input type="text" name="og_image"
                               value="{{ old('og_image', $blog->og_image) }}"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="https://... (leave blank to use featured image)">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Schema Markup (JSON-LD)</label>
                        <textarea name="schema_markup" rows="4"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-xs font-mono focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                            placeholder="{{ '{"@context":"https://schema.org",...}' }}">{{ old('schema_markup', $blog->schema_markup) }}</textarea>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>

{{-- TinyMCE 5 --}}
@php
    $uploadUrl  = route('admin.blogs.upload-image');
    $csrfToken  = csrf_token();
    $isExisting = $blog->exists ? 'true' : 'false';
    $blogExcerpt = addslashes($blog->excerpt ?? '');
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#blogContent',
    height: 520,
    menubar: 'file edit view insert format tools table',
    plugins: 'advlist lists link image table preview fullscreen charmap paste codesample code',
    toolbar: [
        'bold italic underline strikethrough | fontsizeselect fontselect | forecolor backcolor',
        'alignleft aligncenter alignright alignjustify | bullist numlist | indent outdent | blockquote',
        'link image table | codesample code | preview fullscreen | charmap'
    ].join(' | '),
    toolbar_mode: 'wrap',
    automatic_uploads: true,
    images_upload_url: '{{ $uploadUrl }}',
    images_upload_handler: function(blobInfo, success, failure) {
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '{{ $uploadUrl }}');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ $csrfToken }}');
        xhr.onload = function() {
            if (xhr.status !== 200) { failure('HTTP Error: ' + xhr.status); return; }
            var json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location !== 'string') { failure('Invalid JSON'); return; }
            success(json.location);
        };
        var formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },
    file_picker_types: 'image',
    file_picker_callback: function(callback, value, meta) {
        if (meta.filetype === 'image') {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function() {
                    var id = 'blobid' + Date.now();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    callback(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        }
    },
    content_style: 'body { font-family: Inter, sans-serif; font-size: 15px; line-height: 1.7; color: #374151; padding: 16px; }',
    skin: 'oxide',
    branding: false,
});

// ── Slug auto-generation ──
const titleInput = document.getElementById('titleInput');
const slugInput  = document.getElementById('slugInput');
const regenBtn   = document.getElementById('regenSlug');
let slugManuallyEdited = {{ $isExisting }};

function toSlug(str) {
    return str.toLowerCase().trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

titleInput.addEventListener('input', function() {
    if (!slugManuallyEdited) {
        slugInput.value = toSlug(this.value);
        updateSerp();
    }
    document.getElementById('serpTitle').textContent = document.getElementById('metaTitle').value || this.value;
});

slugInput.addEventListener('input', function() {
    slugManuallyEdited = true;
    updateSerp();
});

regenBtn.addEventListener('click', function() {
    slugInput.value = toSlug(titleInput.value);
    slugManuallyEdited = false;
    updateSerp();
});

// ── SERP preview live update ──
const metaTitle = document.getElementById('metaTitle');
const metaDesc  = document.getElementById('metaDesc');
const metaTitleCount = document.getElementById('metaTitleCount');
const metaDescCount  = document.getElementById('metaDescCount');
const fallbackExcerpt = '{{ $blogExcerpt }}';

function updateSerp() {
    document.getElementById('serpTitle').textContent = metaTitle.value || titleInput.value || 'Blog Title';
    document.getElementById('serpDesc').textContent  = metaDesc.value || fallbackExcerpt || 'Meta description will appear here...';
}

metaTitle.addEventListener('input', function() {
    metaTitleCount.textContent = this.value.length + '/60';
    metaTitleCount.className = this.value.length > 55 ? 'text-red-500 float-right' : 'text-gray-400 float-right';
    updateSerp();
});
metaDesc.addEventListener('input', function() {
    metaDescCount.textContent = this.value.length + '/160';
    metaDescCount.className = this.value.length > 150 ? 'text-red-500 float-right' : 'text-gray-400 float-right';
    updateSerp();
});

// Init counts
metaTitleCount.textContent = metaTitle.value.length + '/60';
metaDescCount.textContent  = metaDesc.value.length + '/160';

// ── Publish toggle label ──
const publishToggle = document.getElementById('publishToggle');
const publishLabel  = document.getElementById('publishLabel');
publishToggle.addEventListener('change', function() {
    publishLabel.textContent = this.checked ? 'Published' : 'Draft';
});

// ── Featured image preview ──
document.getElementById('featuredImageInput').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('imgPreview');
            var placeholder = document.getElementById('imgPlaceholder');
            if (!preview) {
                preview = document.createElement('img');
                preview.id = 'imgPreview';
                preview.className = 'w-full h-36 object-cover rounded-xl mb-3';
                if (placeholder) placeholder.replaceWith(preview);
            }
            preview.src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

@endsection

