@extends('layouts.app')
@section('content')
    {{-- 1. Hero --}}
    <section class="bg-[#f0faf4] py-16 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span
                class="inline-flex items-center gap-2 bg-[#109125]/10 text-[#055346] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-[#109125]/20">
                <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                India's Fastest Growing Grocery Franchise
            </span>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3">About 7x Basket</h1>
            <p class="text-gray-500 text-base max-w-lg mx-auto">Building India's most trusted grocery franchise network, one
                store at a time.</p>
        </div>
    </section>

    {{-- 2. Story + Image --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Image --}}
                <div data-aos="fade-right">
                    <img src="{{ asset('custom/7x_Basket_Store.jpg') }}" alt="7x Basket Store"
                        class="rounded-2xl shadow-sm w-full h-80 object-cover">
                </div>
                {{-- Text --}}
                <div data-aos="fade-left">
                    <span class="text-[#109125] text-xs font-bold uppercase tracking-widest">Our Story</span>
                    <h2 class="text-2xl font-extrabold text-gray-900 mt-2 mb-4">From One Store to 500+</h2>
                    <p class="text-gray-500 leading-relaxed text-sm mb-4">
                        Starting from a single store in 2018, we have grown to a network of 500+ franchise partners across
                        20+ cities. Our model is built on trust, transparency, and technology.
                    </p>
                    <p class="text-gray-500 leading-relaxed text-sm mb-4">
                        We believe every entrepreneur deserves a proven system with zero royalty and full support — from
                        site selection and store setup to daily operations and marketing.
                    </p>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        We don't just sell franchises — we build long-term partnerships. Every partner gets a dedicated
                        relationship manager, access to 5000+ SKUs, and cutting-edge POS technology from day one.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Stats Row --}}
    <section class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ([['500+', 'Franchise Stores'], ['20+', 'Cities'], ['₹50Cr+', 'Partner Revenue'], ['98%', 'Satisfaction']] as [$num, $label])
                    <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <p class="text-4xl font-extrabold text-[#109125]">{{ $num }}</p>
                        <p class="text-gray-400 text-sm mt-1">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. Mission & Vision --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-xs font-bold uppercase tracking-widest">What Drives Us</span>
                <h2 class="text-2xl font-extrabold text-gray-900 mt-2">Mission & Vision</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-[#f0faf4] border border-green-100 rounded-2xl p-8" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-10 h-10 bg-[#109125]/10 rounded-xl flex items-center justify-center text-xl mb-4">🎯</div>
                    <h3 class="text-lg font-extrabold text-gray-900 mb-3">Our Mission</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">To empower entrepreneurs across India with a proven,
                        profitable grocery franchise model with complete support and technology infrastructure.</p>
                </div>
                <div class="bg-[#f0faf4] border border-green-100 rounded-2xl p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-10 h-10 bg-[#109125]/10 rounded-xl flex items-center justify-center text-xl mb-4">🔭</div>
                    <h3 class="text-lg font-extrabold text-gray-900 mb-3">Our Vision</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">To become India's largest grocery franchise network
                        with 5000+ stores serving 10 million families by 2030.</p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 60
        });
    </script>
@endsection
