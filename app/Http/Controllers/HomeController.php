<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\SeoService;

class HomeController extends Controller
{
    public function index()
    {
        $seo = SeoService::get('home', [
            'title'       => '7x Basket - Premium Grocery Franchise Opportunity',
            'description' => 'Start your own grocery franchise with 7x Basket. Low investment, high returns, full support.',
        ]);

        $blogs = Blog::published()->latest('published_at')->take(3)->get();

        return view('frontend.home', compact('seo', 'blogs'));
    }

    public function about()
    {
        $seo = SeoService::get('about', [
            'title'       => 'About Us - 7x Basket Franchise',
            'description' => 'Learn about 7x Basket, our mission, vision and why we are the best grocery franchise.',
        ]);
        return view('frontend.about', compact('seo'));
    }

    public function contact()
    {
        $seo = SeoService::get('contact', [
            'title'       => 'Contact Us - 7x Basket',
            'description' => 'Get in touch with 7x Basket franchise team.',
        ]);
        return view('frontend.contact', compact('seo'));
    }

    public function calculator()
    {
        $seo = SeoService::get('calculator', [
            'title'       => 'Investment Calculator - 7x Basket Franchise',
            'description' => 'Calculate your potential returns from a 7x Basket grocery franchise.',
        ]);
        return view('frontend.calculator', compact('seo'));
    }
}
