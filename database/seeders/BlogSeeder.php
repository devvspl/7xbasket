<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('blogs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $json = file_get_contents(database_path('seeders/blogs.json'));
        $data = json_decode($json, true);

        foreach ($data['rows'] as $row) {
            // Strip WordPress block comments and clean content
            $content = preg_replace('/<!-- .*? -->/s', '', $row['post_content']);
            $content = trim($content);

            // Generate a plain-text excerpt from content (first ~200 chars)
            $plainText = strip_tags($content);
            $excerpt   = Str::limit($plainText, 200);

            Blog::updateOrCreate(
                ['slug' => $row['slug']],
                [
                    'title'        => html_entity_decode($row['post_title'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                    'slug'         => $row['slug'],
                    'excerpt'      => $excerpt,
                    'content'      => $content,
                    'category'     => 'Franchise',
                    'tags'         => 'grocery, franchise, supermarket, 7xbasket',
                    'author'       => '7x Basket Team',
                    'is_published' => true,
                    'published_at' => $row['post_date'],
                ]
            );
        }
    }
}
