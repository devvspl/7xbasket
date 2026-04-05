<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\SeoService;

class BlogController extends Controller
{
    public function index()
    {
        $seo = SeoService::get('blogs', [
            'title'       => 'Blog - 7x Basket Franchise Insights',
            'description' => 'Read the latest articles about grocery franchise, business tips and 7x Basket updates.',
        ]);

        $blogs = Blog::published()->latest('published_at')->paginate(9);

        return view('frontend.blogs.index', compact('seo', 'blogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        $seo = [
            'title'          => $blog->title . ' - 7x Basket Blog',
            'description'    => $blog->excerpt ?? substr(strip_tags($blog->content), 0, 160),
            'keywords'       => $blog->tags ?? '',
            'og_title'       => $blog->title,
            'og_description' => $blog->excerpt ?? '',
            'og_image'       => $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('images/og-default.jpg'),
            'schema_markup'  => null,
        ];

        $related = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where('category', $blog->category)
            ->take(3)->get();

        return view('frontend.blogs.show', compact('seo', 'blog', 'related'));
    }
}
