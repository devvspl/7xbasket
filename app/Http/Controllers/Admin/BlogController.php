<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%$s%")
                  ->orWhere('category', 'like', "%$s%")
                  ->orWhere('author', 'like', "%$s%");
            });
        }
        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $blogs      = $query->paginate(10)->withQueryString();
        $categories = Blog::whereNotNull('category')->distinct()->pluck('category');

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = Blog::whereNotNull('category')->distinct()->pluck('category');
        $allTags    = Blog::whereNotNull('tags')->pluck('tags')
                        ->flatMap(fn($t) => array_map('trim', explode(',', $t)))
                        ->unique()->values();
        return view('admin.blogs.form', [
            'blog'       => new Blog(),
            'categories' => $categories,
            'allTags'    => $allTags,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['featured_image'] = $this->handleImage($request);
        $data['slug'] = $this->uniqueSlug($request->slug ?: $request->title);
        $data['published_at'] = $data['is_published'] ? now() : null;

        $blog = Blog::create($data);
        $this->syncSchemas($blog, $request);

        return redirect()->route('admin.blogs.edit', $blog)->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = Blog::whereNotNull('category')->distinct()->pluck('category');
        $allTags    = Blog::whereNotNull('tags')->pluck('tags')
                        ->flatMap(fn($t) => array_map('trim', explode(',', $t)))
                        ->unique()->values();
        return view('admin.blogs.form', compact('blog', 'categories', 'allTags'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $this->validated($request);

        $newSlug = trim($request->slug);
        if ($newSlug && $newSlug !== $blog->slug) {
            $data['slug'] = $this->uniqueSlug($newSlug, $blog->id);
        }

        // Handle featured image (both base64 and file upload)
        if ($request->filled('featured_image') || $request->hasFile('featured_image')) {
            $newImage = $this->handleImage($request);
            if ($newImage) {
                $data['featured_image'] = $newImage;
            }
        }

        if ($data['is_published'] && !$blog->published_at) {
            $data['published_at'] = now();
        }

        $blog->update($data);
        $this->syncSchemas($blog, $request);

        return redirect()->route('admin.blogs.edit', $blog)->with('success', 'Blog updated successfully.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate(['file' => 'required|image|max:4096']);
        $file     = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/blogs'), $filename);
        return response()->json(['location' => asset('uploads/blogs/' . $filename)]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'category'         => 'nullable|string|max:100',
            'tags'             => 'nullable|string|max:255',
            'author'           => 'nullable|string|max:100',
            'featured_image'   => 'nullable|string', // Changed to accept base64 string
            'featured_image_alt' => 'nullable|string|max:255',
            'is_published'     => 'nullable|in:0,1',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords'    => 'nullable|string|max:500',
            'og_image'         => 'nullable|string|max:500',
            'meta_index'       => 'nullable|boolean',
            'meta_follow'      => 'nullable|boolean',
        ]);
        $data['is_published'] = (bool) ($data['is_published'] ?? false);
        $data['meta_index']   = (bool) ($data['meta_index'] ?? false);
        $data['meta_follow']  = (bool) ($data['meta_follow'] ?? false);
        return $data;
    }

    private function syncSchemas(Blog $blog, Request $request): void
    {
        $blog->schemas()->delete();

        $types   = $request->input('schema_type', []);
        $markups = $request->input('schema_markup', []);

        foreach ($types as $i => $type) {
            $markup = trim($markups[$i] ?? '');
            if ($markup === '') continue;
            $blog->schemas()->create([
                'schema_type'   => $type ?: 'BlogPosting',
                'schema_markup' => $markup,
                'sort_order'    => $i,
            ]);
        }
    }

    private function handleImage(Request $request): ?string
    {
        // Handle base64 cropped image data
        if ($request->filled('featured_image') && str_starts_with($request->featured_image, 'data:image')) {
            $imageData = $request->featured_image;
            
            // Extract base64 data
            preg_match('/^data:image\/(\w+);base64,/', $imageData, $matches);
            $extension = $matches[1] ?? 'jpg';
            $imageData = substr($imageData, strpos($imageData, ',') + 1);
            $imageData = base64_decode($imageData);
            
            // Generate filename
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $path = public_path('uploads/blogs/' . $filename);
            
            // Ensure directory exists
            if (!file_exists(public_path('uploads/blogs'))) {
                mkdir(public_path('uploads/blogs'), 0755, true);
            }
            
            // Save the file
            file_put_contents($path, $imageData);
            
            return 'uploads/blogs/' . $filename;
        }
        
        // Handle traditional file upload (fallback)
        if ($request->hasFile('featured_image')) {
            $file     = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            return 'uploads/blogs/' . $filename;
        }
        
        return null;
    }

    private function uniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug  = Str::slug($title);
        $query = Blog::where('slug', 'like', $slug . '%');
        if ($excludeId) $query->where('id', '!=', $excludeId);
        $count = $query->count();
        return $count ? $slug . '-' . ($count + 1) : $slug;
    }
}
