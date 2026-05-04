@extends('layouts.admin')
@section('title', $blog->exists ? 'Edit Blog' : 'New Blog')

@section('content')

    @php
        $isPublished = old('is_published', $blog->is_published) ? true : false;
        $isExistingStr = $blog->exists ? 'true' : 'false';
        $blogExcerpt = addslashes($blog->excerpt ?? '');
        $metaIndex = old('meta_index', isset($blog->meta_index) ? $blog->meta_index : true) ? true : false;
        $metaFollow = old('meta_follow', isset($blog->meta_follow) ? $blog->meta_follow : true) ? true : false;
        $uploadUrl = route('admin.blogs.upload-image');
        $csrfToken = csrf_token();
    @endphp

    <form action="{{ $blog->exists ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}" method="POST"
        enctype="multipart/form-data" id="blogForm">
        @csrf
        @if ($blog->exists)
            @method('PUT')
        @endif

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5 text-sm text-red-700">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $e)
                        <li>• {{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-col xl:flex-row gap-5">

            {{-- LEFT: Main content --}}
            <div class="flex-1 min-w-0 space-y-4">

                <div class="stat-card">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Title <span
                            class="text-red-500">*</span></label>
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
                    <p class="text-xs text-gray-400 mt-1.5">Leave blank to auto-generate. Only lowercase letters, numbers
                        and hyphens.</p>
                </div>

                <div class="stat-card">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Excerpt</label>
                    <textarea name="excerpt" rows="2" maxlength="500"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                        placeholder="Short summary (max 500 chars)...">{{ old('excerpt', $blog->excerpt) }}</textarea>
                </div>

                <div class="stat-card">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Content <span
                            class="text-red-500">*</span></label>

                    {{-- Hidden textarea for form submission --}}
                    <input type="hidden" name="content" id="blogContent">

                    {{-- TipTap Toolbar --}}
                    <div id="tiptap-toolbar"
                        class="flex flex-wrap items-center gap-1 border border-gray-200 rounded-t-xl px-3 py-2 bg-gray-50 border-b-0">
                        <button type="button" data-cmd="bold" title="Bold"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M15.6 10.79c.97-.67 1.65-1.77 1.65-2.79 0-2.26-1.75-4-4-4H7v14h7.04c2.09 0 3.71-1.7 3.71-3.79 0-1.52-.86-2.82-2.15-3.42zM10 6.5h3c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-3v-3zm3.5 9H10v-3h3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5z" />
                            </svg>
                        </button>
                        <button type="button" data-cmd="italic" title="Italic"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4z" />
                            </svg>
                        </button>
                        <button type="button" data-cmd="underline" title="Underline"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17c3.31 0 6-2.69 6-6V3h-2.5v8c0 1.93-1.57 3.5-3.5 3.5S8.5 12.93 8.5 11V3H6v8c0 3.31 2.69 6 6 6zm-7 2v2h14v-2H5z" />
                            </svg>
                        </button>
                        <button type="button" data-cmd="strike" title="Strikethrough"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 19h4v-3h-4v3zM5 4v3h5v3h4V7h5V4H5zM3 14h18v-2H3v2z" />
                            </svg>
                        </button>
                        <div class="w-px h-5 bg-gray-300 mx-1"></div>
                        <select id="headingSelect" title="Heading"
                            class="text-xs border border-gray-200 rounded px-2 py-1 bg-white focus:outline-none focus:ring-1 focus:ring-green-500">
                            <option value="0">Paragraph</option>
                            <option value="1">Heading 1</option>
                            <option value="2">Heading 2</option>
                            <option value="3">Heading 3</option>
                            <option value="4">Heading 4</option>
                        </select>
                        <div class="w-px h-5 bg-gray-300 mx-1"></div>
                        <button type="button" data-cmd="bulletList" title="Bullet List"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M4 10.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm0-6c-.83 0-1.5.67-1.5 1.5S3.17 7.5 4 7.5 5.5 6.83 5.5 6 4.83 4.5 4 4.5zm0 12c-.83 0-1.5.68-1.5 1.5s.68 1.5 1.5 1.5 1.5-.68 1.5-1.5-.67-1.5-1.5-1.5zM7 19h14v-2H7v2zm0-6h14v-2H7v2zm0-8v2h14V5H7z" />
                            </svg>
                        </button>
                        <button type="button" data-cmd="orderedList" title="Ordered List"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M2 17h2v.5H3v1h1v.5H2v1h3v-4H2v1zm1-9h1V4H2v1h1v3zm-1 3h1.8L2 13.1v.9h3v-1H3.2L5 10.9V10H2v1zm5-6v2h14V5H7zm0 14h14v-2H7v2zm0-6h14v-2H7v2z" />
                            </svg>
                        </button>
                        <button type="button" data-cmd="blockquote" title="Blockquote"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z" />
                            </svg>
                        </button>
                        <button type="button" data-cmd="codeBlock" title="Code Block"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                            </svg>
                        </button>
                        <div class="w-px h-5 bg-gray-300 mx-1"></div>
                        <button type="button" id="tiptap-link-btn" title="Insert Link"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z" />
                            </svg>
                        </button>
                        <button type="button" id="tiptap-image-btn" title="Insert Image"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" />
                            </svg>
                        </button>
                        <button type="button" id="tiptap-table-btn" title="Insert Table"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 3h18v18H3V3zm16 16V5H5v14h14zM7 7h4v4H7V7zm0 6h4v4H7v-4zm6-6h4v4h-4V7zm0 6h4v4h-4v-4z"/>
                            </svg>
                        </button>
                        <div class="w-px h-5 bg-gray-300 mx-1"></div>
                        <button type="button" data-cmd="undo" title="Undo"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.5 8c-2.65 0-5.05.99-6.9 2.6L2 7v9h9l-3.62-3.62c1.39-1.16 3.16-1.88 5.12-1.88 3.54 0 6.55 2.31 7.6 5.5l2.37-.78C21.08 11.03 17.15 8 12.5 8z" />
                            </svg>
                        </button>
                        <button type="button" data-cmd="redo" title="Redo"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.4 10.6C16.55 8.99 14.15 8 11.5 8c-4.65 0-8.58 3.03-9.96 7.22L3.9 16c1.05-3.19 4.05-5.5 7.6-5.5 1.95 0 3.73.72 5.12 1.88L13 16h9V7l-3.6 3.6z" />
                            </svg>
                        </button>
                        <div class="w-px h-5 bg-gray-300 mx-1"></div>
                        {{-- Text Color --}}
                        <div class="relative flex items-center" id="color-picker-wrap">
                            <button type="button" id="tiptap-color-btn" title="Text Color"
                                class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors flex flex-col items-center gap-0.5">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.17 8l-1.5-4h-1.34l-1.5 4H5.5l3.5-8h2l3.5 8h-3.33zM2 20h20v-2H2v2zM5.5 12l-1.5 4h2l.5-1.5h3l.5 1.5h2l-1.5-4h-5zm1.25-1h2.5L8 8.5 6.75 11z"/>
                                </svg>
                                <span id="color-indicator" class="w-4 h-1 rounded-full" style="background:#000000"></span>
                            </button>
                            {{-- Color dropdown --}}
                            <div id="color-dropdown" class="hidden absolute top-full left-0 mt-1 bg-white border border-gray-200 rounded-xl shadow-xl p-3 z-50 w-52">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Preset Colors</p>
                                <div class="grid grid-cols-8 gap-1.5 mb-3" id="color-swatches">
                                    @foreach(['#000000','#374151','#6b7280','#ffffff','#ef4444','#f97316','#f59e0b','#eab308','#22c55e','#109125','#055346','#14b8a6','#3b82f6','#6366f1','#8b5cf6','#ec4899'] as $c)
                                    <button type="button" data-color="{{ $c }}"
                                        class="color-swatch w-5 h-5 rounded-md border border-gray-200 hover:scale-110 transition-transform cursor-pointer"
                                        style="background:{{ $c }}" title="{{ $c }}"></button>
                                    @endforeach
                                </div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Custom Color</p>
                                <div class="flex items-center gap-2">
                                    <input type="color" id="color-custom" value="#000000"
                                        class="w-8 h-8 rounded-lg border border-gray-200 cursor-pointer p-0.5">
                                    <input type="text" id="color-hex" value="#000000" maxlength="7"
                                        class="flex-1 border border-gray-200 rounded-lg px-2 py-1.5 text-xs font-mono focus:outline-none focus:border-[#109125]"
                                        placeholder="#000000">
                                    <button type="button" id="color-apply"
                                        class="bg-[#109125] text-white text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-[#0d7a1e] transition-colors">
                                        Apply
                                    </button>
                                </div>
                                <button type="button" id="color-remove"
                                    class="w-full mt-2 text-xs text-gray-500 hover:text-red-600 font-medium py-1.5 rounded-lg hover:bg-red-50 transition-colors border border-gray-100">
                                    Remove Color
                                </button>
                            </div>
                        </div>
                        <button type="button" id="tiptap-html-btn" title="Toggle HTML Source"
                            class="tiptap-btn p-1.5 rounded hover:bg-gray-200 transition-colors ml-auto text-xs font-mono font-bold text-gray-500">
                            &lt;/&gt;
                        </button>
                    </div>

                    {{-- Table context toolbar (shown when cursor is in a table) --}}
                    <div id="table-context-toolbar" class="hidden flex flex-wrap items-center gap-1 border border-blue-200 bg-blue-50 px-3 py-1.5 text-xs">
                        <span class="text-blue-600 font-bold text-[10px] uppercase tracking-wider mr-1">Table:</span>
                        <button type="button" data-table-cmd="addColBefore" title="Add column before" class="table-ctx-btn px-2 py-1 rounded hover:bg-blue-100 text-blue-700 font-medium transition-colors">← Col</button>
                        <button type="button" data-table-cmd="addColAfter"  title="Add column after"  class="table-ctx-btn px-2 py-1 rounded hover:bg-blue-100 text-blue-700 font-medium transition-colors">Col →</button>
                        <button type="button" data-table-cmd="deleteCol"    title="Delete column"     class="table-ctx-btn px-2 py-1 rounded hover:bg-red-100 text-red-600 font-medium transition-colors">Del Col</button>
                        <div class="w-px h-4 bg-blue-200 mx-0.5"></div>
                        <button type="button" data-table-cmd="addRowBefore" title="Add row before"    class="table-ctx-btn px-2 py-1 rounded hover:bg-blue-100 text-blue-700 font-medium transition-colors">↑ Row</button>
                        <button type="button" data-table-cmd="addRowAfter"  title="Add row after"     class="table-ctx-btn px-2 py-1 rounded hover:bg-blue-100 text-blue-700 font-medium transition-colors">Row ↓</button>
                        <button type="button" data-table-cmd="deleteRow"    title="Delete row"        class="table-ctx-btn px-2 py-1 rounded hover:bg-red-100 text-red-600 font-medium transition-colors">Del Row</button>
                        <div class="w-px h-4 bg-blue-200 mx-0.5"></div>
                        <button type="button" data-table-cmd="mergeCells"      title="Merge cells"       class="table-ctx-btn px-2 py-1 rounded hover:bg-blue-100 text-blue-700 font-medium transition-colors">Merge</button>
                        <button type="button" data-table-cmd="splitCell"       title="Split cell"        class="table-ctx-btn px-2 py-1 rounded hover:bg-blue-100 text-blue-700 font-medium transition-colors">Split</button>
                        <button type="button" data-table-cmd="toggleHeaderRow" title="Toggle header row" class="table-ctx-btn px-2 py-1 rounded hover:bg-blue-100 text-blue-700 font-medium transition-colors">Header</button>
                        <div class="w-px h-4 bg-blue-200 mx-0.5"></div>
                        <button type="button" data-table-cmd="deleteTable" title="Delete table" class="table-ctx-btn px-2 py-1 rounded hover:bg-red-100 text-red-600 font-bold transition-colors">🗑 Delete Table</button>
                    </div>

                    {{-- TipTap Editor --}}
                    <div id="tiptap-editor"
                        class="min-h-[480px] border border-gray-200 rounded-b-xl px-5 py-4 focus:outline-none prose prose-sm max-w-none text-gray-800 bg-white overflow-y-auto"
                        style="font-family: Inter, sans-serif; font-size: 15px; line-height: 1.7;">
                    </div>

                    {{-- HTML Source View --}}
                    <textarea id="tiptap-html-source"
                        class="hidden w-full min-h-[480px] border border-gray-200 rounded-b-xl px-5 py-4 text-xs font-mono text-gray-700 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 resize-y"
                        placeholder="HTML source..."></textarea>

                    {{-- Hidden image upload input --}}
                    <input type="file" id="tiptap-image-upload" accept="image/*" class="hidden">
                </div>

                {{-- ── Link Insert Modal ── --}}
                <div id="link-modal" class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60 backdrop-blur-sm hidden p-4">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden flex flex-col" style="max-height:90vh">

                        {{-- Header --}}
                        <div class="flex items-center justify-between px-6 py-4 bg-[#055346] flex-shrink-0">
                            <div class="flex items-center gap-2.5">
                                <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>
                                </div>
                                <h3 class="font-bold text-white text-sm">Insert / Edit Link</h3>
                            </div>
                            <button type="button" id="link-modal-close" class="text-white/70 hover:text-white w-7 h-7 flex items-center justify-center rounded-lg hover:bg-white/10 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>

                        {{-- Body --}}
                        <div class="overflow-y-auto flex-1 px-6 py-5 space-y-5">

                            {{-- URL --}}
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">URL <span class="text-red-500">*</span></label>
                                <input type="url" id="link-url" placeholder="https://example.com"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] transition-colors">
                            </div>

                            {{-- Link Text --}}
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Link Text</label>
                                <input type="text" id="link-text" placeholder="Leave blank to keep selected text"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] transition-colors">
                                <p class="text-[11px] text-gray-400 mt-1">If blank, the currently selected text will be used.</p>
                            </div>

                            {{-- Open in new tab --}}
                            <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between border border-gray-200">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Open in new tab</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Adds <code class="bg-gray-200 px-1 py-0.5 rounded text-[11px] font-mono">target="_blank"</code> + <code class="bg-gray-200 px-1 py-0.5 rounded text-[11px] font-mono">rel="noopener"</code></p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer flex-shrink-0 ml-4">
                                    <input type="checkbox" id="link-new-tab" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-[#109125] after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-5"></div>
                                </label>
                            </div>

                            {{-- Rel attribute --}}
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Link Relationship <span class="text-gray-400 font-normal normal-case text-[11px]">(rel attribute)</span></label>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach([
                                        ['dofollow',  'Do Follow',   '✅', 'Passes SEO value to the linked page. Use for trusted links.'],
                                        ['nofollow',  'No Follow',   '🚫', 'Tells search engines not to follow or pass SEO value.'],
                                    ] as [$val, $label, $icon, $desc])
                                    <label class="flex items-start gap-2.5 cursor-pointer p-3 rounded-xl border-2 border-gray-200 hover:border-[#109125] hover:bg-green-50 transition-all">
                                        <input type="radio" name="link-rel" value="{{ $val }}" {{ $val === 'dofollow' ? 'checked' : '' }}
                                            class="mt-0.5 accent-green-600 flex-shrink-0 w-4 h-4">
                                        <div>
                                            <p class="text-xs font-bold text-gray-900">{{ $icon }} {{ $label }}</p>
                                            <p class="text-[10px] text-gray-500 leading-snug mt-0.5">{{ $desc }}</p>
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                            </div>



                        </div>

                        {{-- Footer --}}
                        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between gap-3 bg-gray-50 flex-shrink-0">
                            <button type="button" id="link-remove"
                                class="flex items-center gap-1.5 text-xs text-red-500 hover:text-red-700 font-semibold px-3 py-2 rounded-lg hover:bg-red-50 border border-transparent hover:border-red-100 transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                Remove Link
                            </button>
                            <div class="flex gap-2">
                                <button type="button" id="link-modal-cancel"
                                    class="text-xs bg-white hover:bg-gray-100 text-gray-700 font-semibold px-5 py-2.5 rounded-xl border border-gray-200 transition-colors">
                                    Cancel
                                </button>
                                <button type="button" id="link-insert"
                                    class="text-xs bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-6 py-2.5 rounded-xl transition-colors flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    Insert Link
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- ── Table Insert Modal ── --}}
                <div id="table-modal" class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60 backdrop-blur-sm hidden p-4">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm overflow-hidden">
                        <div class="flex items-center justify-between px-6 py-4 bg-[#055346]">
                            <div class="flex items-center gap-2.5">
                                <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h18v18H3V3zm16 16V5H5v14h14zM7 7h4v4H7V7zm0 6h4v4H7v-4zm6-6h4v4h-4V7zm0 6h4v4h-4v-4z"/></svg>
                                </div>
                                <h3 class="font-bold text-white text-sm">Insert Table</h3>
                            </div>
                            <button type="button" id="table-modal-close" class="text-white/70 hover:text-white w-7 h-7 flex items-center justify-center rounded-lg hover:bg-white/10 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="px-6 py-5 space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Rows</label>
                                    <input type="number" id="table-rows" value="3" min="1" max="20"
                                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] transition-colors text-center font-bold">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Columns</label>
                                    <input type="number" id="table-cols" value="3" min="1" max="10"
                                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] transition-colors text-center font-bold">
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between border border-gray-200">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Include header row</p>
                                    <p class="text-xs text-gray-500 mt-0.5">First row will be styled as a header</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer flex-shrink-0 ml-4">
                                    <input type="checkbox" id="table-header" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-[#109125] after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-5"></div>
                                </label>
                            </div>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-2 bg-gray-50">
                            <button type="button" id="table-modal-cancel"
                                class="text-xs bg-white hover:bg-gray-100 text-gray-700 font-semibold px-5 py-2.5 rounded-xl border border-gray-200 transition-colors">
                                Cancel
                            </button>
                            <button type="button" id="table-insert"
                                class="text-xs bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-6 py-2.5 rounded-xl transition-colors flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                Insert Table
                            </button>
                        </div>
                    </div>
                </div>

                <div class="stat-card space-y-4" x-data="{ seoOpen: true }">
                    <button type="button" @click="seoOpen = !seoOpen" class="flex items-center justify-between w-full">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">SEO Settings</p>
                        <svg :class="seoOpen ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="seoOpen" class="space-y-4">

                        {{-- SERP Preview --}}
                        <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                            <p class="text-[10px] font-semibold text-gray-400 uppercase mb-2">Search Preview</p>
                            <p class="text-blue-600 text-sm font-medium leading-tight truncate" id="serpTitle">
                                {{ $blog->meta_title ?: $blog->title ?: 'Blog Title' }}</p>
                            <p class="text-green-700 text-[11px] mt-0.5">/blogs/{{ $blog->slug ?: 'your-slug' }}</p>
                            <p class="text-gray-500 text-xs mt-1 line-clamp-2" id="serpDesc">
                                {{ $blog->meta_description ?: $blog->excerpt ?: 'Meta description will appear here...' }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1.5">Meta Title <span
                                        class="text-gray-400 float-right" id="metaTitleCount">0/60</span></label>
                                <input type="text" name="meta_title" id="metaTitle"
                                    value="{{ old('meta_title', $blog->meta_title) }}" maxlength="60"
                                    class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                                    placeholder="Leave blank to use blog title">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1.5">Meta Keywords</label>
                                <input type="text" name="meta_keywords"
                                    value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                                    class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                                    placeholder="keyword1, keyword2">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1.5">Meta Description <span
                                    class="text-gray-400 float-right" id="metaDescCount">0/160</span></label>
                            <textarea name="meta_description" id="metaDesc" rows="2" maxlength="160"
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                                placeholder="Leave blank to use excerpt">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1.5">OG Image URL</label>
                                <input type="text" name="og_image" value="{{ old('og_image', $blog->og_image) }}"
                                    class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                                    placeholder="Leave blank to use featured image">
                            </div>
                            <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 space-y-2">
                                <p class="text-[10px] font-semibold text-gray-400 uppercase mb-1">Indexing & Crawling</p>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="meta_index" value="1"
                                        {{ $metaIndex ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="text-xs text-gray-600">Allow indexing</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="meta_follow" value="1"
                                        {{ $metaFollow ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="text-xs text-gray-600">Allow link following</span>
                                </label>
                            </div>
                        </div>

                        {{-- Schema Markup --}}
                        <div class="border-t border-gray-100 pt-4 space-y-3">
                            <div class="flex items-center justify-between">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Schema Markup
                                    (JSON-LD)</p>
                            </div>
                            <div class="space-y-3" id="schemaList">
                                @php
                                    $existingSchemas = $blog->exists ? $blog->schemas : collect();
                                    $schemaTypeOptions = [
                                        'BlogPosting',
                                        'Article',
                                        'NewsArticle',
                                        'FAQPage',
                                        'HowTo',
                                        'Product',
                                        'LocalBusiness',
                                    ];
                                @endphp
                                @if ($existingSchemas->isEmpty())
                                    <p class="text-xs text-gray-400 text-center py-2" id="schemaEmpty">No schema entries
                                        yet. Click "Add Schema" to add one.</p>
                                @else
                                    @foreach ($existingSchemas as $schema)
                                        <div
                                            class="schema-entry border border-gray-200 rounded-xl p-3 space-y-2 bg-gray-50">
                                            <div class="flex items-center gap-2">
                                                <select name="schema_type[]"
                                                    class="flex-1 border border-gray-200 rounded-lg px-3 py-1.5 text-xs focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">
                                                    <?php foreach ($schemaTypeOptions as $st): ?>
                                                    <option value="<?= $st ?>"
                                                        <?= $schema->schema_type === $st ? 'selected' : '' ?>><?= $st ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <button type="button" onclick="this.closest('.schema-entry').remove()"
                                                    class="text-red-400 hover:text-red-600 transition-colors flex-shrink-0">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <textarea name="schema_markup[]" rows="5"
                                                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs font-mono focus:outline-none focus:ring-2 focus:ring-green-500 resize-y"
                                                placeholder="">{{ $schema->schema_markup }}</textarea>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" id="addSchemaBtn"
                                class="w-full text-xs border border-dashed border-green-300 text-green-600 hover:bg-green-50 py-2 rounded-xl transition-colors font-medium">
                                + Add Schema
                            </button>
                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT: Sidebar --}}
            <div class="w-full xl:w-80 flex-shrink-0">

                {{-- Publish --}}
                <div class="stat-card">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Publish</p>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium text-gray-700">Status</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" value="1" id="publishToggle"
                                {{ $isPublished ? 'checked' : '' }} class="sr-only peer">
                            <div
                                class="w-10 h-5 bg-gray-200 peer-focus:ring-2 peer-focus:ring-green-500 rounded-full peer peer-checked:after:translate-x-5 peer-checked:bg-green-500 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all">
                            </div>
                            <span class="ml-2 text-sm text-gray-600 peer-checked:text-green-600 font-medium"
                                id="publishLabel">
                                {{ $isPublished ? 'Published' : 'Draft' }}
                            </span>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        @if ($blog->published_at)
                            <p class="text-xs text-gray-400">
                                Published: {{ $blog->published_at->format('M d, Y') }}
                            </p>
                        @endif
                        @if ($blog->exists && $blog->slug)
                            <a href="{{ route('blogs.show', $blog->slug) }}" target="_blank"
                                class="flex items-center gap-2 text-xs text-[#109125] hover:text-[#0d7a1e] font-semibold transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Visit Blog
                            </a>
                        @endif
                    </div>
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
                    @if ($blog->featured_image)
                        <img id="imgPreview" src="{{ asset($blog->featured_image) }}"
                            class="w-full h-36 object-cover rounded-xl mb-3" alt="Featured image">
                    @else
                        <div id="imgPlaceholder"
                            class="w-full h-36 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl flex items-center justify-center mb-3 cursor-pointer"
                            onclick="document.getElementById('featuredImageInput').click()">
                            <div class="text-center">
                                <svg class="w-8 h-8 text-gray-300 mx-auto mb-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-xs text-gray-400">Click to upload</p>
                            </div>
                        </div>
                    @endif
                    <input type="file" name="featured_image" id="featuredImageInput" accept="image/*"
                        class="hidden">
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
                        <svg :class="catOpen ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="catOpen" class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1.5">Category</label>
                            <input type="text" name="category" id="categoryInput"
                                value="{{ old('category', $blog->category) }}" list="categoryList"
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                                placeholder="Type or select...">
                            <datalist id="categoryList">
                                @foreach ($categories ?? [] as $cat)
                                    <option value="{{ $cat }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1.5">Tags <span
                                    class="text-gray-400">(comma separated)</span></label>
                            <input type="text" name="tags" id="tagsInput" value="{{ old('tags', $blog->tags) }}"
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                                placeholder="franchise, grocery, tips">
                            <div class="flex flex-wrap gap-1.5 mt-2">
                                @foreach ($allTags ?? [] as $tag)
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

            </div>
        </div>
    </form>

    @include('admin.blogs._tiptap_script')

@endsection
