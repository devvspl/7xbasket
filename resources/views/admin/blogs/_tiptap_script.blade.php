<script>
window._tiptapConfig = {
    uploadUrl:      '{{ $uploadUrl }}',
    csrfToken:      '{{ $csrfToken }}',
    initialContent: {!! json_encode(old('content', $blog->content ?? '')) !!},
    isExisting:     {{ $isExistingStr }},
};
</script>
@verbatim
<script type="module">
import { Editor } from 'https://esm.sh/@tiptap/core@2.11.5';
import StarterKit from 'https://esm.sh/@tiptap/starter-kit@2.11.5';
import Underline from 'https://esm.sh/@tiptap/extension-underline@2.11.5';
import Link from 'https://esm.sh/@tiptap/extension-link@2.11.5';
import Image from 'https://esm.sh/@tiptap/extension-image@2.11.5';
import Placeholder from 'https://esm.sh/@tiptap/extension-placeholder@2.11.5';
import Table from 'https://esm.sh/@tiptap/extension-table@2.11.5';
import TableRow from 'https://esm.sh/@tiptap/extension-table-row@2.11.5';
import TableCell from 'https://esm.sh/@tiptap/extension-table-cell@2.11.5';
import TableHeader from 'https://esm.sh/@tiptap/extension-table-header@2.11.5';
import TextStyle from 'https://esm.sh/@tiptap/extension-text-style@2.11.5';
import Color from 'https://esm.sh/@tiptap/extension-color@2.11.5';

const { uploadUrl, csrfToken, initialContent, isExisting } = window._tiptapConfig;

// ── Init Editor ──────────────────────────────────────────────────────────────
const editor = new Editor({
    element: document.getElementById('tiptap-editor'),
    extensions: [
        StarterKit,
        Underline,
        TextStyle,
        Color,
        Link.configure({ openOnClick: false, HTMLAttributes: { class: 'text-blue-600 underline' } }),
        Image.configure({ inline: false, HTMLAttributes: { class: 'max-w-full rounded-lg my-2' } }),
        Placeholder.configure({ placeholder: 'Start writing your blog content here...' }),
        Table.configure({ resizable: false }),
        TableRow,
        TableCell,
        TableHeader,
    ],
    content: initialContent || '',
    editorProps: { attributes: { class: 'focus:outline-none min-h-[440px]' } },
    onUpdate({ editor }) {
        document.getElementById('blogContent').value = editor.getHTML();
        if (!htmlMode) document.getElementById('tiptap-html-source').value = editor.getHTML();
        updateToolbarState();
    },
});

document.getElementById('blogContent').value = editor.getHTML();

// ── Toolbar state ────────────────────────────────────────────────────────────
function updateToolbarState() {
    document.querySelectorAll('.tiptap-btn[data-cmd]').forEach(btn => {
        const cmd = btn.dataset.cmd;
        const active = editor.isActive(cmd);
        btn.classList.toggle('bg-gray-200', active);
        btn.classList.toggle('text-green-700', active);
    });
    const sel = document.getElementById('headingSelect');
    let level = 0;
    for (let i = 1; i <= 4; i++) { if (editor.isActive('heading', { level: i })) { level = i; break; } }
    sel.value = level;
}
editor.on('selectionUpdate', updateToolbarState);
editor.on('transaction', updateToolbarState);

// ── Color Picker ─────────────────────────────────────────────────────────────
const colorDropdown  = document.getElementById('color-dropdown');
const colorIndicator = document.getElementById('color-indicator');
const colorCustom    = document.getElementById('color-custom');
const colorHex       = document.getElementById('color-hex');

function applyColor(color) {
    editor.chain().focus().setColor(color).run();
    colorIndicator.style.background = color;
    colorCustom.value = color;
    colorHex.value    = color;
    colorDropdown.classList.add('hidden');
}

// Toggle dropdown
document.getElementById('tiptap-color-btn').addEventListener('mousedown', e => {
    e.preventDefault();
    colorDropdown.classList.toggle('hidden');
    // Show current color
    const current = editor.getAttributes('textStyle').color || '#000000';
    colorIndicator.style.background = current;
    colorCustom.value = current;
    colorHex.value    = current;
});

// Preset swatches
document.querySelectorAll('.color-swatch').forEach(btn => {
    btn.addEventListener('click', () => applyColor(btn.dataset.color));
});

// Custom color picker sync
colorCustom.addEventListener('input', () => {
    colorHex.value = colorCustom.value;
});

// Hex input sync
colorHex.addEventListener('input', () => {
    if (/^#[0-9a-fA-F]{6}$/.test(colorHex.value)) {
        colorCustom.value = colorHex.value;
    }
});

// Apply button
document.getElementById('color-apply').addEventListener('click', () => {
    applyColor(colorCustom.value);
});

// Remove color
document.getElementById('color-remove').addEventListener('click', () => {
    editor.chain().focus().unsetColor().run();
    colorIndicator.style.background = '#000000';
    colorDropdown.classList.add('hidden');
});

// Close dropdown on outside click
document.addEventListener('click', e => {
    if (!document.getElementById('color-picker-wrap').contains(e.target)) {
        colorDropdown.classList.add('hidden');
    }
});

// ── Toolbar buttons ──────────────────────────────────────────────────────────
document.querySelectorAll('.tiptap-btn[data-cmd]').forEach(btn => {
    btn.addEventListener('mousedown', e => {
        e.preventDefault();
        const cmd = btn.dataset.cmd;
        const chain = editor.chain().focus();
        switch (cmd) {
            case 'bold':        chain.toggleBold().run(); break;
            case 'italic':      chain.toggleItalic().run(); break;
            case 'underline':   chain.toggleUnderline().run(); break;
            case 'strike':      chain.toggleStrike().run(); break;
            case 'bulletList':  chain.toggleBulletList().run(); break;
            case 'orderedList': chain.toggleOrderedList().run(); break;
            case 'blockquote':  chain.toggleBlockquote().run(); break;
            case 'codeBlock':   chain.toggleCodeBlock().run(); break;
            case 'undo':        chain.undo().run(); break;
            case 'redo':        chain.redo().run(); break;
        }
    });
});

document.getElementById('headingSelect').addEventListener('change', function () {
    const level = parseInt(this.value);
    if (level === 0) editor.chain().focus().setParagraph().run();
    else editor.chain().focus().toggleHeading({ level }).run();
});

// ── Link Modal ───────────────────────────────────────────────────────────────
const linkModal       = document.getElementById('link-modal');
const linkUrlInput    = document.getElementById('link-url');
const linkTextInput   = document.getElementById('link-text');
const linkNewTab      = document.getElementById('link-new-tab');

function openLinkModal() {
    const attrs = editor.getAttributes('link');
    linkUrlInput.value   = attrs.href   || '';
    linkNewTab.checked   = attrs.target === '_blank';

    // Pre-fill rel radio
    const rel = attrs.rel || 'dofollow';
    const relRadio = document.querySelector(`input[name="link-rel"][value="${rel}"]`);
    if (relRadio) relRadio.checked = true;
    else { const df = document.querySelector('input[name="link-rel"][value="dofollow"]'); if (df) df.checked = true; }

    // Pre-fill link text from selection
    const { from, to } = editor.state.selection;
    const selectedText = editor.state.doc.textBetween(from, to, '');
    linkTextInput.value = selectedText || '';

    linkModal.classList.remove('hidden');
    setTimeout(() => linkUrlInput.focus(), 50);
}

function closeLinkModal() {
    linkModal.classList.add('hidden');
}

document.getElementById('tiptap-link-btn').addEventListener('click', openLinkModal);
document.getElementById('link-modal-close').addEventListener('click', closeLinkModal);
document.getElementById('link-modal-cancel').addEventListener('click', closeLinkModal);
linkModal.addEventListener('click', e => { if (e.target === linkModal) closeLinkModal(); });

document.getElementById('link-insert').addEventListener('click', () => {
    const url = linkUrlInput.value.trim();
    if (!url) { linkUrlInput.focus(); return; }

    const newTab  = linkNewTab.checked;
    const relVal  = document.querySelector('input[name="link-rel"]:checked')?.value || 'dofollow';
    const text    = linkTextInput.value.trim();

    // Build rel string
    let relParts = [];
    if (newTab) relParts.push('noopener', 'noreferrer');
    if (relVal !== 'dofollow') relParts.push(relVal);
    const relStr = relParts.length ? relParts.join(' ') : undefined;

    const attrs = {
        href:   url,
        target: newTab ? '_blank' : null,
        rel:    relStr || null,
    };

    // If custom link text provided, replace selection
    if (text) {
        editor.chain().focus()
            .insertContent(`<a href="${url}"${newTab ? ' target="_blank"' : ''}${relStr ? ` rel="${relStr}"` : ''}>${text}</a>`)
            .run();
    } else {
        editor.chain().focus().setLink(attrs).run();
    }

    closeLinkModal();
});

document.getElementById('link-remove').addEventListener('click', () => {
    editor.chain().focus().unsetLink().run();
    closeLinkModal();
});

// Close on Escape
document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && !linkModal.classList.contains('hidden')) closeLinkModal();
});

document.getElementById('tiptap-image-btn').addEventListener('click', () => {
    document.getElementById('tiptap-image-upload').click();
});

document.getElementById('tiptap-image-upload').addEventListener('change', async function () {
    const file = this.files[0];
    if (!file) return;
    const formData = new FormData();
    formData.append('file', file);
    try {
        const res  = await fetch(uploadUrl, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrfToken }, body: formData });
        const json = await res.json();
        if (json.location) editor.chain().focus().setImage({ src: json.location, alt: file.name }).run();
    } catch (e) { alert('Image upload failed.'); }
    this.value = '';
});

// ── Image remove: click image in editor → show remove button ─────────────────
const imgMenu = document.createElement('div');
imgMenu.id = 'img-context-menu';
imgMenu.className = 'hidden fixed z-[1000] bg-white border border-gray-200 rounded-xl shadow-xl p-1';
imgMenu.innerHTML = `
    <button type="button" id="img-remove-btn" class="flex items-center gap-2 px-3 py-2 text-xs text-red-600 hover:bg-red-50 rounded-lg w-full font-semibold transition-colors">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
        Remove Image
    </button>
    <button type="button" id="img-replace-btn" class="flex items-center gap-2 px-3 py-2 text-xs text-gray-700 hover:bg-gray-50 rounded-lg w-full font-semibold transition-colors">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        Replace Image
    </button>`;
document.body.appendChild(imgMenu);

document.getElementById('tiptap-editor').addEventListener('click', e => {
    if (e.target.tagName === 'IMG') {
        imgMenu.style.top  = (e.clientY + 8) + 'px';
        imgMenu.style.left = (e.clientX + 8) + 'px';
        imgMenu.classList.remove('hidden');
        imgMenu._target = e.target;
    } else {
        imgMenu.classList.add('hidden');
    }
});
document.addEventListener('click', e => {
    if (!imgMenu.contains(e.target) && e.target.tagName !== 'IMG') imgMenu.classList.add('hidden');
});
document.getElementById('img-remove-btn').addEventListener('click', () => {
    editor.chain().focus().deleteSelection().run();
    imgMenu.classList.add('hidden');
});
document.getElementById('img-replace-btn').addEventListener('click', () => {
    document.getElementById('tiptap-image-upload').click();
    imgMenu.classList.add('hidden');
});

// ── Table ─────────────────────────────────────────────────────────────────────
const tableModal = document.getElementById('table-modal');
document.getElementById('tiptap-table-btn').addEventListener('click', () => {
    tableModal.classList.remove('hidden');
    document.getElementById('table-rows').value = 3;
    document.getElementById('table-cols').value = 3;
    document.getElementById('table-header').checked = true;
});
document.getElementById('table-modal-close').addEventListener('click', () => tableModal.classList.add('hidden'));
document.getElementById('table-modal-cancel').addEventListener('click', () => tableModal.classList.add('hidden'));
tableModal.addEventListener('click', e => { if (e.target === tableModal) tableModal.classList.add('hidden'); });

document.getElementById('table-insert').addEventListener('click', () => {
    const rows    = parseInt(document.getElementById('table-rows').value) || 3;
    const cols    = parseInt(document.getElementById('table-cols').value) || 3;
    const header  = document.getElementById('table-header').checked;
    editor.chain().focus().insertTable({ rows, cols, withHeaderRow: header }).run();
    tableModal.classList.add('hidden');
});

// Table context toolbar — shown when cursor is inside a table
function updateTableToolbar() {
    const toolbar = document.getElementById('table-context-toolbar');
    if (editor.isActive('table')) {
        toolbar.classList.remove('hidden');
    } else {
        toolbar.classList.add('hidden');
    }
}
editor.on('selectionUpdate', updateTableToolbar);
editor.on('transaction', updateTableToolbar);

document.querySelectorAll('.table-ctx-btn[data-table-cmd]').forEach(btn => {
    btn.addEventListener('mousedown', e => {
        e.preventDefault();
        const cmd = btn.dataset.tableCmd;
        const chain = editor.chain().focus();
        switch(cmd) {
            case 'addColBefore':    chain.addColumnBefore().run(); break;
            case 'addColAfter':     chain.addColumnAfter().run(); break;
            case 'deleteCol':       chain.deleteColumn().run(); break;
            case 'addRowBefore':    chain.addRowBefore().run(); break;
            case 'addRowAfter':     chain.addRowAfter().run(); break;
            case 'deleteRow':       chain.deleteRow().run(); break;
            case 'deleteTable':     chain.deleteTable().run(); break;
            case 'mergeCells':      chain.mergeCells().run(); break;
            case 'splitCell':       chain.splitCell().run(); break;
            case 'toggleHeaderRow': chain.toggleHeaderRow().run(); break;
        }
    });
});

// ── HTML source toggle ───────────────────────────────────────────────────────
let htmlMode = false;
document.getElementById('tiptap-html-btn').addEventListener('click', () => {
    htmlMode = !htmlMode;
    const editorEl = document.getElementById('tiptap-editor');
    const sourceEl = document.getElementById('tiptap-html-source');
    const btn      = document.getElementById('tiptap-html-btn');
    if (htmlMode) {
        sourceEl.value = editor.getHTML();
        editorEl.classList.add('hidden');
        sourceEl.classList.remove('hidden');
        btn.classList.add('bg-green-100', 'text-green-700');
    } else {
        editor.commands.setContent(sourceEl.value, false);
        document.getElementById('blogContent').value = editor.getHTML();
        editorEl.classList.remove('hidden');
        sourceEl.classList.add('hidden');
        btn.classList.remove('bg-green-100', 'text-green-700');
    }
});
document.getElementById('tiptap-html-source').addEventListener('input', function () {
    document.getElementById('blogContent').value = this.value;
});

// ── Slug / SEO ───────────────────────────────────────────────────────────────
var titleInput = document.getElementById('titleInput');
var slugInput  = document.getElementById('slugInput');
var slugManuallyEdited = isExisting;

function toSlug(str) {
    return str.toLowerCase().trim().replace(/[^\w\s-]/g,'').replace(/[\s_-]+/g,'-').replace(/^-+|-+$/g,'');
}
titleInput.addEventListener('input', function() { if (!slugManuallyEdited) slugInput.value = toSlug(this.value); updateSerp(); });
slugInput.addEventListener('input', function() { slugManuallyEdited = true; updateSerp(); });
document.getElementById('regenSlug').addEventListener('click', function() { slugInput.value = toSlug(titleInput.value); slugManuallyEdited = false; updateSerp(); });

var metaTitle      = document.getElementById('metaTitle');
var metaDesc       = document.getElementById('metaDesc');
var metaTitleCount = document.getElementById('metaTitleCount');
var metaDescCount  = document.getElementById('metaDescCount');

function updateSerp() {
    document.getElementById('serpTitle').textContent = metaTitle.value || titleInput.value || 'Blog Title';
    document.getElementById('serpDesc').textContent  = metaDesc.value || titleInput.value || 'Meta description...';
}
metaTitle.addEventListener('input', function() { metaTitleCount.textContent = this.value.length+'/60'; metaTitleCount.className = this.value.length>55?'text-red-500 float-right':'text-gray-400 float-right'; updateSerp(); });
metaDesc.addEventListener('input', function() { metaDescCount.textContent = this.value.length+'/160'; metaDescCount.className = this.value.length>150?'text-red-500 float-right':'text-gray-400 float-right'; updateSerp(); });
metaTitleCount.textContent = metaTitle.value.length+'/60';
metaDescCount.textContent  = metaDesc.value.length+'/160';

document.getElementById('publishToggle').addEventListener('change', function() {
    document.getElementById('publishLabel').textContent = this.checked ? 'Published' : 'Draft';
});

window.addTag = function(tag) {
    var input = document.getElementById('tagsInput');
    var current = input.value.split(',').map(t => t.trim()).filter(Boolean);
    if (!current.includes(tag)) { current.push(tag); input.value = current.join(', '); }
};

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

// ── Schema ───────────────────────────────────────────────────────────────────
var schemaTypes = ['BlogPosting','Article','NewsArticle','FAQPage','HowTo','Product','LocalBusiness'];
document.getElementById('addSchemaBtn').addEventListener('click', function() {
    var empty = document.getElementById('schemaEmpty');
    if (empty) empty.remove();
    var opts = schemaTypes.map(t => `<option value="${t}">${t}</option>`).join('');
    var entry = document.createElement('div');
    entry.className = 'schema-entry border border-gray-200 rounded-xl p-3 space-y-2 bg-gray-50';
    entry.innerHTML =
        `<div class="flex items-center gap-2">
            <select name="schema_type[]" class="flex-1 border border-gray-200 rounded-lg px-3 py-1.5 text-xs focus:outline-none focus:ring-2 focus:ring-green-500 bg-white">${opts}</select>
            <button type="button" onclick="this.closest('.schema-entry').remove()" class="text-red-400 hover:text-red-600 flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <textarea name="schema_markup[]" rows="5" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs font-mono focus:outline-none focus:ring-2 focus:ring-green-500 resize-y" placeholder='{"@context":"https://schema.org",...}'></textarea>`;
    document.getElementById('schemaList').appendChild(entry);
});

// ── Editor styles ────────────────────────────────────────────────────────────
const style = document.createElement('style');
style.textContent = `
    #tiptap-editor .ProseMirror { outline: none; min-height: 440px; }
    #tiptap-editor .ProseMirror p.is-editor-empty:first-child::before { content: attr(data-placeholder); float: left; color: #9ca3af; pointer-events: none; height: 0; }
    #tiptap-editor .ProseMirror h1 { font-size: 2em; font-weight: 800; margin: 0.5em 0; }
    #tiptap-editor .ProseMirror h2 { font-size: 1.5em; font-weight: 700; margin: 0.5em 0; }
    #tiptap-editor .ProseMirror h3 { font-size: 1.25em; font-weight: 700; margin: 0.5em 0; }
    #tiptap-editor .ProseMirror h4 { font-size: 1.1em; font-weight: 600; margin: 0.5em 0; }
    #tiptap-editor .ProseMirror ul { list-style: disc; padding-left: 1.5em; margin: 0.5em 0; }
    #tiptap-editor .ProseMirror ol { list-style: decimal; padding-left: 1.5em; margin: 0.5em 0; }
    #tiptap-editor .ProseMirror blockquote { border-left: 4px solid #109125; padding-left: 1em; color: #6b7280; margin: 0.75em 0; font-style: italic; }
    #tiptap-editor .ProseMirror pre { background: #1e293b; color: #e2e8f0; padding: 1em; border-radius: 8px; font-family: monospace; font-size: 0.875em; overflow-x: auto; margin: 0.75em 0; }
    #tiptap-editor .ProseMirror code { background: #f1f5f9; color: #dc2626; padding: 0.15em 0.4em; border-radius: 4px; font-size: 0.875em; }
    #tiptap-editor .ProseMirror a { color: #2563eb; text-decoration: underline; }
    #tiptap-editor .ProseMirror p { margin: 0.4em 0; }
    #tiptap-editor .ProseMirror img { max-width: 100%; border-radius: 8px; margin: 0.5em 0; }
    #tiptap-editor .ProseMirror strong { font-weight: 700; }
    #tiptap-editor .ProseMirror em { font-style: italic; }
    #tiptap-editor .ProseMirror s { text-decoration: line-through; }
    #tiptap-editor .ProseMirror table { border-collapse: collapse; width: 100%; margin: 1em 0; }
    #tiptap-editor .ProseMirror table td,
    #tiptap-editor .ProseMirror table th { border: 1px solid #d1d5db; padding: 8px 12px; text-align: left; min-width: 80px; vertical-align: top; }
    #tiptap-editor .ProseMirror table th { background: #f3f4f6; font-weight: 700; font-size: 0.85em; }
    #tiptap-editor .ProseMirror table tr:nth-child(even) td { background: #f9fafb; }
    #tiptap-editor .ProseMirror .selectedCell { background: #dbeafe !important; }
`;
document.head.appendChild(style);
</script>
@endverbatim
