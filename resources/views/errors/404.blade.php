@extends('layouts.app')

@section('content')
    <section class="bg-white py-16 sm:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                {{-- 404 Icon --}}
                <div class="w-20 h-20 bg-[#ec2024] rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>

                {{-- 404 Number --}}
                <h1 class="text-6xl sm:text-7xl md:text-8xl font-extrabold text-gray-900 mb-4">
                    404
                </h1>

                {{-- Heading --}}
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                    Page Not Found
                </h2>
                
                <p class="text-gray-600 text-base sm:text-lg mb-12 max-w-2xl mx-auto leading-relaxed">
                    Sorry, the page you are looking for doesn't exist or has been moved. Let's get you back on track.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" 
                        class="inline-flex items-center justify-center bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                        ← Back to Home
                    </a>
                    <a href="{{ route('apply') }}" 
                        class="inline-flex items-center justify-center bg-[#f5a623] hover:bg-[#e09610] text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                        Apply Franchise
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
