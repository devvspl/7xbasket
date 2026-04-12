<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\SeoService;

class BlogController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $seo = SeoService::get('blogs', [
            'title'       => 'Blog - 7x Basket Franchise Insights',
            'description' => 'Read the latest articles about grocery franchise, business tips and 7x Basket updates.',
        ]);

        $query = Blog::published()->latest('published_at');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%$s%")
                  ->orWhere('excerpt', 'like', "%$s%")
                  ->orWhere('tags', 'like', "%$s%");
            });
        }

        $blogs      = $query->paginate(9)->withQueryString();
        $categories = Blog::published()->whereNotNull('category')->distinct()->pluck('category');

        return view('frontend.blogs.index', compact('seo', 'blogs', 'categories'));
    }

    public function show(string $slug)
    {
        $blog = Blog::published()->where('slug', $slug)->with('schemas')->firstOrFail();

        $seo = [
            'title'          => ($blog->meta_title ?: $blog->title) . ' - 7x Basket Blog',
            'description'    => $blog->meta_description ?: ($blog->excerpt ?? substr(strip_tags($blog->content), 0, 160)),
            'keywords'       => $blog->meta_keywords ?: ($blog->tags ?? ''),
            'og_type'        => 'article',
            'og_title'       => $blog->meta_title ?: $blog->title,
            'og_description' => $blog->meta_description ?: ($blog->excerpt ?? ''),
            'og_image'       => $blog->og_image ?: ($blog->featured_image ? asset($blog->featured_image) : null),
            'meta_index'     => $blog->meta_index ?? true,
            'meta_follow'    => $blog->meta_follow ?? true,
            'schemas'        => $blog->schemas->map(fn($s) => ['type' => $s->schema_type, 'markup' => $s->schema_markup])->all(),
        ];

        $related = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where('category', $blog->category)
            ->take(3)->get();

        $recent = Blog::published()
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(4)->get();

        return view('frontend.blogs.show', compact('seo', 'blog', 'related', 'recent'));
    }
}
