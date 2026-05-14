<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    private array $pages = ['home', 'about', 'blogs', 'apply', 'contact', 'calculator', 'landing'];

    public function index()
    {
        $metas = SeoMeta::all()->keyBy('page_key');
        $pages = $this->pages;
        return view('admin.seo.index', compact('metas', 'pages'));
    }

    public function edit(string $page)
    {
        abort_unless(in_array($page, $this->pages), 404);
        $meta = SeoMeta::firstOrNew(['page_key' => $page]);
        return view('admin.seo.edit', compact('meta', 'page'));
    }

    public function update(Request $request, string $page)
    {
        abort_unless(in_array($page, $this->pages), 404);

        $data = $request->validate([
            'title'          => 'nullable|string',
            'description'    => 'nullable|string',
            'keywords'       => 'nullable|string|max:500',
            'og_title'       => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_image'       => 'nullable|string|max:500',
            'schema_markup'  => 'nullable|string',
        ]);

        SeoMeta::updateOrCreate(['page_key' => $page], $data);

        return redirect()->route('admin.seo.edit', $page)->with('success', 'SEO updated for ' . ucfirst($page) . ' page.');
    }
}
