@extends('layouts.app')
@section('content')
    <section class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] py-10 text-center">
        <div class="absolute blob w-72 h-72 bg-[#109125]/20 top-[-60px] left-[-60px]"></div>
        <div class="absolute blob w-56 h-56 bg-[#ec2024]/10 bottom-[-40px] right-[5%]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span
                class="inline-flex items-center gap-2 bg-white/10 text-green-200 text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-white/20">
                <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                Join Us
            </span>
            <h1 class="text-4xl font-extrabold text-white mb-3">Apply for Franchise</h1>
            <p class="text-green-100/80 text-base max-w-lg mx-auto">Fill in your details and our team will contact you within
                24 hours.
            </p>
            <nav class="text-sm flex items-center gap-1 flex-wrap justify-center mt-4">
                <a href="{{ route('home') }}" class="text-green-300 hover:text-white transition-colors">Home</a>
                <span class="text-white/30">/</span>
                <span class="text-white font-medium">Apply Franchise</span>
            </nav>
        </div>
    </section>
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span
                        class="inline-flex items-center gap-2 bg-[#109125]/10 text-[#055346] text-xs font-semibold px-4 py-1.5 rounded-full mb-5 border border-[#109125]/20">
                        <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                        Limited Slots Available — Apply Now
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                        Start Your Own Supermarket Business.<br>
                        <span class="text-[#109125]">Backed by a Brand People Trust.</span>
                    </h2>
                    <p class="text-gray-500 text-base mb-6 leading-relaxed">Join 200+ successful franchise partners across
                        India. Get complete support — from store setup to daily operations — with zero royalty.
                    </p>
                    <div class="relative rounded-2xl overflow-hidden shadow-md mb-6 aspect-video bg-gray-100">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" class="w-full h-full" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen loading="lazy">
                        </iframe>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['✓ Zero Royalty', '✓ 45-Day Launch', '✓ Full Training', '✓ FSSAI Certified'] as $tag)
                            <span
                                class="bg-[#f0faf4] border border-[#109125]/20 text-[#055346] text-xs font-bold px-3 py-1.5 rounded-full">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-7">
                    <h2 class="text-lg font-extrabold text-gray-900 mb-1">Apply for Franchise</h2>
                    <p class="text-gray-400 text-sm mb-5">Our team will call you within 24 hours.</p>
                    <div id="applyFormMsg" class="hidden rounded-xl px-4 py-3 text-sm font-medium mb-4 text-center"></div>
                    <form id="applyPageForm" action="{{ route('apply.store') }}" method="POST" class="space-y-3">
                        @csrf
                        <input type="hidden" name="source" value="website">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">Full Name <span
                                    class="text-[#109125]">*</span></label>
                            <input type="text" name="name" required placeholder="e.g. Rajesh Kumar"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Mobile <span
                                        class="text-[#109125]">*</span></label>
                                <input type="tel" name="phone" required placeholder="+91 98702 75327"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Email</label>
                                <input type="email" name="email" placeholder="you@example.com"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Pincode <span
                                        class="text-[#109125]">*</span></label>
                                <input type="text" name="pincode" required placeholder="110001" maxlength="6"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Store Area <span
                                        class="text-[#109125]">*</span></label>
                                <select name="store_area" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                                    <option value="" disabled selected>Select</option>
                                    <option value="300-500">300–500 sq ft</option>
                                    <option value="500-800">500–800 sq ft</option>
                                    <option value="800-1200">800–1200 sq ft</option>
                                    <option value="1200-2000">1200–2000 sq ft</option>
                                    <option value="2000+">2000+ sq ft</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">Property Type <span
                                    class="text-[#109125]">*</span></label>
                            <select name="property_type" required
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                                <option value="" disabled selected>Select ownership type</option>
                                <option value="owned">Owned Property</option>
                                <option value="rented">Rented Property</option>
                                <option value="leased">Leased Property</option>
                                <option value="looking">Still Looking</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">Opening Timeline <span
                                    class="text-[#109125]">*</span></label>
                            <select name="opening_timeline" required
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                                <option value="" disabled selected>Select timeline</option>
                                <option value="1_month">Within 1 Month</option>
                                <option value="3_months">1–3 Months</option>
                                <option value="6_months">3–6 Months</option>
                                <option value="1_year">6–12 Months</option>
                                <option value="exploring">Just Exploring</option>
                            </select>
                        </div>
                        <button type="submit" id="applyPageSubmit"
                            class="w-full bg-[#ec2024] hover:bg-red-700 text-white font-extrabold py-3.5 rounded-xl transition-all duration-200 text-sm shadow-lg hover:-translate-y-0.5 tracking-wide">
                            YES! I Want to Open My Supermarket Franchise →
                        </button>
                        <p class="text-center text-xs text-gray-400">No spam. We'll only call to discuss your franchise
                            query.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 bg-[#0f2d1f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ([['200+', 'Stores Pan India'], ['12+', 'States Covered'], ['5,000+', 'Products Stocked'], ['500+', 'Brand Partners'], ['13L', 'Starting Investment']] as [$num, $label])
                    <div class="w-[45%] sm:w-[30%] lg:w-[18%] 
            border border-white/10 rounded-xl p-5 
            flex flex-col items-center justify-center text-center"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <p class="text-3xl font-extrabold text-[#ffffff]">
                            {{ $num }}
                        </p>
                        <p class="text-[#ffffff] text-xs uppercase tracking-widest mt-1">
                            {{ $label }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-stretch">
                <div data-aos="fade-right">
                    <span class="text-[#109125] text-xs font-bold uppercase tracking-widest">The Opportunity</span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mt-2 leading-tight">
                        India's Grocery Market is One of the
                        <span class="text-[#109125]"> Largest Untapped Opportunities</span>
                    </h2>
                    <p class="text-gray-500 text-sm mt-4 leading-relaxed">The Indian grocery market is growing at an
                        unprecedented pace — and organised retail is still only a fraction of it. This is your window to
                        build a profitable business.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        @foreach ([['65L Cr', 'Current Market Size'], ['18% CAGR', 'Annual Growth Rate'], ['12%', 'Organised Share'], ['1.2Cr Cr', 'Projected 2030']] as [$n, $l])
                            <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm">
                                <p class="text-2xl font-extrabold text-[#109125]">{{ $n }}</p>
                                <p class="text-gray-400 text-xs mt-0.5">{{ $l }}</p>
                            </div>
                        @endforeach
                    </div>
                    <a href="#"
                        onclick="document.querySelector('#applyPageForm').scrollIntoView({behavior:'smooth'}); return false;"
                        class="inline-block mt-8 bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-7 py-3 rounded-xl text-sm transition-all duration-200 hover:-translate-y-0.5 shadow-md">
                        Apply Franchise →
                    </a>
                </div>
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 flex flex-col" data-aos="fade-left">
                    <p class="text-sm font-bold text-gray-700 mb-1">India Grocery Market Size</p>
                    <p class="text-xs text-gray-400 mb-4">In USD Billion · 2019–2025</p>
                    <div class="flex-1">
                        <canvas id="groceryChart"></canvas>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-3 text-center">Source: IBEF, Redseer Research � *2025 projected
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-[#060f0c] relative overflow-hidden">
        <div class="absolute blob w-96 h-96 bg-[#109125]/10 top-[-80px] right-[-80px]"></div>
        <div class="absolute blob w-72 h-72 bg-[#ec2024]/10 bottom-[-60px] left-[5%]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#4ade80] text-xs font-bold uppercase tracking-widest">Why 7x Basket</span>
                <h2 class="text-3xl font-extrabold text-white mt-2">Everything You Need to Succeed</h2>
                <p class="text-green-300/60 text-sm mt-2 max-w-lg mx-auto">We handle the hard parts so you can focus on
                    growing
                    your business.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([['💰', 'Zero Royalty Model', 'Keep 100% of your profits. We earn through the supply chain, not your revenue.'], ['🏗️', '45-Day Store Launch', 'From agreement to grand opening in just 45 days — fully managed by our team.'], ['📦', '5,000+ SKUs', 'Direct sourcing from top FMCG brands at wholesale prices with daily delivery.'], ['🖥️', 'Cloud POS + App', 'Billing, inventory, analytics — all in one easy-to-use platform. No tech skills needed.'], ['👥', 'Staff Training', 'Complete onboarding for you and your team before the store opens.'], ['📣', 'Marketing Support', 'National campaigns + local marketing kits. Customers walk in before you advertise.'], ['🔒', 'Exclusive Territory', 'Your pincode zone is protected. No competing 7x Basket store within your radius.'], ['🤝', 'Dedicated Manager', 'A relationship manager assigned to your store from day one.'], ['📋', 'Legal Compliance', 'FSSAI, GST, Shops Act — all documentation handled by our compliance team.']] as [$icon, $title, $desc])
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5 hover:bg-white/10 hover:border-[#4ade80]/30 hover:-translate-y-0.5 transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="w-10 h-10 bg-[#109125]/20 rounded-xl flex items-center justify-center text-xl mb-3">
                            {{ $icon }}
                        </div>
                        <p class="text-sm font-bold text-white">{{ $title }}</p>
                        <p class="text-xs text-white/60 leading-relaxed mt-1.5">
                            {{ $desc }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-gray-400 text-xs font-bold uppercase tracking-widest">Competitor Comparison</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-3">Why 7x Basket Wins</h2>
                <p class="text-gray-500 text-sm max-w-2xl mx-auto">See how we compare honestly against other franchise
                    options in the market.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden" data-aos="fade-up">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left px-6 py-5 text-gray-600 font-semibold text-sm bg-gray-50 w-1/3">
                                Feature
                            </th>
                            <th class="px-6 py-5 text-center bg-[#109125] text-white relative w-1/3">
                                <span class="text-base font-bold">7x Basket</span>
                            </th>
                            <th class="px-6 py-5 text-center text-gray-600 font-semibold text-sm bg-gray-50 w-1/3">
                                Other Franchise
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Starting Investment</td>
                            <td class="px-6 py-4 text-center bg-green-50/50 font-bold text-gray-800">₹13 Lakh</td>
                            <td class="px-6 py-4 text-center text-gray-600">₹20 Lakh+</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Monthly Earnings Potential</td>
                            <td class="px-6 py-4 text-center bg-green-50/50 font-bold text-gray-800">₹2 Lakh+</td>
                            <td class="px-6 py-4 text-center text-gray-600">₹1.5 Lakh+</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Store Opening Guarantee</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ 45 Days</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗ Not stated</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Free Accounting (3 months)</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Included</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Zero Royalty Period</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Forever</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Exclusive Territory</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Protected</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Limited</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Free Business Website</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ 2 Years</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Free Digital Marketing</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Included</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Staff Hiring Support</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Full support</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-[#109125] font-semibold text-sm">✓ Included</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Dedicated Franchise Manager</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Personal</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Team</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">ROI Calculator on Page</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Live tool</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-gray-600 text-sm">Investment Breakdown (Transparent)</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Detailed</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Basic</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-10">
                <a href="#apply-form"
                    onclick="document.querySelector('#applyPageForm').scrollIntoView({behavior:'smooth'}); return false;"
                    class="bg-[#ec2024] hover:bg-red-700 text-white font-extrabold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 hover:-translate-y-0.5 inline-block shadow-lg">
                    Apply Now & Claim Your Territory →
                </a>
            </div>
        </div>
    </section>
    <section class="bg-white border-t border-b border-gray-200 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-6">
            <div class="text-center mb-6" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Our Product Range</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-2">10,000+ Products from India's Top
                    Brands
                </h2>
                <p class="text-gray-500 max-w-xl mx-auto text-sm">Every category your customers need — all under one roof,
                    sourced
                    directly from manufacturers.
                </p>
            </div>
            <div class="flex flex-wrap justify-center gap-2 mb-6" data-aos="fade-up">
                @foreach (['🥛 Dairy', '🥦 Fresh Produce', '🛒 Staples', '🧴 Personal Care', '🏠 Home Care', '🍿 Snacks', '🌾 Organic', '🥤 Beverages', '👶 Baby Care', '🐾 Pet Care'] as $cat)
                    <span
                        class="bg-green-50 border border-green-100 text-[#055346] text-xs font-semibold px-4 py-1.5 rounded-full">{{ $cat }}</span>
                @endforeach
            </div>
        </div>
        <div class="border-t border-b border-gray-100 py-0 overflow-hidden">
            <div class="flex brand-marquee" style="width: max-content">
                @php
                    $brands = [
                        ['amul', 'Amul'],
                        ['nestle', 'Nestlé'],
                        ['britannia', 'Britannia'],
                        ['parle', 'Parle'],
                        ['itc', 'ITC'],
                        ['hul', 'HUL'],
                        ['dabur', 'Dabur'],
                        ['marico', 'Marico'],
                        ['godrej', 'Godrej'],
                        ['patanjali', 'Patanjali'],
                        ['colgate', 'Colgate'],
                        ['pg', 'P&G'],
                        ['haldirams', 'Haldirams'],
                        ['mtr', 'MTR'],
                    ];
                @endphp
                @foreach (array_merge($brands, $brands) as [$slug, $brand])
                    <div class="brand-logo-item flex-shrink-0 flex items-center justify-center border-r border-gray-100"
                        style="padding: 0 24px; height: 80px; min-width: 140px">
                        @if (file_exists(public_path("custom/brands/{$slug}.png")))
                            <img src="{{ asset("custom/brands/{$slug}.png") }}" alt="{{ $brand }}"
                                class="max-h-10 w-auto object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                        @else
                            <span
                                class="text-gray-400 font-bold text-sm tracking-wide hover:text-[#055346] transition-colors duration-300 select-none">{{ $brand }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center mb-6" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">As Featured On</span>
                <p class="text-gray-500 text-sm mt-2">Recognized by top media houses and industry publications</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4" data-aos="fade-up" data-aos-delay="100">
                @foreach ([['Times of India', 'TOI'], ['Economic Times', 'ET'], ['Franchise India', 'FI'], ['YourStory', 'YS'], ['Business Today', 'BT']] as [$name, $abbr])
                    <div
                        class="bg-gray-50 rounded-xl p-6 border border-gray-100 flex items-center justify-center hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                        <span class="text-gray-400 font-bold text-lg tracking-wide">{{ $abbr }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-16 bg-[#060f0c] relative overflow-hidden" x-data="{
        videoModal: false,
        videoSrc: '',
        lightbox: false,
        lightboxIndex: 0,
        images: [
            { src: '{{ asset('custom/1.webp') }}', alt: 'Store Interior' },
            { src: '{{ asset('custom/2.webp') }}', alt: 'Fresh Produce' },
            { src: '{{ asset('custom/3.webp') }}', alt: 'Billing Counter' },
            { src: '{{ asset('custom/4.webp') }}', alt: 'Dairy Aisle' },
            { src: '{{ asset('custom/5.webp') }}', alt: 'Grand Opening' },
            { src: '{{ asset('custom/6.webp') }}', alt: 'Staff Training' },
            { src: '{{ asset('custom/7.webp') }}', alt: 'Snacks Section' },
            { src: '{{ asset('custom/8.webp') }}', alt: 'Store Branding' },
            { src: '{{ asset('custom/9.webp') }}', alt: 'Happy Customers' },
        ],
        openLightbox(i) {
            this.lightboxIndex = i;
            this.lightbox = true
        },
        prevImage() { this.lightboxIndex = (this.lightboxIndex - 1 + this.images.length) % this.images.length },
        nextImage() { this.lightboxIndex = (this.lightboxIndex + 1) % this.images.length },
        openVideo(src) {
            this.videoSrc = src;
            this.videoModal = true
        },
        closeVideo() {
            this.videoModal = false;
            this.videoSrc = ''
        }
    }"
        @keydown.escape.window="lightbox = false; closeVideo()" @keydown.arrow-left.window="if(lightbox) prevImage()"
        @keydown.arrow-right.window="if(lightbox) nextImage()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#4ade80] text-sm font-bold uppercase tracking-widest">Inside 7x Basket</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2 mb-3">Our Stores & Stories</h2>
                <p class="text-[#6b8f7e] max-w-xl mx-auto">A look inside our franchise stores across India.</p>
            </div>
            <div x-data="{
                current: 0,
                total: 3,
                timer: null,
                init() { this.timer = setInterval(() => { this.current = (this.current + 1) % this.total }, 3500) }
            }" x-init="init()" @mouseenter="clearInterval(timer)"
                @mouseleave="timer = setInterval(() => { current = (current + 1) % total }, 3500)"
                class="relative overflow-hidden rounded-2xl mb-16" data-aos="fade-up">
                <div class="flex transition-transform duration-700 ease-in-out"
                    :style="`transform: translateX(-${current * 100}%)`">
                    @php $slideIndex = 0; @endphp
                    @foreach ([[['custom/1.webp', 'Store Interior'], ['custom/2.webp', 'Fresh Produce'], ['custom/3.webp', 'Billing Counter']], [['custom/4.webp', 'Dairy Aisle'], ['custom/5.webp', 'Grand Opening'], ['custom/6.webp', 'Staff Training']], [['custom/7.webp', 'Snacks Section'], ['custom/8.webp', 'Store Branding'], ['custom/9.webp', 'Happy Customers']]] as $slideNum => $slide)
                        <div class="min-w-full grid grid-cols-1 sm:grid-cols-3 gap-3 px-0">
                            @foreach ($slide as $imgIdx => [$img, $alt])
                                @php $globalIndex = $slideNum * 3 + $imgIdx; @endphp
                                <div class="relative overflow-hidden rounded-xl aspect-[4/3] bg-gray-200 group cursor-pointer"
                                    @click="openLightbox({{ $globalIndex }})">
                                    <img src="{{ asset($img) }}" alt="{{ $alt }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <div
                                        class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all duration-300 flex items-center justify-center">
                                        <div
                                            class="opacity-0 group-hover:opacity-100 transition-all duration-300 w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black/60 to-transparent">
                                        <p class="text-white text-xs font-semibold">{{ $alt }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <button @click="current = (current - 1 + total) % total"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/80 hover:bg-white rounded-full shadow flex items-center justify-center transition-all">
                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="current = (current + 1) % total"
                    class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/80 hover:bg-white rounded-full shadow flex items-center justify-center transition-all">
                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
                    @for ($i = 0; $i < 3; $i++)
                        <button @click="current = {{ $i }}"
                            :class="current === {{ $i }} ? 'bg-white w-5' : 'bg-white/50 w-2'"
                            class="h-2 rounded-full transition-all duration-300"></button>
                    @endfor
                </div>
            </div>
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-1">Have Doubts? These Videos Will Help!</h2>
                <p class="text-[#6b8f7e] text-sm">Watch real stories and expert insights about 7x Basket franchise.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-16">
                @foreach ([['custom/7x_Basket_Store.png', 'How to Start a 7x Basket Franchise', 'Investment & ROI Explained', 'Expert Guide', ''], ['custom/7x_Basket_Store.png', 'Franchise Offer — Start Your Supermarket', '₹5L Investment, High Returns', 'Business Overview', ''], ['custom/7x_Basket_Store.png', 'Supermarket Grocery Store Business', 'Full Setup Guide for Beginners', 'Step-by-Step', '']] as [$img, $title, $subtitle, $tag, $ytId])
                    <div class="relative rounded-2xl overflow-hidden cursor-pointer group aspect-video shadow-lg border border-white/10"
                        @click="openVideo('https://www.youtube.com/embed/{{ $ytId }}')" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 80 }}">
                        <img src="{{ asset($img) }}" alt="{{ $title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-[#1a5c38]/80 to-black/70 group-hover:from-[#1a5c38]/90 transition-all duration-300">
                        </div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="bg-[#f5a623] text-[#1a1a1a] text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wide">{{ $tag }}</span>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-14 h-14 bg-[#f5a623] rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:bg-white transition-all duration-300">
                                <svg class="w-6 h-6 text-[#1a5c38] ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <p class="text-white font-bold text-sm leading-tight mb-0.5">{{ $title }}</p>
                            <p class="text-[#f5a623] text-xs font-medium">{{ $subtitle }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-1">What Our Franchise Partner Says</h2>
                <p class="text-[#6b8f7e] text-sm">Hear directly from our franchise owners across India.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([['custom/7x_Basket_Store.png', 'Rajesh Kumar', 'Delhi', 'Super Store Owner', '"Turned profitable in 8 months. Best decision of my life."'], ['custom/7x_Basket_Store.png', 'Priya Sharma', 'Mumbai', 'Mini Store Owner', '"Fresh products daily. Margins far better than independent stores."'], ['custom/7x_Basket_Store.png', 'Amit Patel', 'Ahmedabad', 'Hyper Store Owner', '"From training to launch — everything was smooth and on time."']] as [$img, $name, $city, $role, $quote])
                    <div class="relative rounded-2xl overflow-hidden cursor-pointer group aspect-video shadow-lg border border-white/10"
                        @click="openVideo('https://www.youtube.com/embed/')" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 80 }}">
                        <img src="{{ asset($img) }}" alt="{{ $name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-[#1a5c38]/85 to-black/75 group-hover:from-[#1a5c38]/90 transition-all duration-300">
                        </div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="bg-[#f5a623] text-[#1a1a1a] text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wide">Partner
                                Story</span>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-14 h-14 bg-white/20 border-2 border-white/60 rounded-full flex items-center justify-center shadow-2xl group-hover:bg-[#f5a623] group-hover:border-[#f5a623] transition-all duration-300">
                                <svg class="w-6 h-6 text-white ml-1 group-hover:text-[#1a5c38]" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <p class="text-[#f5a623] text-xs font-medium italic mb-1.5">{{ $quote }}</p>
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-7 h-7 bg-[#1a5c38] border-2 border-[#f5a623] rounded-full flex items-center justify-center text-white text-xs font-extrabold flex-shrink-0">
                                    {{ substr($name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-white font-bold text-sm leading-none">{{ $name }}</p>
                                    <p class="text-white/60 text-[10px]">{{ $role }} · {{ $city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div x-show="lightbox" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center" @click.self="lightbox = false"
            style="display:none">
            <button @click="lightbox = false"
                class="absolute top-4 right-4 w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-all z-10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="absolute top-4 left-1/2 -translate-x-1/2 text-white/60 text-sm z-10">
                <span x-text="lightboxIndex + 1"></span> / <span x-text="images.length"></span>
            </div>
            <button @click="prevImage()"
                class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 hover:bg-white/25 rounded-full flex items-center justify-center text-white transition-all z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div class="max-w-5xl w-full px-20">
                <img :src="images[lightboxIndex].src" :alt="images[lightboxIndex].alt"
                    class="w-full max-h-[80vh] object-contain rounded-xl shadow-2xl">
                <p class="text-white/70 text-sm text-center mt-3" x-text="images[lightboxIndex].alt"></p>
            </div>
            <button @click="nextImage()"
                class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 hover:bg-white/25 rounded-full flex items-center justify-center text-white transition-all z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-1.5">
                <template x-for="(img, i) in images" :key="i">
                    <button @click="lightboxIndex = i" :class="lightboxIndex === i ? 'bg-white w-5' : 'bg-white/30 w-2'"
                        class="h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
        <div x-show="videoModal" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4"
            @click.self="closeVideo()" style="display:none">
            <button @click="closeVideo()"
                class="absolute top-4 right-4 w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="w-full max-w-4xl aspect-video rounded-xl overflow-hidden shadow-2xl">
                <iframe x-show="videoModal" :src="videoSrc + '?autoplay=1'" class="w-full h-full" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <section class="py-12 bg-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Success Stories</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">What Our Partners Say</h2>
                <p class="text-gray-500 max-w-xl mx-auto">500+ franchise partners across India. Here's what they have to
                    say.</p>
            </div>

            <div x-data="{
                current: 0,
                items: 9,
                timer: null,
                visible() { return window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1 },
                prev() { this.current = this.current === 0 ? this.items - this.visible() : this.current - 1 },
                next() { this.current = this.current >= this.items - this.visible() ? 0 : this.current + 1 },
                init() { this.timer = setInterval(() => this.next(), 3000) }
            }" x-init="init()" @mouseenter="clearInterval(timer)"
                @mouseleave="timer = setInterval(() => next(), 3000)" class="relative">

                <button @click="prev()"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-md flex items-center justify-center hover:bg-[#055346] hover:text-white hover:border-[#055346] transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <div class="overflow-hidden mx-6">
                    <div class="flex transition-transform duration-500 ease-in-out gap-4"
                        :style="`transform: translateX(calc(-${current * (100 / visible())}% - ${current * 16 / visible()}px))`">

                        @php
                            $testimonials = [
                                [
                                    'Rajesh Kumar',
                                    'Delhi',
                                    'Super Store',
                                    'Joining 7x Basket was the best business decision I made. Turned profitable in 8 months. The support team is always available.',
                                ],
                                [
                                    'Priya Sharma',
                                    'Mumbai',
                                    'Mini Store',
                                    'The supply chain is excellent. Fresh products daily and margins are much better than running an independent store.',
                                ],
                                [
                                    'Amit Patel',
                                    'Ahmedabad',
                                    'Hyper Store',
                                    'From training to launch, everything was smooth. The technology platform makes inventory management effortless.',
                                ],
                                [
                                    'Sunita Verma',
                                    'Jaipur',
                                    'Super Store',
                                    'Zero royalty model is a game changer. I keep all my profits and the brand name brings customers in without extra marketing.',
                                ],
                                [
                                    'Kiran Reddy',
                                    'Hyderabad',
                                    'Mini Store',
                                    'The dedicated relationship manager helped me through every step. My store broke even in just 6 months.',
                                ],
                                [
                                    'Manoj Singh',
                                    'Lucknow',
                                    'Super Store',
                                    'I was skeptical at first but the 45-day launch timeline is real. My store was up and running exactly on schedule.',
                                ],
                                [
                                    'Deepa Nair',
                                    'Kochi',
                                    'Hyper Store',
                                    'The POS system and inventory app are incredibly easy to use. Customer loyalty program keeps them coming back.',
                                ],
                                [
                                    'Vikram Joshi',
                                    'Pune',
                                    'Mini Store',
                                    'Best investment I have made. The brand recognition alone drives footfall. 7x Basket is trusted before they walk in.',
                                ],
                                [
                                    'Anita Gupta',
                                    'Chandigarh',
                                    'Super Store',
                                    'National marketing campaigns save me so much time and money. I just focus on running the store and customers keep coming.',
                                ],
                            ];
                        @endphp

                        @foreach ($testimonials as $t)
                            <div
                                class="flex-shrink-0 w-full sm:w-[calc(50%-8px)] lg:w-[calc(33.333%-11px)] bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                                <div class="flex gap-0.5 mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 text-[#ec2024]" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-gray-700 text-sm leading-relaxed mb-4 italic">"{{ $t[3] }}"</p>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 bg-[#055346] rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                        {{ substr($t[0], 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900 text-sm">{{ $t[0] }}</p>
                                        <p class="text-xs text-gray-400">{{ $t[2] }} · {{ $t[1] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <button @click="next()"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-md flex items-center justify-center hover:bg-[#055346] hover:text-white hover:border-[#055346] transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div class="flex justify-center gap-2 mt-6">
                    @for ($i = 0; $i < 9; $i++)
                        <button @click="current = {{ $i }}"
                            :class="current === {{ $i }} ? 'bg-[#055346] w-5' : 'bg-gray-300 w-2'"
                            class="h-2 rounded-full transition-all duration-300"></button>
                    @endfor
                </div>

            </div>
        </div>
    </section>
    <section class="py-16" style="background-color: #f0f7f3">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">FAQ</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">
                    Frequently Asked Questions
                </h2>
                <p class="text-gray-500 text-sm">
                    Everything you need to know before starting your franchise journey.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4" x-data="{ open: null }">
                @foreach ([
            ['What is the minimum investment required?', 'The minimum investment for a 7x Basket Mini Store starts at ₹5 Lakhs, which includes franchise fee, store setup, and initial inventory.'],
            ['Is there any royalty fee?', 'No. 7x Basket charges zero royalty. You keep 100% of your profits. We earn through the supply chain, not from your revenue.'],
            ['How long does it take to open a store?', 'From application to grand opening typically takes 45–60 days, depending on location readiness and agreement completion.'],
            ['Do I need prior retail experience?', 'No prior experience is required. We provide comprehensive training covering operations, inventory, customer service, and technology.'],
            ['What support do I get after opening?', 'You get a dedicated relationship manager, monthly performance reviews, marketing support, supply chain management, and 24/7 technical support.'],
            ['Can I open multiple stores?', 'Yes. Many of our partners operate 2–5 stores. Multi-store partners get additional discounts and priority support.'],
        ] as [$q, $a])
                    <div class="bg-white rounded-xl border overflow-hidden transition-all duration-300"
                        :class="open === {{ $loop->index }} ? 'border-[#d4e8dc] shadow-md' : 'border-[#d4e8dc] shadow-sm'"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="flex">
                            <!-- Left Accent -->
                            <div class="w-1 flex-shrink-0 rounded-l-xl transition-all duration-300"
                                :class="open === {{ $loop->index }} ? 'bg-[#f5a623]' : 'bg-transparent'"></div>
                            <div class="flex-1">
                                <!-- Question -->
                                <button @click="open === {{ $loop->index }} ? open = null : open = {{ $loop->index }}"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left">
                                    <span class="font-semibold text-gray-900 text-sm pr-4 leading-snug">
                                        {{ $q }}
                                    </span>
                                    <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center transition-all duration-300"
                                        :class="open === {{ $loop->index }} ? 'bg-[#1a5c38]' : 'bg-[#f0f7f3]'">
                                        <svg :class="open === {{ $loop->index }} ? 'rotate-180 text-white' : 'text-[#1a5c38]'"
                                            class="w-4 h-4 transition-all duration-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </button>
                                <!-- Answer -->
                                <div x-show="open === {{ $loop->index }}"
                                    x-transition:enter="transition ease-out duration-250"
                                    x-transition:enter-start="opacity-0 -translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-1" class="px-5 pb-5">
                                    <p class="text-sm text-gray-500 leading-relaxed border-t border-[#f0f7f3] pt-3">
                                        {{ $a }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-12 bg-[#ffffff] text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <span
                class="border border-[#109125]/30 text-[#109125] text-xs font-bold px-3 py-1 rounded-full inline-block">Join
                the Network</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-5 leading-tight">
                You've Read Our Story.<br>Now <span class="text-[#109125]">Write Yours.</span>
            </h2>
            <p class="text-gray-500 text-sm mt-3 max-w-lg mx-auto">200+ entrepreneurs trusted us to help them build
                something real. You could be next. Apply today — our team calls you within 30 minutes.
            </p>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <a href="#"
                    onclick="document.querySelector('#applyPageForm').scrollIntoView({behavior:'smooth'}); return false;"
                    class="bg-[#ec2024] hover:bg-red-700 text-white font-bold px-7 py-3 rounded-xl transition-all duration-200 hover:-translate-y-0.5 text-sm">Apply
                    for Franchise →</a>
                <a href="https://wa.me/919870275327" target="_blank"
                    class="bg-white hover:bg-gray-50 text-gray-700 font-bold px-7 py-3 rounded-xl border border-gray-200 transition-all duration-200 text-sm">💬
                    Chat on WhatsApp</a>
                <a href="tel:+919870275327"
                    class="bg-white hover:bg-gray-50 text-gray-700 font-bold px-7 py-3 rounded-xl border border-gray-200 transition-all duration-200 text-sm">📞
                    +91 98702 75327</a>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('applyPageForm');
            if (!form) return;
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var btn = document.getElementById('applyPageSubmit');
                var msg = document.getElementById('applyFormMsg');
                btn.disabled = true;
                btn.textContent = 'Submitting�';
                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        },
                        body: new FormData(form)
                    })
                    .then(r => r.json())
                    .then(json => {
                        msg.classList.remove('hidden');
                        if (json.success) {
                            msg.className =
                                'rounded-xl px-4 py-3 text-sm font-medium mb-4 text-center bg-green-50 text-green-700 border border-green-200';
                            msg.textContent = json.message;
                            form.reset();
                            btn.textContent = 'Submitted ✓';
                        } else {
                            msg.className =
                                'rounded-xl px-4 py-3 text-sm font-medium mb-4 text-center bg-red-50 text-red-700 border border-red-200';
                            msg.textContent = json.message || 'Something went wrong. Please try again.';
                            btn.disabled = false;
                            btn.textContent = 'YES! I Want to Open My Supermarket Franchise →';
                        }
                    })
                    .catch(() => {
                        msg.classList.remove('hidden');
                        msg.className =
                            'rounded-xl px-4 py-3 text-sm font-medium mb-4 text-center bg-red-50 text-red-700 border border-red-200';
                        msg.textContent = 'Network error. Please try again.';
                        btn.disabled = false;
                        btn.textContent = 'YES! I Want to Open My Supermarket Franchise →';
                    });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof AOS !== 'undefined') AOS.init({
                once: true,
                offset: 60
            });
        });
        (function() {
            var ctx = document.getElementById('groceryChart');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['2019', '2020', '2021', '2022', '2023', '2024', '2025*'],
                    datasets: [{
                        label: 'Market Size (USD Billion)',
                        data: [490, 535, 571, 595, 608, 627, 700],
                        backgroundColor: [
                            'rgba(16,145,37,0.2)', 'rgba(16,145,37,0.3)', 'rgba(16,145,37,0.45)',
                            'rgba(16,145,37,0.6)', 'rgba(16,145,37,0.75)', 'rgba(16,145,37,0.9)',
                            'rgba(236,32,36,0.85)',
                        ],
                        borderColor: ['#109125', '#109125', '#109125', '#109125', '#109125', '#109125',
                            '#ec2024'
                        ],
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(c) {
                                    return ' $' + c.parsed.y + 'B';
                                }
                            }
                        },
                        datalabels: false
                    },
                    layout: {
                        padding: {
                            top: 24
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 450,
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            },
                            ticks: {
                                font: {
                                    size: 11
                                },
                                callback: function(v) {
                                    return '$' + v + 'B';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 11
                                }
                            }
                        }
                    },
                    animation: {
                        onComplete: function() {
                            var chart = this;
                            var ctx2 = chart.ctx;
                            ctx2.font = 'bold 11px Inter, sans-serif';
                            ctx2.fillStyle = '#374151';
                            ctx2.textAlign = 'center';
                            ctx2.textBaseline = 'bottom';
                            chart.data.datasets.forEach(function(dataset, i) {
                                var meta = chart.getDatasetMeta(i);
                                meta.data.forEach(function(bar, index) {
                                    var val = dataset.data[index];
                                    ctx2.fillText('$' + val + 'B', bar.x, bar.y - 4);
                                });
                            });
                        }
                    }
                }
            });
        })();
    </script>
@endsection
