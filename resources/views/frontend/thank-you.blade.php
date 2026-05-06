@extends('layouts.app')

@section('content')
    <section class="bg-white py-16 sm:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                {{-- Success Icon --}}
                <div class="w-20 h-20 bg-[#109125] rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                {{-- Heading --}}
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
                    Thank You for Your Interest!
                </h1>
                
                <p class="text-gray-600 text-base sm:text-lg mb-12 max-w-2xl mx-auto leading-relaxed">
                    Your franchise application has been successfully submitted. Our team will review your details and contact you within 24 hours.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" 
                        class="inline-flex items-center justify-center bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                        ← Back to Home
                    </a>
                    <a href="{{ route('contact') }}" 
                        class="inline-flex items-center justify-center bg-[#f5a623] hover:bg-[#e09610] text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
