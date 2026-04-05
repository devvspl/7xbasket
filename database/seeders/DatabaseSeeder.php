<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\SeoMeta;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@7xbasket.com'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@7xbasket.com',
                'password' => Hash::make('Admin@123'),
                'role'     => 'admin',
            ]
        );

        // Sample blogs
        $blogs = [
            [
                'title'        => 'Why Grocery Franchise is the Best Business in 2025',
                'excerpt'      => 'Discover why grocery franchises are booming and how 7x Basket leads the way.',
                'content'      => '<p>The grocery industry is one of the most resilient sectors in the economy. With 7x Basket, you get a proven model, brand recognition, and full operational support to launch your own store.</p><p>Our franchise partners enjoy high footfall, repeat customers, and strong margins on everyday essentials.</p>',
                'category'     => 'Business',
                'tags'         => 'franchise, grocery, business, investment',
                'author'       => '7x Basket Team',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'How to Choose the Right Location for Your Grocery Store',
                'excerpt'      => 'Location is everything. Learn how to pick the perfect spot for your 7x Basket franchise.',
                'content'      => '<p>Choosing the right location can make or break your grocery franchise. Key factors include foot traffic, nearby residential density, parking availability, and competition analysis.</p><p>Our team provides a full location assessment before you sign any agreement.</p>',
                'category'     => 'Tips',
                'tags'         => 'location, store, tips, franchise',
                'author'       => '7x Basket Team',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title'        => '5 Reasons to Invest in 7x Basket Franchise Today',
                'excerpt'      => 'From low investment to high ROI, here are 5 compelling reasons to join 7x Basket.',
                'content'      => '<p>1. <strong>Low Entry Cost</strong> - Start with as little as ₹5 Lakhs.<br>2. <strong>Brand Support</strong> - Full marketing and branding assistance.<br>3. <strong>Training</strong> - Comprehensive onboarding program.<br>4. <strong>Supply Chain</strong> - Direct sourcing for better margins.<br>5. <strong>Technology</strong> - POS and inventory management included.</p>',
                'category'     => 'Investment',
                'tags'         => 'investment, ROI, franchise benefits',
                'author'       => '7x Basket Team',
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['title' => $blog['title']], $blog);
        }

        // SEO defaults
        $seoData = [
            ['page_key' => 'home',       'title' => '7x Basket - Premium Grocery Franchise Opportunity', 'description' => 'Start your own grocery franchise with 7x Basket. Low investment, high returns, full support system.'],
            ['page_key' => 'about',      'title' => 'About Us - 7x Basket Franchise', 'description' => 'Learn about 7x Basket, our mission, vision and why we are the best grocery franchise in India.'],
            ['page_key' => 'blogs',      'title' => 'Blog - 7x Basket Franchise Insights', 'description' => 'Read the latest articles about grocery franchise, business tips and 7x Basket updates.'],
            ['page_key' => 'apply',      'title' => 'Apply for Franchise - 7x Basket', 'description' => 'Apply now to become a 7x Basket franchise partner.'],
            ['page_key' => 'contact',    'title' => 'Contact Us - 7x Basket', 'description' => 'Get in touch with the 7x Basket franchise team.'],
            ['page_key' => 'calculator', 'title' => 'Investment Calculator - 7x Basket', 'description' => 'Calculate your potential returns from a 7x Basket grocery franchise.'],
        ];

        foreach ($seoData as $seo) {
            SeoMeta::updateOrCreate(['page_key' => $seo['page_key']], $seo);
        }
    }
}
