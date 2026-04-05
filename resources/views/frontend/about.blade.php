@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-br from-green-50 to-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">About 7x Basket</h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">Building India's most trusted grocery franchise network, one store at a time.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Story</h2>
                <p class="text-gray-600 leading-relaxed mb-4">7x Basket was founded with a simple vision: to make quality grocery retail accessible to every neighbourhood in India. We believe that a well-run grocery store is the backbone of any community.</p>
                <p class="text-gray-600 leading-relaxed mb-4">Starting from a single store in 2018, we have grown to a network of 500+ franchise partners across 20+ cities. Our model is built on trust, transparency, and technology.</p>
                <p class="text-gray-600 leading-relaxed">We don't just sell franchises — we build long-term partnerships. Every franchise partner gets dedicated support, training, and the tools they need to succeed.</p>
            </div>
            <div class="grid grid-cols-2 gap-5">
                @foreach([
                    ['500+', 'Franchise Stores'],
                    ['20+', 'Cities'],
                    ['₹50Cr+', 'Partner Revenue'],
                    ['98%', 'Partner Satisfaction'],
                ] as [$num, $label])
                <div class="bg-green-50 rounded-2xl p-6 text-center border border-green-100">
                    <div class="text-3xl font-extrabold text-green-600 mb-1">{{ $num }}</div>
                    <div class="text-sm text-gray-600">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                <div class="text-3xl mb-4">🎯</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">To empower entrepreneurs across India by providing a proven, profitable grocery franchise model with complete support and technology infrastructure.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                <div class="text-3xl mb-4">🔭</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">To become India's largest and most trusted grocery franchise network, with 5000+ stores serving 10 million families by 2030.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-green-600">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Be Part of Our Story</h2>
        <p class="text-green-100 mb-8">Join the 7x Basket family and build a business you're proud of.</p>
        <a href="{{ route('apply') }}" class="inline-block bg-white text-green-700 font-bold px-8 py-3.5 rounded-xl hover:bg-green-50 transition-colors">Apply for Franchise</a>
    </div>
</section>

@endsection
