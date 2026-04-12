@extends('layouts.admin')
@section('title', $blog->exists ? 'Edit Blog' : 'New Blog')

@section('content')

@php
    $isPublished   = old('is_published', $blog->is_published) ? true : false;
    $isExistingStr = $blog->exists ? 'true' : 'false';
    $blogExcerpt   = addslashes($blog->excerpt ?? '');
    $metaIndex     = old('meta_index',  isset($blog->meta_index)  ? $blog->meta_index  : true) ? true : false;
    $metaFollow    = old('meta_follow', isset($blog->meta_follow) ? $blog->meta_follow : true) ? true : false;
    $schemaType    = old('schema_type',   $blog->schema_type   ?? 'BlogPosting');
    $schemaMarkup  = old('schema_markup', $blog->schema_markup ?? '');
    $uploadUrl     = route('admin.blogs.upload-image');
    $csrfToken     = csrf_token();
    $schemaDefaults = json_encode([
        'title'   => $blog->title ?? '',
        'desc'    => $blog->excerpt ?? '',
        'baseUrl' => url('/blogs'),
        'date'    => $blog->published_at ? $blog->published_at->toIso8601String() : now()->toIso8601String(),
        'image'   => $blog->featured_image ? asset($blog->featured_image) : '',
        'logo'    => asset('custom/logo.png'),
        'siteUrl' => url('/'),
    ]);
    $schemaTypes = ['BlogPosting','Article','NewsArticle','FAQPage','HowTo','Product','LocalBusiness'];
@endphp

<form action="{{ $blog->exists ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}"
      method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
    @if($blog->exists)
    @method('PUT')
    @endif

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5 text-sm text-red-700">
        <ul class="space-y-1">
            @foreach($errors->all() as $e)
            <li>• {{ $e }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="flex flex-col xl:flex-row gap-5">

        {{-- LEFT: Main content --}}
        <div class="flex-1 min-w-0 space-y-4">

            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="titleInput" value="{{ old('title', $blog->title) }}" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-base font-semibold text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Enter blog title...">
            </div>

            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">URL Slug</label>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-400 flex-shrink-0">/blogs/</span>
                    <input type="text" name="slug" id="slugInput" value="{{ old('slug', $blog->slug) }}"
                        class="flex-1 border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-mono text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="auto-generated-from-title">
                    <button type="button" id="regenSlug"
                            class="flex-shrink-0 text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 px-3 py-2.5 rounded-xl transition-colors font-medium">
                        Regenerate
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-1.5">Leave blank to auto-generate. Only lowercase letters, numbers and hyphens.</p>
            </div>

            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Excerpt</label>
                <textarea name="excerpt" rows="2" maxlength="500"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                    placeholder="Short summary (max 500 chars)...">{{ old('excerpt', $blog->excerpt) }}</textarea>
            </div>

            <div class="stat-card">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Content <span class="text-red-500">*</span></label>
                <textarea name="content" id="blogContent">{{ old('content', $blog->content) }}</textarea>
            </div>

        </div>

        {{-- RIGHT: Sidebar --}}
        <div class="w-full xl:w-80 space-y-4 flex-shrink-0">

            {{-- Publish --}}
            <div class="stat-card">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Publish</p>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-medium text-gray-700">Status</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" name="is_published" value="1" id="publishToggle"
                               {{ $isPublished ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-10 h-5 bg-gray-200 peer-focus:ring-2 peer-focus:ring-green-500 rounded-full peer peer-checked:after:translate-x-5 peer-checked:bg-green-500 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        <span class="ml-2 text-sm text-gray-600 peer-checked:text-green-600 font-medium" id="publishLabel">
                            {{ $isPublished ? 'Published' : 'Draft' }}
                        </span>
                    </label>
                </div>
                @if($blog->published_at)
                <p class="text-xs text-gray-400">Published: {{ $blog->published_at->format('M d, Y') }}</p>
                @endif
                <div class="flex gap-2 mt-4">
                    <button type="submit" class="flex-1 bg-green-600 text-white font-semibold py-2.5 rounded-xl hover:bg-green-700 transition-colors text-sm">
                        {{ $blog->exists ? 'Update' : 'Save' }}
                    </button>
                    <a href="{{ route('admin.blogs.index') }}" class="flex-1 bg-gray-100 text-gray-700 font-semibold py-2.5 rounded-xl hover:bg-gray-200 transition-colors text-sm text-center">
                        Cancel
                    </a>
                </div>
            </div>

            {{-- Featured Image --}}
            <div class="stat-card">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Featured Image</p>
                @if($blog->featured_image)
                <img id="imgPreview" src="{{ asset($blog->featured_image) }}" class="w-full h-36 object-cover rounded-xl mb-3" alt="Featured image">
                @else
                <div id="imgPlaceholder" class="w-full h-36 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl flex items-center justify-center mb-3 cursor-pointer"
                     onclick="document.getElementById('featuredImageInput').click()">
                    <div class="text-center">
                        <svg class="w-8 h-8 text-gray-300 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-xs text-gray-400">Click to upload</p>
                    </div>
                </div>
                @endif
                <input type="file" name="featured_image" id="featuredImageInput" accept="image/*" class="hidden">
                <button type="button" onclick="document.getElementById('featuredImageInput').click()"
                        class="w-full text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 py-2 rounded-xl transition-colors font-medium">
                    {{ $blog->featured_image ? 'Change Image' : 'Upload Image' }}
                </button>
                <div class="mt-3">
                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Image Alt Text</label>
                    <input type="text" name="featured_image_alt"
                           value="{{ old('featured_image_alt', $blog->featured_image_alt) }}"
                           placeholder="Describe the image for SEO & accessibility"
                           class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            {{-- Categorization --}}
            <div class="stat-card space-y-4" x-data="{ catOpen: true }">
                <button type="button" @click="catOpen = !catOpen" class="flex items-center justify-between w-full">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Categorization</p>
                    <svg :class="catOpen ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="catOpen" class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Category</label>
                        <input type="text" name="category" id="categoryInput"
                               value="{{ old('category', $blog->category) }}"
                               list="categoryList"
                               class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                               placeholder="Type or select...">
                        <datalist id="categoryList">
                            @foreach($categories ?? [] as $cat)
                                <option value="{{ $cat }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Tags <span class="text-gray-400">(comma separated)</span></label>
                        <input type="text" name="tags" id="tagsInput"
                               value="{{ old('tags', $blog->tags) }}"
                               class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                               placeholder="franchise, grocery, tips">
                        <div class="flex flex-wrap gap-1.5 mt-2">
                            @foreach($allTags ?? [] as $tag)
                            <button type="button" onclick="addTag('{{ $tag }}')"
                                class="text-[10px] bg-gray-100 hover:bg-green-50 hover:text-green-700 text-gray-500 px-2 py-0.5 rounded-full transition-colors border border-gray-200 hover:border-green-200">
                                + {{ $tag }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Author</label>
                        <input type="text" name="author"
                               value="{{ old('author', $blog->author ?? auth()->user()->name) }}"
                               class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
            </div>

            {{-- SEO Settings --}}
            <div class="stat-card space-y-4" x-data="{ seoOpen: true }">
                <button type="button" @click="seoOpen = !seoOpen" class="flex items-center justify-between w-full">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">SEO Settings</p>
                    <svg :class="seoOpen ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="seoOpen" class="space-y-4">

                    {{-- SERP Preview --}}
                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase mb-2">Search Preview</p>
                        <p class="text-blue-600 text-sm font-medium leading-tight truncate" id="serpTitle">{{ $blog->meta_title ?: $blog->title ?: 'Blog Title' }}</p>
                        <p class="text-green-700 text-[11px] mt-0.5">/blogs/{{ $blog->slug ?: 'your-slug' }}</p>
                        <p class="text-gray-500 text-xs mt-1 line-clamp-2" id="serpDesc">{{ $blog->meta_description ?: $blog->excerpt ?: 'Meta description will appear here...' }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Meta Title <span class="text-gray-400 float-right" id="metaTitleCount">0/60</span></label>
                        <input type="text" name="meta_title" id="metaTitle" value="{{ old('meta_title', $blog->meta_title) }}" maxlength="60"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Leave blank to use blog title">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Meta Description <span class="text-gray-400 float-right" id="metaDescCount">0/160</span></label>
                        <textarea name="meta_description" id="metaDesc" rows="3" maxlength="160"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                            placeholder="Leave blank to use excerpt">{{ old('meta_description', $blog->meta_description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="keyword1, keyword2">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">OG Image URL</label>
                        <input type="text" name="og_image" value="{{ old('og_image', $blog->og_image) }}"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Leave blank to use featured image">
                    </div>

                    {{-- Indexing --}}
                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 space-y-2">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase mb-1">Indexing & Crawling</p>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="meta_index" value="1" {{ $metaIndex ? 'checked' : '' }}
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                            <span class="text-xs text-gray-600">Allow search engines to index this page</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="meta_follow" value="1" {{ $metaFollow ? 'checked' : '' }}
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                            <span class="text-xs text-gray-600">Allow search engines to follow links</span>
                        </label>
                    </div>

                    {{-- Schema --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="text-xs font-medium text-gray-600">Schema Type</label>
                            <button type="button" id="generateSchemaBtn"
                                class="text-[10px] bg-green-50 hover:bg-green-100 text-green-700 px-2.5 py-1 rounded-lg font-semibold border border-green-200 transition-colors">
                                ⚡ Generate
                            </button>
                        </div>
                        <select name="schema_type" id="schemaTypeSelect"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white mb-3">
                            <option value="">None</option>
                            @foreach($schemaTypes as $st)
                            <option value="{{ $st }}" {{ $schemaType === $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Schema Markup (JSON-LD)</label>
                        <textarea name="schema_markup" id="schemaMarkup" rows="7"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-xs font-mono focus:outline-none focus:ring-2 focus:ring-green-500 resize-y"
                            placeholder='{"@context":"https://schema.org",...}'>{{ $schemaMarkup }}</textarea>
                        <p class="text-[10px] text-gray-400 mt-1">Click Generate to auto-fill a template.</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>

<script>const schemaDefaults = {!! $schemaDefaults !!};</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#blogContent',
    height: 520,
    menubar: 'file edit view insert format tools table',
    plugins: 'advlist lists link image table preview fullscreen charmap paste codesample code',
    toolbar: ['bold italic underline strikethrough | fontsizeselect fontselect | forecolor backcolor','alignleft aligncenter alignright alignjustify | bullist numlist | indent outdent | blockquote','link image table | codesample code | preview fullscreen | charmap'].join(' | '),
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
    file_picker_callback: function(cb, value, meta) {
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
                    cb(blobInfo.blobUri(), { title: file.name });
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

var titleInput = document.getElementById('titleInput');
var slugInput  = document.getElementById('slugInput');
var regenBtn   = document.getElementById('regenSlug');
var slugManuallyEdited = {{ $isExistingStr }};

function toSlug(str) {
    return str.toLowerCase().trim().replace(/[^\w\s-]/g,'').replace(/[\s_-]+/g,'-').replace(/^-+|-+$/g,'');
}

titleInput.addEventListener('input', function() {
    if (!slugManuallyEdited) slugInput.value = toSlug(this.value);
    updateSerp();
});
slugInput.addEventListener('input', function() { slugManuallyEdited = true; updateSerp(); });
regenBtn.addEventListener('click', function() { slugInput.value = toSlug(titleInput.value); slugManuallyEdited = false; updateSerp(); });

var metaTitle      = document.getElementById('metaTitle');
var metaDesc       = document.getElementById('metaDesc');
var metaTitleCount = document.getElementById('metaTitleCount');
var metaDescCount  = document.getElementById('metaDescCount');

function updateSerp() {
    document.getElementById('serpTitle').textContent = metaTitle.value || titleInput.value || 'Blog Title';
    document.getElementById('serpDesc').textContent  = metaDesc.value || schemaDefaults.desc || 'Meta description...';
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
metaTitleCount.textContent = metaTitle.value.length + '/60';
metaDescCount.textContent  = metaDesc.value.length + '/160';

document.getElementById('publishToggle').addEventListener('change', function() {
    document.getElementById('publishLabel').textContent = this.checked ? 'Published' : 'Draft';
});

document.getElementById('generateSchemaBtn').addEventListener('click', function() {
    var s      = schemaDefaults;
    var type   = document.getElementById('schemaTypeSelect').value;
    var title  = titleInput.value || s.title;
    var desc   = metaDesc.value || s.desc;
    var url    = s.baseUrl + '/' + slugInput.value;
    var author = document.querySelector('[name="author"]').value || '7x Basket Team';
    var map = {
        BlogPosting:   {'@context':'https://schema.org','@type':'BlogPosting','headline':title,'description':desc,'url':url,'datePublished':s.date,'author':{'@type':'Person','name':author},'publisher':{'@type':'Organization','name':'7x Basket','logo':{'@type':'ImageObject','url':s.logo}},'image':s.image},
        Article:       {'@context':'https://schema.org','@type':'Article','headline':title,'description':desc,'url':url,'datePublished':s.date,'author':{'@type':'Person','name':author},'publisher':{'@type':'Organization','name':'7x Basket'},'image':s.image},
        NewsArticle:   {'@context':'https://schema.org','@type':'NewsArticle','headline':title,'description':desc,'url':url,'datePublished':s.date,'author':{'@type':'Person','name':author},'image':s.image},
        FAQPage:       {'@context':'https://schema.org','@type':'FAQPage','mainEntity':[{'@type':'Question','name':'Question 1?','acceptedAnswer':{'@type':'Answer','text':'Answer 1'}}]},
        HowTo:         {'@context':'https://schema.org','@type':'HowTo','name':title,'description':desc,'step':[{'@type':'HowToStep','name':'Step 1','text':'Describe step 1'}]},
        Product:       {'@context':'https://schema.org','@type':'Product','name':title,'description':desc,'image':s.image,'brand':{'@type':'Brand','name':'7x Basket'}},
        LocalBusiness: {'@context':'https://schema.org','@type':'LocalBusiness','name':'7x Basket','description':desc,'url':s.siteUrl,'telephone':'+91 9870275327','address':{'@type':'PostalAddress','streetAddress':'C-97, Lajpat Nagar','addressLocality':'New Delhi','addressCountry':'IN'}},
    };
    if (map[type]) document.getElementById('schemaMarkup').value = JSON.stringify(map[type], null, 2);
});

function addTag(tag) {
    var input = document.getElementById('tagsInput');
    var current = input.value.split(',').map(function(t){ return t.trim(); }).filter(Boolean);
    if (!current.includes(tag)) { current.push(tag); input.value = current.join(', '); }
}

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