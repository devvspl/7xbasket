<?php

namespace Database\Seeders;

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

        // Blogs from JSON
        $this->call(BlogSeeder::class);

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
