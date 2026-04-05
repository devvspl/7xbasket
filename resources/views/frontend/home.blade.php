@extends('layouts.app')

@section('content')

{{-- Hero --}}
<section class="relative bg-gradient-to-br from-green-50 via-white to-emerald-50 overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-72 h-72 bg-green-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-emerald-300 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="max-w-3xl">
            <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-6 uppercase tracking-wider">Franchise Opportunity</span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                Own a <span class="text-green-600">7x Basket</span><br>Grocery Franchise
            </h1>
            <p class="text-lg text-gray-600 mb-10 max-w-xl leading-relaxed">
                Join India's fastest-growing grocery franchise network. Low investment, high returns, and complete business support from day one.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('apply') }}" class="bg-green-600 text-white font-semibold px-8 py-3.5 rounded-xl hover:bg-green-700 transition-all shadow-lg shadow-green-200 hover:shadow-green-300">
                    Apply Now →
                </a>
                <a href="{{ route('calculator') }}" class="bg-white text-green-700 font-semibold px-8 py-3.5 rounded-xl border border-green-200 hover:border-green-400 transition-all">
                    Calculate Returns
                </a>
            </div>
            <div class="flex flex-wrap gap-8 mt-12 text-sm text-gray-500">
                <div><span class="text-2xl font-bold text-gray-900">500+</span><br>Franchise Partners</div>
                <div><span class="text-2xl font-bold text-gray-900">₹5L</span><br>Min. Investment</div>
                <div><span class="text-2xl font-bold text-gray-900">30%</span><br>Avg. ROI</div>
            </div>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Why Choose 7x Basket?</h2>
            <p class="text-gray-500 max-w-xl mx-auto">We provide everything you need to run a successful grocery franchise.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach([
                ['🏪', 'Proven Business Model', 'Tested and refined over years with 500+ successful franchise stores.'],
                ['📦', 'Supply Chain Support', 'Direct sourcing from manufacturers for better margins and fresh products.'],
                ['📱', 'Technology Platform', 'POS system, inventory management, and mobile app included.'],
                ['🎓', 'Training & Onboarding', 'Comprehensive training program for you and your staff.'],
                ['📣', 'Marketing Support', 'National and local marketing campaigns to drive footfall.'],
                ['💰', 'High ROI', 'Average 30% return on investment within the first year.'],
            ] as [$icon, $title, $desc])
            <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-md transition-shadow border border-gray-100">
                <div class="text-3xl mb-4">{{ $icon }}</div>
                <h3 class="font-semibold text-gray-900 mb-2">{{ $title }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Steps to Start --}}
<section class="py-20 bg-green-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">How to Get Started</h2>
            <p class="text-gray-500">Simple 4-step process to launch your franchise</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['01', 'Apply Online', 'Fill the franchise application form with your details and investment capacity.'],
                ['02', 'Consultation', 'Our team will contact you for a detailed discussion and site evaluation.'],
                ['03', 'Agreement', 'Sign the franchise agreement and complete the onboarding formalities.'],
                ['04', 'Launch', 'Set up your store with our support and start serving customers.'],
            ] as [$step, $title, $desc])
            <div class="relative bg-white rounded-2xl p-6 shadow-sm border border-green-100">
                <div class="text-5xl font-extrabold text-green-100 mb-3">{{ $step }}</div>
                <h3 class="font-semibold text-gray-900 mb-2">{{ $title }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Franchise Benefits --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Franchise Benefits</h2>
                <div class="space-y-4">
                    @foreach([
                        'Exclusive territory rights in your area',
                        'Complete store setup assistance',
                        'Ongoing operational support',
                        'Access to 5000+ SKUs at wholesale prices',
                        'Dedicated relationship manager',
                        'Monthly performance reviews',
                        'Digital marketing & social media support',
                        'Loyalty program for your customers',
                    ] as $benefit)
                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <span class="text-gray-700 text-sm">{{ $benefit }}</span>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('apply') }}" class="inline-block mt-8 bg-green-600 text-white font-semibold px-7 py-3 rounded-xl hover:bg-green-700 transition-colors">
                    Apply for Franchise
                </a>
            </div>
            <div class="bg-gradient-to-br from-green-600 to-emerald-700 rounded-3xl p-10 text-white">
                <h3 class="text-2xl font-bold mb-8">Investment Overview</h3>
                <div class="space-y-5">
                    @foreach([
                        ['Franchise Fee', '₹1,00,000'],
                        ['Store Setup', '₹2,00,000 - ₹3,00,000'],
                        ['Initial Inventory', '₹1,50,000'],
                        ['Working Capital', '₹50,000'],
                        ['Total Investment', '₹5,00,000+'],
                    ] as [$label, $value])
                    <div class="flex justify-between items-center border-b border-white/20 pb-4">
                        <span class="text-green-100 text-sm">{{ $label }}</span>
                        <span class="font-bold">{{ $value }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Our Services</h2>
            <p class="text-gray-500">Everything under one roof for your franchise success</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            @foreach([
                ['🛒', 'Grocery Retail'],
                ['🥦', 'Fresh Produce'],
                ['🥛', 'Dairy & Beverages'],
                ['🧴', 'Personal Care'],
                ['🏠', 'Home Essentials'],
                ['🍿', 'Snacks & Packaged'],
                ['🌾', 'Organic Products'],
                ['📦', 'Bulk Orders'],
            ] as [$icon, $name])
            <div class="bg-white rounded-xl p-5 text-center shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                <div class="text-3xl mb-2">{{ $icon }}</div>
                <p class="text-sm font-medium text-gray-700">{{ $name }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">What Our Partners Say</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['Rajesh Kumar', 'Delhi', 'Joining 7x Basket was the best business decision I made. The support team is always available and my store turned profitable in 8 months.'],
                ['Priya Sharma', 'Mumbai', 'The supply chain is excellent. I get fresh products daily and the margins are much better than running an independent store.'],
                ['Amit Patel', 'Ahmedabad', 'From training to launch, everything was smooth. The technology platform makes inventory management effortless.'],
            ] as [$name, $city, $quote])
            <div class="bg-gray-50 rounded-2xl p-7 border border-gray-100">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-5">"{{ $quote }}"</p>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">{{ $name }}</p>
                    <p class="text-xs text-gray-400">Franchise Partner, {{ $city }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Blog Preview --}}
@if($blogs->count())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Latest Insights</h2>
                <p class="text-gray-500">Tips, news and franchise updates</p>
            </div>
            <a href="{{ route('blogs') }}" class="text-green-600 font-medium text-sm hover:underline">View all →</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                @if($blog->featured_image)
                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-44 object-cover" loading="lazy">
                @else
                <div class="w-full h-44 bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center">
                    <span class="text-4xl">🛒</span>
                </div>
                @endif
                <div class="p-5">
                    @if($blog->category)
                    <span class="text-xs font-semibold text-green-600 uppercase tracking-wider">{{ $blog->category }}</span>
                    @endif
                    <h3 class="font-semibold text-gray-900 mt-1 mb-2 line-clamp-2">{{ $blog->title }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $blog->excerpt }}</p>
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="text-green-600 text-sm font-medium hover:underline">Read more →</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA Banner --}}
<section class="py-20 bg-green-600">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Ready to Start Your Franchise Journey?</h2>
        <p class="text-green-100 mb-8 text-lg">Join 500+ successful franchise partners across India. Apply today and our team will reach out within 24 hours.</p>
        <a href="{{ route('apply') }}" class="inline-block bg-white text-green-700 font-bold px-10 py-4 rounded-xl hover:bg-green-50 transition-colors shadow-lg text-lg">
            Apply for Franchise Now
        </a>
    </div>
</section>

@endsection

