@extends('layouts.app')
@section('content')
    <section
        class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] min-h-screen flex items-center">
        <div class="absolute inset-0 bg-black/45 z-0 pointer-events-none"></div>
        <div class="blob w-96 h-96 bg-[#109125] top-[-80px] left-[-80px]"></div>
        <div class="blob w-72 h-72 bg-[#ec2024] bottom-[-60px] right-[10%]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 pt-6 w-full relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div data-aos="fade-right" data-aos-duration="800">
                    <span
                        class="inline-flex items-center gap-2 bg-white/10 text-white text-xs font-semibold px-4 py-1.5 rounded-full mb-6 backdrop-blur-sm border border-white/20">
                        <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                        India's Fastest-Growing Supermarket Franchise
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                        Own a <span class="text-[#4ade80]">Supermarket Franchise</span>
                        in India - Start with 7x Basket
                    </h1>
                    <p class="text-green-100 text-lg leading-relaxed mb-8 max-w-lg">When you open a 7x Basket
                        store, you get the brand, the supply chain, the technology, and a team that stays with you after day
                        one.

                    </p>
                    <div class="flex flex-wrap gap-4 mb-5">
                        <a href="#" onclick="openLeadPopup(); return false;"
                            class="inline-block bg-[#f5a623] hover:bg-[#e09610] text-[#1a1a1a] font-extrabold px-8 py-4 rounded-xl text-base shadow-[0_4px_20px_rgba(245,166,35,0.5)] hover:shadow-[0_6px_28px_rgba(245,166,35,0.65)] hover:-translate-y-0.5 transition-all duration-200">
                            Apply Now →
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-8 mb-5">
                        @foreach ([['150+', 'Franchise Partners'], ['₹13L', 'Min. Investment'], ['0', 'Royalty Fee - 2 Years']] as [$n, $l])
                            <div>
                                <p class="text-3xl font-extrabold text-white">{{ $n }}</p>
                                <p class="text-green-200 text-sm">{{ $l }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200" class="relative hidden lg:block">
                    <div class="relative bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 scale-80">
                        <img src="{{ asset('custom/7x_Basket_Store.png') }}" alt="7x Basket Store"
                            class="w-full object-cover rounded-2xl">
                        <div
                            class="absolute -top-4 -right-4 bg-[#ec2024] text-white text-xs font-bold px-3 py-2 rounded-xl shadow-lg">
                            4.9/5 Rating
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 bg-white text-[#055346] text-xs font-bold px-3 py-2 rounded-xl shadow-lg">
                            ✓ FSSAI Certified
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 -mb-px">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                style="display:block">
                <path d="M0 60L1440 60L1440 20C1200 60 960 0 720 20C480 40 240 0 0 20L0 60Z" fill="white" />
            </svg>
        </div>
    </section>
    <section class="py-10 bg-white -mt-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ([['🏛️', 'FSSAI', 'Certified'], ['📋', 'GST', 'Registered'], ['⭐', '4.9/5', 'Customer Rating'], ['📅', '5+', 'Years in Business'], ['🏆', '15+', 'Industry Awards']] as [$icon, $val, $label])
                    <div class="card-hover bg-gray-50 rounded-2xl p-5 text-center border border-gray-100" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="text-3xl mb-2">{{ $icon }}</div>
                        <p class="text-xl font-extrabold text-[#055346]">{{ $val }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-[#ec2024] text-sm font-bold uppercase tracking-widest">Why Most Independent Grocery Stores
                    Fail
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">7x Basket: The Problems We Solve
                </h2>
                <p class="text-gray-500 mx-auto">Running a grocery store on your own is harder than it looks.
                    Stock shortages, thin margins, unreliable suppliers, no brand pull - these are daily battles for any
                    standalone store owner. 7x Basket is built to fix every one of them.
                </p>
            </div>

            <div class="space-y-4">
                @foreach ([
            ['😰', 'No Brand Recognition', 'Customers don\'t walk into stores they don\'t know or trust.', 'Instant credibility on day one. The 7x Basket name on your storefront signals quality and trust before a single word is spoken.'],
            ['📦', 'Supply Chain Issues', 'Sourcing fresh stock daily is unpredictable, expensive, and time-consuming.', 'Direct sourcing from top FMCG manufacturers. Reliable daily delivery, so your shelves are never empty.'],
            ['💸', 'High Operating Costs', 'Buying in small quantities means paying full retail margins with no room to compete on price.', 'Our bulk buying power gives your store wholesale pricing — so you offer better prices to shoppers while protecting your margins.'],
            ['📊', 'No Technology', 'Manual billing and paper-based inventory tracking leads to costly errors and stock losses.', 'Cloud-based POS, real-time inventory tracking, and a business analytics app — fully installed and staff-trained before opening.'],
            ['🎓', 'No Staff Training', 'Untrained staff hurt customer experience and drive repeat footfall away permanently.', 'Full onboarding and staff training provided before your grand opening. Your team is ready before the doors open.'],
            ['📣', 'Zero Marketing', 'Without brand visibility, there is no footfall. No footfall means no revenue.', 'National brand campaigns, local area marketing, and social media — all managed for you, at no extra cost.'],
        ] as [$icon, $problem, $desc, $solution])
                    <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            {{-- Problem side --}}
                            <div
                                class="flex items-start gap-4 p-5 md:p-6 bg-[#fff5f5] border-b md:border-b-0 md:border-r border-red-100">
                                <div
                                    class="w-12 h-12 bg-[#ec2024]/10 border border-[#ec2024]/20 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                                    {{ $icon }}
                                </div>
                                <div>
                                    <span
                                        class="inline-block text-[10px] font-extrabold uppercase tracking-widest text-[#ec2024] bg-[#ec2024]/10 px-2.5 py-0.5 rounded-full mb-1.5">❌
                                        Problem</span>
                                    <p class="font-extrabold text-gray-900 text-sm mb-1">{{ $problem }}</p>
                                    <p class="text-xs text-gray-600 leading-relaxed">{{ $desc }}</p>
                                </div>
                            </div>
                            {{-- Solution side --}}
                            <div
                                class="flex items-start gap-4 p-5 md:p-6 bg-[#f0fdf4] border-t md:border-t-0 border-green-100">
                                <div
                                    class="w-12 h-12 bg-[#109125]/15 border border-[#109125]/25 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-[#109125]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <span
                                        class="inline-block text-[10px] font-extrabold uppercase tracking-widest text-[#109125] bg-[#109125]/10 px-2.5 py-0.5 rounded-full mb-1.5">✅
                                        7x Basket Fix</span>
                                    <p class="text-sm text-[#14532d] font-semibold leading-relaxed">{{ $solution }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-16 bg-[#060f0c] relative overflow-hidden">
        <div class="blob w-[500px] h-[500px] bg-[#109125]/10 top-[-100px] left-[-150px]"></div>
        <div class="blob w-80 h-80 bg-[#ec2024]/10 bottom-[-80px] right-[-80px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <div data-aos="fade-left" data-aos-delay="100" class="lg:sticky lg:top-8">
                    <span class="text-[#4ade80] text-sm font-bold uppercase tracking-widest">Why 7x Basket</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-2 mb-4">Why 7x Basket Is The Right Grocery
                        Franchise To Start In India
                    </h2>
                    <p class="text-[#c8e8d8] text-sm leading-relaxed mb-6">
                        Starting a grocery supermarket from scratch takes capital, supplier relationships, technology, and a
                        name people trust. 7x Basket gives you all four on day one. This is not a licence to paste a logo on
                        a wall - it is a full grocery retail operation with a dedicated team behind it.
                    </p>
                    <div class="space-y-3 mb-8">
                        @foreach (['Exclusive territory rights - no 7x Basket store competes with yours', 'Access to 6 product categories covering every everyday household need', 'Dedicated relationship manager assigned to your store from the start', 'Digital marketing and social media handled by the central team', 'Zero royalty fees for the first 2 years of operation'] as $item)
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-5 h-5 bg-[#109125] rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-[#c8e8d8] text-sm">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                    <a href="#" onclick="openLeadPopup(); return false;"
                        class="inline-block bg-[#ec2024] hover:bg-red-600 text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 text-base shadow-lg hover:-translate-y-0.5">
                        👉 Apply Franchise
                    </a>
                </div>
                <div class="flex flex-col gap-4" data-aos="fade-right">
                    <div class="grid grid-cols-2 gap-4" style="grid-auto-rows: 1fr">
                        @foreach ([
            [1, '💰', 'High-Profit Margins', 'Attractive profit margins built into every product category. Bulk procurement keeps your costs low and your earnings higher than a standalone store.'],

            [2, '📈', 'Proven Model', 'A franchise model with a real track record across 150+ live stores. You are not the first - you are joining a system that already works.'],

            [3, '🤝', 'End-to-End Support', 'From site selection and store design to daily operations and marketing - our team supports you at every stage. You are never on your own.'],

            [4, '💡', 'Business Technology', 'Cloud-based POS, inventory software, expiry tracking, and a business analytics dashboard. Manage your store from your phone, not a paper register.'],

            [5, '🛍️', 'Diverse Product Range', 'Groceries, personal care, household supplies, beverages, kitchen items, and stationery - 6 product categories covering every daily need.'],

            [6, '🏷️', 'Established Brand', '7x Basket is a recognised grocery brand trusted by shoppers across India. Brand recognition brings customers in before you spend a single rupee on ads.'],
        ] as [$num, $icon, $title, $desc])
                            <div class="relative bg-[#0d1f18] border border-[#1a3328] rounded-xl p-4 hover:border-[#109125]/60 hover:bg-[#0f2318] transition-all duration-300 overflow-hidden flex flex-col justify-center"
                                data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                                <span
                                    class="absolute top-2 right-3 text-5xl font-extrabold text-white/[0.04] leading-none select-none">{{ $num }}</span>
                                <div class="flex items-center gap-2 mb-1.5 relative z-10">
                                    <span class="text-sm leading-none">{{ $icon }}</span>
                                    <p class="font-bold text-[#c8e8d8] text-sm leading-tight">{{ $title }}</p>
                                </div>
                                <p class="text-[#c8e8d8] text-xs leading-relaxed relative z-10">{{ $desc }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center">
                        <div class="relative bg-[#0d1f18] border border-[#1a3328] rounded-xl p-4 hover:border-[#109125]/60 hover:bg-[#0f2318] transition-all duration-300 overflow-hidden flex flex-col justify-center w-1/2"
                            data-aos="fade-up" data-aos-delay="360">
                            <span
                                class="absolute top-2 right-3 text-5xl font-extrabold text-white/[0.04] leading-none select-none">7</span>
                            <div class="flex items-center gap-2 mb-1.5 relative z-10">
                                <span class="text-sm leading-none">🤝</span>
                                <p class="font-bold text-[#c8e8d8] text-sm leading-tight">Franchisee Network</p>
                            </div>
                            <p class="text-[#c8e8d8] text-xs leading-relaxed relative z-10">Connect with 150+ franchise
                                partners across India. Share experiences, best practices, and local market insights. You
                                grow alongside a community that has your back.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-white" id="plans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Store Plans</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">Store Model Comparison</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Three store formats built for every budget and market size. Pick
                    the one that fits your investment capacity and local opportunity.</p>
            </div>

            <div class="overflow-x-auto rounded-2xl shadow-lg border border-gray-200" data-aos="fade-up"
                data-aos-delay="100">
                <table class="w-full min-w-[700px] border-collapse">
                    {{-- Header --}}
                    <thead>
                        <tr>
                            <th
                                class="bg-[#055346] text-white text-left px-5 py-4 text-sm font-extrabold uppercase tracking-wider w-[28%]">
                                Parameter
                            </th>
                            <th class="bg-[#109125] text-white px-5 py-4 text-center w-[24%]">
                                <div class="flex flex-col items-center gap-1">
                                    <span class="text-2xl">🏪</span>
                                    <span class="font-extrabold text-base leading-tight">Mini Store</span>
                                    <span class="text-green-200 text-xs font-medium">(500 – 1000 sqft)</span>
                                </div>
                            </th>
                            <th class="bg-[#076b58] text-white px-5 py-4 text-center w-[24%]">
                                <div class="flex flex-col items-center gap-1">
                                    <span class="text-2xl">🛒</span>
                                    <span class="font-extrabold text-base leading-tight">Super Store</span>
                                    <span class="text-green-200 text-xs font-medium">(1000 – 3000 sqft)</span>
                                </div>
                            </th>
                            <th class="bg-[#ec2024] text-white px-5 py-4 text-center w-[24%]">
                                <div class="flex flex-col items-center gap-1">
                                    <span class="text-2xl">🏢</span>
                                    <span class="font-extrabold text-base leading-tight">Hyper Store</span>
                                    <span class="text-red-200 text-xs font-medium">(3000 – 10000 sqft)</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $rows = [
                                ['💰', 'Investment Range', '₹13L – ₹22L', '₹23L – ₹62L', '₹63L – ₹2Cr'],
                                [
                                    '⭐',
                                    'Core Services<br><span class="font-normal text-gray-400">(Product setup, sourcing,<br>training, POS, branding)</span>',
                                    'Included',
                                    'Included',
                                    'Included',
                                ],
                                [
                                    '🛍️',
                                    'Product Range',
                                    'Essential categories',
                                    'Expanded categories',
                                    'Full categories + bulk',
                                ],
                                ['📋', 'Number of SKUs', '800 – 1500', '2000 – 5000', '5000 – 12000+'],
                                [
                                    '🏗️',
                                    'Store Layout Planning',
                                    'Standard layout',
                                    'Optimized layout',
                                    'Zoning & advanced layout',
                                ],
                                [
                                    '🖥️',
                                    'Billing System',
                                    'Single POS counter',
                                    '1 – 2 billing counters',
                                    'Multi-counter billing',
                                ],
                                ['👥', 'Staff Requirement', '1 – 3', '3 – 6', '6 – 12'],
                                [
                                    '📦',
                                    'Inventory Management',
                                    'Basic stock handling',
                                    'Category-wise management',
                                    'Advanced stock planning',
                                ],
                                [
                                    '🤝',
                                    'Supplier Advantage',
                                    'Standard sourcing',
                                    'Better rates (volume)',
                                    'Best rates (bulk)',
                                ],
                                ['📈', 'Daily Sales Potential', '₹30K – ₹60K', '₹60K – ₹1.5L', '₹1.5L – ₹5L+'],
                                ['💹', 'Gross Margin (Estimated)', '25% – 30%', '30% – 35%', '35% – 40%'],
                                ['⚙️', 'Operational Complexity', 'Low', 'Medium', 'High'],
                                ['⚡', 'Electricity & Running Cost', 'Low', 'Medium', 'High'],
                                ['😊', 'Customer Experience', 'Functional', 'Organized shopping', 'Premium experience'],
                                ['📊', 'Scalability', 'Limited', 'High', 'Very High'],
                                ['🎯', 'Best For', 'Entry-level investors', 'Most recommended', 'High-scale investors'],
                            ];
                        @endphp
                        @foreach ($rows as $i => [$icon, $param, $mini, $super, $hyper])
                            <tr
                                class="{{ $i % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} border-t border-gray-100 hover:bg-blue-50/30 transition-colors duration-150">
                                {{-- Parameter --}}
                                <td class="px-5 py-3.5 border-r border-gray-100">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-base flex-shrink-0">{{ $icon }}</span>
                                        <span
                                            class="text-sm font-semibold text-gray-800 leading-snug">{!! $param !!}</span>
                                    </div>
                                </td>
                                {{-- Mini --}}
                                <td class="px-5 py-3.5 text-center border-r border-gray-100">
                                    <span class="text-sm font-bold text-[#109125]">{{ $mini }}</span>
                                </td>
                                {{-- Super --}}
                                <td class="px-5 py-3.5 text-center border-r border-gray-100">
                                    <span class="text-sm font-bold text-[#076b58]">{{ $super }}</span>
                                </td>
                                {{-- Hyper --}}
                                <td class="px-5 py-3.5 text-center">
                                    <span class="text-sm font-bold text-[#ec2024]">{{ $hyper }}</span>
                                </td>
                            </tr>
                        @endforeach

                        {{-- CTA Row --}}
                        <tr class="border-t-2 border-gray-200 bg-gray-50">
                            <td class="px-5 py-4 text-sm font-bold text-gray-700">Apply Now</td>
                            <td class="px-5 py-4 text-center">
                                <a href="#" onclick="openLeadPopup(); return false;"
                                    class="inline-block bg-[#109125] hover:bg-[#0d7a1e] text-white text-xs font-bold px-5 py-2 rounded-lg transition-all duration-200">
                                    Apply →
                                </a>
                            </td>
                            <td class="px-5 py-4 text-center">
                                <a href="#" onclick="openLeadPopup(); return false;"
                                    class="inline-block bg-[#076b58] hover:bg-[#055346] text-white text-xs font-bold px-5 py-2 rounded-lg transition-all duration-200">
                                    Apply →
                                </a>
                            </td>
                            <td class="px-5 py-4 text-center">
                                <a href="#" onclick="openLeadPopup(); return false;"
                                    class="inline-block bg-[#ec2024] hover:bg-red-700 text-white text-xs font-bold px-5 py-2 rounded-lg transition-all duration-200">
                                    Apply →
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Disclaimer --}}
            <div class="mt-4 bg-[#055346] rounded-xl px-5 py-3 flex items-center gap-3" data-aos="fade-up"
                data-aos-delay="150">
                <span class="text-xl flex-shrink-0">⭐</span>
                <p class="text-white text-xs leading-relaxed">
                    <span class="font-bold">All store formats include complete support.</span>
                    <span class="text-yellow-300 ml-2">Sales and margin figures are indicative and depend on location,
                        product mix, and store operations.</span>
                </p>
            </div>
        </div>
    </section>
    <section class="py-12 bg-[#081510]" id="calculator">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#4ade80] text-sm font-bold uppercase tracking-widest">Smart Calculator</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#c8e8d8] mt-2 mb-3">Plan Your Franchise Investment
                </h2>
                <p class="text-[#4b7060]  mx-auto">Calculate startup costs and projected earnings — all in one
                    place.</p>
            </div>

            <div x-data="{ tab: 'cost' }" data-aos="fade-up" data-aos-delay="100">
                <div class="flex justify-center mb-6">
                    <div class="inline-flex bg-[#1a2e27] rounded-2xl p-1 gap-1">
                        <button @click="tab = 'cost'"
                            :class="tab === 'cost' ? 'bg-[#0f1f1a] text-[#4ade80] shadow-sm' :
                                'text-[#6b8f7e] hover:text-[#4ade80]'"
                            class="px-6 py-2.5 rounded-xl text-sm font-bold transition-all duration-200">
                            💰 Investment Calculator
                        </button>
                        <button @click="tab = 'earn'"
                            :class="tab === 'earn' ? 'bg-[#0f1f1a] text-[#4ade80] shadow-sm' :
                                'text-[#6b8f7e] hover:text-[#4ade80]'"
                            class="px-6 py-2.5 rounded-xl text-sm font-bold transition-all duration-200">
                            📈 Earnings Projection
                        </button>
                    </div>
                </div>

                {{-- ======================== STARTUP COSTS TAB ======================== --}}
                {{--
                Formula Source: Startup_Costs.xlsx → "Startup Cost Calculator"
                - Area Cost        = sqft × ₹2,000/sqft
                - Base Cost        = ₹2,10,000 (fixed) + 18% GST = ₹2,47,800
                - Additional Cost  = ₹40,000 (fixed) + 18% GST   = ₹47,200
                - Total Startup    = Area Cost + ₹2,47,800 + ₹47,200
                                   = (sqft × 2000) + ₹2,95,000
            --}}
                <div x-show="tab === 'cost'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <div x-data="{
                        area: 2000,
                        format: 'super',
                        
                        /* ── Configuration (can be made dynamic from backend) ── */
                        costPerSqFt: 2000,
                        franchiseBaseCost: 210000,
                        softwareBaseCost: 40000,
                        gstRate: 0.18,
                    
                        /* ── Format presets: sets default area when format is picked ── */
                        formats: {
                            mini: { icon: '🏪', label: 'Mini Store', size: '500–1000 sqft', default: 750 },
                            super: { icon: '🏬', label: 'Super Store', size: '1000–3000 sqft', default: 2000 },
                            hyper: { icon: '🏢', label: 'Hyper Store', size: '3000+ sqft', default: 5000 }
                        },
                    
                        selectFormat(key) {
                            this.format = key;
                            this.area = this.formats[key].default;
                        },
                    
                        /* ── Startup Cost Formulas (Excel-based with GST) ── */
                        get areaCost() { 
                            return this.area * this.costPerSqFt 
                        },
                        get franchiseCostWithGst() { 
                            return Math.round(this.franchiseBaseCost * (1 + this.gstRate))
                        },
                        get softwareCostWithGst() { 
                            return Math.round(this.softwareBaseCost * (1 + this.gstRate))
                        },
                        get totalStartup() { 
                            return this.areaCost + this.franchiseCostWithGst + this.softwareCostWithGst 
                        },
                    
                        /* ── Percentage calculations for progress bars ── */
                        get areaPercent() { 
                            return Math.round((this.areaCost / this.totalStartup) * 100) 
                        },
                        get franchisePercent() { 
                            return Math.round((this.franchiseCostWithGst / this.totalStartup) * 100) 
                        },
                        get softwarePercent() { 
                            return Math.round((this.softwareCostWithGst / this.totalStartup) * 100) 
                        },
                    
                        fmt(n) { return '₹' + Number(n).toLocaleString('en-IN') }
                    }"
                        class="bg-[#0f1f1a] border border-white/[0.08] rounded-3xl shadow-2xl overflow-hidden">

                        <div class="grid grid-cols-1 lg:grid-cols-2">

                            {{-- LEFT: Controls --}}
                            <div class="p-6 sm:p-8 border-b lg:border-b-0 lg:border-r border-white/[0.08]">
                                <p class="text-white font-bold text-base mb-5">Calculate Your Supermarket Franchise Startup
                                    Costs</p>

                                {{-- Supermarket Format --}}
                                <div class="mb-5">
                                    <label
                                        class="text-[#c8e8d8] text-xs font-bold uppercase tracking-wider block mb-3">Supermarket
                                        Format</label>
                                    <div class="grid grid-cols-3 gap-3">
                                        <template x-for="(f, key) in formats" :key="key">
                                            <button @click="selectFormat(key)"
                                                :class="format === key ?
                                                    'border-[#f5a623] bg-[#f5a623]/10 text-[#f5a623]' :
                                                    'border-white/20 text-[#9bbfb0] hover:border-white/40'"
                                                class="border-2 rounded-xl p-3 text-center transition-all duration-200 bg-transparent">
                                                <div class="text-2xl mb-1" x-text="f.icon"></div>
                                                <p class="text-xs font-bold" x-text="f.label"></p>
                                                <p class="text-[10px] text-[#6b8f7e]" x-text="f.size"></p>
                                            </button>
                                        </template>
                                    </div>
                                </div>

                                {{-- Store Area: Slider + Number Input --}}
                                <div class="mb-6">
                                    <div class="flex justify-between items-center mb-2">
                                        <label class="text-[#c8e8d8] text-xs font-bold uppercase tracking-wider">Store Area
                                            (sq ft)</label>
                                        <div
                                            class="flex items-center gap-1 bg-[#1a2e27] border border-white/20 rounded-lg px-2 py-1">
                                            <input type="number" x-model.number="area"
                                                @input="let v = Number($event.target.value); area = v > 10000 ? 10000 : (v || v === 0 ? v : area)"
                                                @blur="area = Math.min(10000, Math.max(500, Number($event.target.value) || 500))"
                                                class="w-20 bg-transparent text-[#f5a623] text-sm font-bold text-right outline-none appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none">
                                            <span class="text-[#6b8f7e] text-xs">sq ft</span>
                                        </div>
                                    </div>
                                    <input type="range" x-model.number="area" min="500" max="10000"
                                        step="100"
                                        class="w-full h-2 rounded-full appearance-none cursor-pointer accent-[#f5a623] bg-white/20">
                                    <div class="flex justify-between text-xs text-[#6b8f7e] mt-1">
                                        <span>500</span><span>5,000</span><span>10,000</span>
                                    </div>
                                </div>

                                <a href="#" onclick="openLeadPopup(); return false;"
                                    class="block w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold text-center py-3 rounded-xl transition-all duration-200 text-sm">
                                    Plan My Budget →
                                </a>
                            </div>

                            {{-- RIGHT: Results --}}
                            <div class="p-6 sm:p-8 bg-[#081510]">
                                <p class="text-[#9bbfb0] text-xs font-semibold uppercase tracking-wider mb-1">Total
                                    Estimated Investment</p>
                                <p class="text-5xl font-extrabold text-[#f5a623] mb-1" x-text="fmt(totalStartup)"></p>
                                <p class="text-[#6b8f7e] text-xs mb-6">Based on <span
                                        x-text="Number(area).toLocaleString('en-IN')"></span> sq ft store area</p>

                                {{-- Cost Breakdown --}}
                                <div class="space-y-4">
                                    <div>
                                        <div class="flex justify-between text-sm mb-1.5">
                                            <span class="text-[#9bbfb0] font-medium">Inventory Cost (Product Cost)</span>
                                            <span class="font-bold text-white" x-text="fmt(areaCost)"></span>
                                        </div>
                                        <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                            <div class="bg-[#109125] h-full rounded-full transition-all duration-500"
                                                :style="`width: ${areaPercent}%`"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-sm mb-1.5">
                                            <span class="text-[#9bbfb0] font-medium">Interior Cost (Store Interior)</span>
                                            <span class="font-bold text-white" x-text="fmt(franchiseCostWithGst)"></span>
                                        </div>
                                        <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                            <div class="bg-[#055346] h-full rounded-full transition-all duration-500"
                                                :style="`width: ${franchisePercent}%`"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-sm mb-1.5">
                                            <span class="text-[#9bbfb0] font-medium">Software Cost (incl. GST)</span>
                                            <span class="font-bold text-white" x-text="fmt(softwareCostWithGst)"></span>
                                        </div>
                                        <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                            <div class="bg-[#ec2024] h-full rounded-full transition-all duration-500"
                                                :style="`width: ${softwarePercent}%`"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ======================== EARNINGS PROJECTION TAB ======================== --}}
                {{--
                Formula Source: Earnings_Projection.xlsx → "ROI Calculator"
                - Startup Costs      = (area × 2000) + 2,47,800 + 47,200
                - Stock Investment   = ₹10,00,000 (fixed)
                - Total Setup Cost   = Startup Costs + Stock Investment
                - Monthly Sales      = area × 1333.33  (₹40L/month per 3000 sqft)
                - Gross Profit       = Monthly Sales × 25%
                - Area Expense       = area × ₹126/sqft
                - Discount           = Monthly Sales × 5%
                - Total Expenses     = Area Expense + Discount
                - Net Monthly Profit = Gross Profit − Total Expenses
                - Annual Profit      = Net Monthly Profit × 12
                - Payback (months)   = Total Setup Cost ÷ Net Monthly Profit
                - Annual ROI %       = (Annual Profit ÷ Total Setup Cost) × 100
            --}}
                <div x-show="tab === 'earn'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <div x-data="{
                        area: 2000,
                        
                        /* ── Configuration (same as Startup Costs tab) ── */
                        costPerSqFt: 2000,
                        franchiseBaseCost: 210000,
                        softwareBaseCost: 40000,
                        gstRate: 0.18,
                    
                        /* ── Startup Cost (same formula as Tab 1) ── */
                        get areaCost() { 
                            return this.area * this.costPerSqFt 
                        },
                        get franchiseCostWithGst() { 
                            return Math.round(this.franchiseBaseCost * (1 + this.gstRate))
                        },
                        get softwareCostWithGst() { 
                            return Math.round(this.softwareBaseCost * (1 + this.gstRate))
                        },
                        get startupCost() { 
                            return this.areaCost + this.franchiseCostWithGst + this.softwareCostWithGst 
                        },
                    
                        /* ── Total Setup (no separate stock investment) ── */
                        get totalSetup() { return this.startupCost },
                    
                        /* ── Revenue & Profit (from ROI Calculator sheet) ── */
                        get monthlySales() { return Math.round(this.area * (4000000 / 3000)) },
                        get grossProfit() { return Math.round(this.monthlySales * 0.25) },
                        get areaExpense() { return this.area * 126 },
                        get discount() { return Math.round(this.monthlySales * 0.05) },
                        get totalExpenses() { return this.areaExpense + this.discount },
                        get netMonthlyProfit() { return this.grossProfit - this.totalExpenses },
                        get annualProfit() { return this.netMonthlyProfit * 12 },
                    
                        /* ── ROI Metrics ── */
                        get paybackMonths() { return Math.ceil(this.totalSetup / this.netMonthlyProfit) },
                        get annualRoi() { return ((this.annualProfit / this.totalSetup) * 100).toFixed(1) },
                    
                        /* ── Chart: 12-month profit growth (~4% month-on-month) ── */
                        get chartBars() {
                            let bars = [];
                            for (let i = 1; i <= 12; i++) {
                                bars.push(Math.round(this.netMonthlyProfit * (1 + (i - 1) * 0.04)));
                            }
                            return bars;
                        },
                        get maxBar() { return Math.max(...this.chartBars) },
                    
                        fmt(n) { return (n >= 100000) ? (n / 100000).toFixed(1) + 'L' : (n >= 1000) ? (n / 1000).toFixed(0) + 'K' : n },
                        fmtFull(n) { return '₹' + Number(Math.round(n)).toLocaleString('en-IN') }
                    }"
                        class="bg-[#0f1f1a] rounded-3xl overflow-hidden shadow-2xl border border-white/[0.08]">

                        <div class="grid grid-cols-1 lg:grid-cols-2">

                            {{-- LEFT: Controls --}}
                            <div class="p-6 sm:p-8 border-b lg:border-b-0 lg:border-r border-white/10">
                                <p class="text-white font-bold text-base mb-5">
                                    Calculate Your Earnings (Not Just Costs)
                                    <span
                                        class="text-[10px] bg-[#109125] text-white px-2 py-0.5 rounded-full ml-1">LIVE</span>
                                </p>

                                {{-- Store Area --}}
                                <div class="mb-5">
                                    <div class="flex justify-between items-center mb-2">
                                        <label class="text-[#c8e8d8] text-xs font-bold uppercase tracking-wider">Store Area
                                            (sq ft)</label>
                                        <div
                                            class="flex items-center gap-1 bg-[#1a2e27] border border-white/20 rounded-lg px-2 py-1">
                                            <input type="number" x-model.number="area"
                                                @input="let v = Number($event.target.value); area = v > 10000 ? 10000 : (v || v === 0 ? v : area)"
                                                @blur="area = Math.min(10000, Math.max(500, Number($event.target.value) || 500))"
                                                class="w-20 bg-transparent text-[#f5a623] text-sm font-bold text-right outline-none appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none">
                                            <span class="text-[#6b8f7e] text-xs">sq ft</span>
                                        </div>
                                    </div>
                                    <input type="range" x-model.number="area" min="500" max="10000"
                                        step="100"
                                        class="w-full h-2 rounded-full appearance-none cursor-pointer accent-[#f5a623] bg-white/20">
                                    <div class="flex justify-between text-xs text-[#6b8f7e] mt-1">
                                        <span>500</span><span>5,000</span><span>10,000</span>
                                    </div>
                                </div>

                                {{-- Calculated inputs (read-only display) --}}
                                <div class="space-y-2 mb-5">
                                    <div
                                        class="bg-white/[0.04] rounded-xl px-4 py-2.5 flex justify-between border border-white/[0.06]">
                                        <span class="text-[#9bbfb0] text-xs font-medium">Startup Cost
                                            (auto-calculated)</span>
                                        <span class="text-white text-xs font-bold" x-text="fmtFull(startupCost)"></span>
                                    </div>
                                    <div
                                        class="bg-white/[0.04] rounded-xl px-4 py-2.5 flex justify-between border border-white/[0.06]">
                                        <span class="text-[#9bbfb0] text-xs font-medium">Monthly Sales</span>
                                        <span class="text-[#4ade80] text-xs font-bold"
                                            x-text="fmtFull(monthlySales)"></span>
                                    </div>
                                    <div
                                        class="bg-white/[0.04] rounded-xl px-4 py-2.5 flex justify-between border border-white/[0.06]">
                                        <span class="text-[#9bbfb0] text-xs font-medium">Gross Profit (25% margin)</span>
                                        <span class="text-[#4ade80] text-xs font-bold"
                                            x-text="fmtFull(grossProfit)"></span>
                                    </div>
                                    <div
                                        class="bg-white/[0.04] rounded-xl px-4 py-2.5 flex justify-between border border-white/[0.06]">
                                        <span class="text-[#9bbfb0] text-xs font-medium">Total Monthly Expenses</span>
                                        <span class="text-[#ec2024] text-xs font-bold"
                                            x-text="fmtFull(totalExpenses)"></span>
                                    </div>
                                </div>

                                <a href="#" onclick="openLeadPopup(); return false;"
                                    class="block w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold text-center py-3 rounded-xl transition-all duration-200 text-sm">
                                    Calculate My Earnings →
                                </a>
                            </div>

                            {{-- RIGHT: Results --}}
                            <div class="p-6 sm:p-8 bg-[#081510]">
                                <p class="text-[#9bbfb0] text-xs font-semibold uppercase tracking-wider mb-1">Net Monthly
                                    Profit</p>
                                <p class="text-5xl font-extrabold text-[#f5a623] leading-none mb-1"
                                    x-text="fmtFull(netMonthlyProfit)"></p>
                                <p class="text-[#6b8f7e] text-xs mb-5">Estimated based on <span
                                        x-text="Number(area).toLocaleString('en-IN')"></span> sq ft store</p>

                                {{-- KPI Cards --}}
                                <div class="grid grid-cols-3 gap-3 mb-5">
                                    <div class="bg-white/[0.06] rounded-xl p-3 text-center border border-white/10">
                                        <p class="text-[#f5a623] text-xl font-extrabold">25%</p>
                                        <p class="text-[#9bbfb0] text-xs mt-0.5">Margin</p>
                                    </div>
                                    <div class="bg-white/[0.06] rounded-xl p-3 text-center border border-white/10">
                                        <p class="text-[#f5a623] text-xl font-extrabold" x-text="paybackMonths + 'mo'">
                                        </p>
                                        <p class="text-[#9bbfb0] text-xs mt-0.5">Breakeven</p>
                                    </div>
                                    <div class="bg-white/[0.06] rounded-xl p-3 text-center border border-white/10">
                                        <p class="text-[#4ade80] text-xl font-extrabold" x-text="annualRoi + '%'"></p>
                                        <p class="text-[#9bbfb0] text-xs mt-0.5">Annual ROI</p>
                                    </div>
                                </div>

                                {{-- Annual Profit highlight --}}
                                <div
                                    class="bg-[#109125]/10 border border-[#109125]/30 rounded-xl p-3 mb-5 flex items-center justify-between">
                                    <div>
                                        <p class="text-[#4ade80] text-xs font-semibold uppercase tracking-wider">Year 1
                                            Annual Profit</p>
                                        <p class="text-[#6b8f7e] text-[10px]">Net Monthly Profit × 12</p>
                                    </div>
                                    <p class="text-[#4ade80] text-2xl font-extrabold" x-text="fmtFull(annualProfit)"></p>
                                </div>

                                {{-- 12-Month Bar Chart --}}
                                <p class="text-[#4b7060] text-xs font-semibold uppercase tracking-wider mb-2">Monthly
                                    Earnings Projection</p>
                                <div class="flex items-end gap-1 h-24">
                                    <template x-for="(bar, i) in chartBars" :key="i">
                                        <div class="flex-1 rounded-t-sm transition-all duration-500 ease-out"
                                            :style="`height: ${Math.round((bar / maxBar) * 100)}%; background: ${i >= 9 ? '#4ade80' : i >= 6 ? '#22c55e' : i >= 3 ? '#16a34a' : '#109125'}; min-height: 3px;`">
                                        </div>
                                    </template>
                                </div>
                                <div class="flex justify-between text-xs text-[#2e4d3d] mt-1.5">
                                    <span>Month 1</span><span>Month 6</span><span>Month 12</span>
                                </div>

                                {{-- Total Setup Cost --}}
                                <div
                                    class="mt-4 bg-white/[0.04] rounded-xl px-4 py-2.5 flex justify-between border border-white/[0.06]">
                                    <span class="text-[#9bbfb0] text-xs font-medium">Total Investment Required</span>
                                    <span class="text-white text-xs font-bold" x-text="fmtFull(totalSetup)"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Disclaimer --}}
                <div class="mt-5">
                    <p class="text-[#4b7060] text-xs text-center leading-relaxed">
                        <span class="text-[#6b8f7e] font-semibold">Disclaimer:</span>
                        Projections are based on average data from 7x Basket franchise partners. Actual results vary by
                        location, footfall, and store management.
                    </p>
                </div>

            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">How It Works</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">6 Steps to Opening Your 7x Basket
                    Store</h2>
                <p class="text-gray-500  mx-auto">From application to grand opening in as little as 60 days.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([
            [1, 'Appointment', 'Get in touch with the 7x Basket team to register your interest. We schedule a call at a time that works for you and walk through the franchise model, investment structure, and what to expect next. No paperwork at this stage - just a conversation.'],

            [2, 'Site Survey', 'Once you share your proposed location, the team visits and reviews it. We look at the surrounding area, the type of customers nearby, and whether the market can support a 7x Basket store. This step confirms your location before anything moves forward.'],

            [3, 'Franchise Verification', 'We go through your application and verify the details you have submitted. This covers your investment readiness, the property details, and your availability to run the store. The review is straightforward and the team walks you through what is needed.'],

            [4, 'Area Code Activation', 'We check that your location falls within an available territory in the 7x Basket network. If the area is open, we confirm your exclusivity for that zone. This step protects your grocery store from any overlap with another 7x Basket grocery franchise nearby.'],

            [5, 'Documentation', 'Once the area is approved, the paperwork begins. This covers the franchise agreement, GST registration, food licence, rental agreement, and any local registrations your city requires. The 7x Basket team guides you through each document.'],

            [6, 'Franchise Kit / Opening', 'Your supermarket store gets set up with everything it needs to open - racking, signage, initial inventory, and the POS system. The franchise kit covers every detail of the setup process. On opening day, you are ready to serve customers from the first hour.'],
        ] as [$num, $title, $desc])
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="w-8 h-8 rounded-full bg-[#1a5c38] flex items-center justify-center mb-4 flex-shrink-0">
                            <span class="text-white text-xs font-extrabold leading-none">{{ $num }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-2">{{ $title }}</h3>
                        <p class="text-xs text-gray-500 leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
    </section>
    <section class="py-12 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Success Stories</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">What Our Partners Say</h2>
                <p class="text-gray-500  mx-auto">500+ franchise partners across India. Here's what they have to
                    say.
                </p>
            </div>
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
            <div x-data="{
                current: 0,
                total: {{ count($testimonials) }},
                perPage: 1,
                timer: null,
                getPerPage() {
                    if (window.innerWidth >= 1024) return 3;
                    if (window.innerWidth >= 640) return 2;
                    return 1;
                },
                get maxIndex() { return this.total - this.perPage },
                prev() {
                    this.current = this.current <= 0 ? this.maxIndex : this.current - 1;
                },
                next() {
                    this.current = this.current >= this.maxIndex ? 0 : this.current + 1;
                },
                init() {
                    this.perPage = this.getPerPage();
                    window.addEventListener('resize', () => {
                        this.perPage = this.getPerPage();
                        if (this.current > this.maxIndex) this.current = this.maxIndex;
                    });
                    this.timer = setInterval(() => this.next(), 3500);
                }
            }" x-init="init()" @mouseenter="clearInterval(timer)"
                @mouseleave="timer = setInterval(() => next(), 3500)" class="relative">
                <button @click="prev()"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-md flex items-center justify-center hover:bg-[#055346] hover:text-white hover:border-[#055346] transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div class="mx-6 overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out gap-4"
                        :style="`transform: translateX(calc(-${current} * (100% / ${perPage}) - ${current} * (1rem / ${perPage})))`">
                        @foreach ($testimonials as $t)
                            <div class="flex-shrink-0 bg-gray-50 rounded-2xl p-5 border border-gray-100"
                                :style="`width: calc(${100 / perPage}% - ${(perPage - 1) / perPage}rem)`">
                                <div class="flex gap-0.5 mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4 italic">"{{ $t[3] }}"</p>
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
                    @for ($i = 0; $i < count($testimonials); $i++)
                        <button @click="current = {{ $i }} > maxIndex ? maxIndex : {{ $i }}"
                            :class="current === {{ $i }} ? 'bg-[#055346] w-5' : 'bg-gray-300 w-2'"
                            class="h-2 rounded-full transition-all duration-300"></button>
                    @endfor
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-[#060f0c] relative overflow-hidden">
        <div class="blob w-[500px] h-[500px] bg-[#109125]/10 top-[-100px] right-[-150px]"></div>
        <div class="blob w-80 h-80 bg-[#ec2024]/10 bottom-[-80px] left-[-80px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-[#4ade80] text-sm font-bold uppercase tracking-widest">Done For You</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2 mb-3">Everything We Handle - So You Can
                    Focus on Your Customers </h2>
                <p class="text-[#6b8f7e] max-w-2xl mx-auto">You run the store. We handle everything behind it. From setting
                    up your store to running your marketing, every operational burden is managed by 7x Basket, so you can
                    focus entirely on serving customers and growing your business.

                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([
            ['🏗️', 'Interior Design & Setup', '7x Basket offers expert guidance for store layout, creating welcoming spaces that improve the shopping experience. Franchisees get access to professional designers for an efficient and well-planned store setup.', '✔ Your store is ready to open in 45 days', ''],

            ['📦', 'Product Procurement', '7x Basket handles product sourcing, giving franchisees access to trusted suppliers and negotiated pricing. A dedicated team manages inventory centrally to keep stock levels consistent and shelves full.', '✔ Fresh stock on your shelves every day', ''],

            ['🖥️', 'POS Software & Training', '7x Basket provides billing and inventory management software built for franchise store operations. Franchisees get real-time data on sales and stock to make day-to-day decisions with confidence. Staff get hands-on training so the system runs smoothly.', '✔ Zero technical knowledge required', ''],

            ['👥', 'Staff Hiring & Training', 'Franchisees get full support for recruiting and training their store team. 7x Basket provides recruitment assistance, structured training programmes, and ongoing guidance to build a capable and confident team.', '✔ Your team is ready before opening day', ''],

            ['📋', 'Legal Documentation', '7x Basket helps franchisees with all legal paperwork, keeping the setup process compliant with every applicable regulation. Franchisees get guidance on franchise agreements, licences, permits, and local registrations from start to finish.', '✔ 100% legally compliant from day one', ''],

            ['💰', 'Zero Royalty - for 2 years', '7x Basket charges zero royalty fees for the first 2 years of your grocery franchise operation. This gives franchisees higher earnings in the early phase, with the freedom to put that money back into the business.', '✔ Maximum profit from your first month*', 'highlight'],

            ['📣', 'Marketing & Branding', '7x Basket runs targeted campaigns that build customer awareness and bring in consistent footfall. Franchisees get direct access to ready-to-use promotional materials and local marketing support to grow visibility from day one.', '✔ Customers arrive before you advertise', ''],

            ['⏱️', 'Expiry Management System', 'Automated alerts track product expiry dates across all inventory and flag items before they go to waste. Franchisees can act on time, cut unsold stock, and keep product quality consistent - directly protecting margins.', '✔ Reduce losses and protect your margins', ''],

            ['🛟', '24/7 Backend Support', 'Franchisees get round-the-clock support covering technical issues, operations queries, and day-to-day challenges. A dedicated team is always available to step in and resolve problems so the store keeps running without interruption.', '✔ You will never face a problem alone', ''],
        ] as [$icon, $title, $desc, $benefit, $type])
                    <div class="relative {{ $type === 'highlight' ? 'bg-[#ec2024]/10 border-[#ec2024]/50 hover:bg-[#ec2024]/15' : 'bg-[#0d1f18] border-[#1a3328] hover:border-[#109125]/60 hover:bg-[#0f2318]' }} border rounded-2xl p-5 flex flex-col transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        @if ($type === 'highlight')
                            <span
                                class="absolute -top-3 left-4 bg-[#ec2024] text-white text-[10px] font-bold px-3 py-1 rounded-full">Year
                                1 Offer</span>
                        @endif
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-10 h-10 {{ $type === 'highlight' ? 'bg-[#ec2024]/20' : 'bg-[#109125]/15' }} rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                                {{ $icon }}
                            </div>
                            <p class="font-bold text-[#c8e8d8] text-sm leading-tight">{{ $title }}</p>
                        </div>
                        <p class="text-[#c8e8d8] text-xs leading-relaxed mb-3 flex-1">{{ $desc }}</p>
                        <p
                            class="text-xs font-semibold {{ $type === 'highlight' ? 'text-[#ec2024]' : 'text-[#4ade80]' }}">
                            {{ $benefit }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Empowering Individuals with Franchise Business Opportunity --}}
    <section class="py-16 relative overflow-hidden" style="background-color: #f0f7f3;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="flex-1" data-aos="fade-right">
                    <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Franchise Opportunity</span>
                    <h2 class="text-3xl sm:text-3xl font-extrabold text-[#0a2e1a] mt-2 mb-5">Empowering Individuals with
                        Franchise Business Opportunity</h2>
                    <p class="text-[#4a6b5a] text-base leading-relaxed mb-6">At 7x Basket, we are dedicated to providing
                        aspiring entrepreneurs with the opportunity to own and operate their very own convenience
                        supermarket franchise. With our proven business model and unwavering commitment to customer
                        satisfaction, we have established ourselves as a trusted name in the retail industry.</p>
                    <p class="text-[#4a6b5a] text-base leading-relaxed mb-8">Our franchise stores offer a wide assortment
                        of high-quality products, including groceries, household essentials, fresh produce, and ready-to-eat
                        items, all carefully curated to meet the diverse needs of our customers. With 7x Basket, you can
                        embark on a rewarding journey towards financial independence and business ownership.</p>
                    <a href="#" onclick="openLeadPopup(); return false;"
                        class="inline-flex items-center gap-2 bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-7 py-3 rounded-xl transition-all duration-300 shadow-lg shadow-[#109125]/20">
                        Apply Now →
                    </a>
                </div>
                <div class="flex-1 flex justify-center relative py-8 px-4" data-aos="fade-left">
                    {{-- Decorative blobs --}}
                    <div
                        class="absolute w-72 h-72 bg-[#109125]/15 rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 blur-2xl">
                    </div>
                    <div class="absolute w-48 h-48 bg-[#4ade80]/20 rounded-full top-4 right-4 blur-xl"></div>
                    <div class="absolute w-32 h-32 bg-[#109125]/10 rounded-full bottom-4 left-4 blur-lg"></div>
                    {{-- Dotted pattern --}}
                    <div class="absolute inset-0 opacity-20 rounded-3xl"
                        style="background-image: radial-gradient(#109125 1px, transparent 1px); background-size: 20px 20px;">
                    </div>
                    {{-- Image card --}}
                    <div
                        class="relative z-10 bg-white rounded-3xl shadow-2xl shadow-[#109125]/15 p-4 border border-[#d4eddf]">
                        <img src="{{ asset('custom/7x_Basket_Store_1.jpg') }}" alt="7x Basket Franchise Store"
                            class="rounded-2xl w-full max-w-sm object-cover">
                        {{-- Floating badges --}}
                        <div
                            class="absolute -bottom-4 -left-4 bg-[#109125] text-white text-xs font-bold px-4 py-2 rounded-xl shadow-lg flex items-center gap-2">
                            <span class="text-base">🏪</span> 150+ Franchise Partners
                        </div>
                        <div
                            class="absolute -top-4 -right-4 bg-white border border-[#d4eddf] text-[#109125] text-xs font-bold px-4 py-2 rounded-xl shadow-lg flex items-center gap-2">
                            <span class="text-base">⭐</span> Trusted Brand
                        </div>
                    </div>
                </div>
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
                <p class="text-gray-500  mx-auto text-sm">Every category your customers buy from - all under one roof,
                    sourced directly from manufacturers at wholesale prices. 7x Basket stores stock a carefully curated
                    range across 6 core everyday categories.
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
                        ['haldirams', 'Haldirams'],
                    ];
                @endphp
                @foreach (array_merge($brands, $brands) as [$slug, $brand])
                    <div class="brand-logo-item flex-shrink-0 flex items-center justify-center border-r border-gray-100"
                        style="padding: 0 24px; height: 80px; min-width: 140px">
                        @if (file_exists(public_path("custom/brands/{$slug}.png")))
                            <img src="{{ asset("custom/brands/{$slug}.png") }}" alt="{{ $brand }}"
                                class="max-h-10 w-auto object-contain hover:scale-105 transition-all duration-300">
                        @else
                            <span
                                class="text-gray-400 font-bold text-sm tracking-wide hover:text-[#055346] transition-colors duration-300 select-none">{{ $brand }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">As Featured On</span>
                <p class="text-gray-500 text-sm mt-2">Recognized by top media houses and industry publications</p>
            </div>
            <div class="bg-gray-50 rounded-2xl py-8 px-6" data-aos="fade-up" data-aos-delay="100">
                <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-6">
                    @php
                        $mediaCompanies = [
                            ['Economic Times', 'et'],
                            ['Franchise India', 'fi'],
                            ['Times of India', 'toi'],
                            ['Business Today', 'bt'],
                            ['YourStory', 'yourstory'],
                        ];
                    @endphp
                    @foreach ($mediaCompanies as [$name, $slug])
                        <div
                            class="flex items-center justify-center px-6 py-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#109125]/20 transition-all duration-300 group">
                            @if (file_exists(public_path("custom/media/{$slug}.png")))
                                <img src="{{ asset("custom/media/{$slug}.png") }}" alt="{{ $name }}"
                                    class="h-8 w-auto object-contain group-hover:scale-105 transition-transform duration-300">
                            @else
                                <span
                                    class="text-gray-600 font-bold text-base tracking-wide group-hover:text-[#109125] transition-colors duration-300">{{ strtoupper(substr($name, 0, 2)) }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
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
        init() {
            // Watch lightbox state
            this.$watch('lightbox', value => {
                const stickyBtn = document.getElementById('stickyApplyBtn');
                if (stickyBtn) {
                    if (value) {
                        stickyBtn.classList.add('hidden');
                    } else {
                        stickyBtn.classList.remove('hidden');
                    }
                }
            });
            // Watch videoModal state
            this.$watch('videoModal', value => {
                const stickyBtn = document.getElementById('stickyApplyBtn');
                if (stickyBtn) {
                    if (value) {
                        stickyBtn.classList.add('hidden');
                    } else {
                        stickyBtn.classList.remove('hidden');
                    }
                }
            });
        },
        openLightbox(i) {
            this.lightboxIndex = i;
            this.lightbox = true;
        },
        prevImage() { this.lightboxIndex = (this.lightboxIndex - 1 + this.images.length) % this.images.length },
        nextImage() { this.lightboxIndex = (this.lightboxIndex + 1) % this.images.length },
        openVideo(src) {
            this.videoSrc = src;
            this.videoModal = true;
        },
        closeVideo() {
            this.videoModal = false;
            this.videoSrc = '';
        }
    }"
        @keydown.escape.window="lightbox = false; closeVideo()" @keydown.arrow-left.window="if(lightbox) prevImage()"
        @keydown.arrow-right.window="if(lightbox) nextImage()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#4ade80] text-sm font-bold uppercase tracking-widest">Inside 7x Basket</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2 mb-3">Inside a 7x Basket store</h2>
                <p class="text-[#6b8f7e]  mx-auto">A look inside 7x Basket franchise stores - from store design and product
                    displays to grand openings and happy customers across cities.</p>
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
                @foreach ([['custom/7x_Basket_Store.png', 'How to Start a 7x Basket Franchise', 'Investment & ROI Explained', 'Expert Guide', 'E8SjNuM04Xk'], ['custom/7x_Basket_Store.png', 'Franchise Offer — Start Your Supermarket', '₹5L Investment, High Returns', 'Business Overview', '_AWeuLbDD1w'], ['custom/7x_Basket_Store.png', 'Supermarket Grocery Store Business', 'Full Setup Guide for Beginners', 'Step-by-Step', 'znAW7U4EoDY']] as [$img, $title, $subtitle, $tag, $ytId])
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
                @foreach ([['custom/7x_Basket_Store.png', 'Rajesh Kumar', 'Delhi', 'Super Store Owner', '"Turned profitable in 8 months. Best decision of my life."', 'https://www.youtube.com/embed/apqR-F9q5x4'], ['custom/7x_Basket_Store.png', 'Priya Sharma', 'Mumbai', 'Mini Store Owner', '"Fresh products daily. Margins far better than independent stores."', 'https://www.youtube.com/embed/XwIbQUgLvMc'], ['custom/7x_Basket_Store.png', 'Amit Patel', 'Ahmedabad', 'Hyper Store Owner', '"From training to launch — everything was smooth and on time."', 'https://www.youtube.com/embed/XYRC-Wva7-A']] as [$img, $name, $city, $role, $quote, $video])
                    <div class="relative rounded-2xl overflow-hidden cursor-pointer group aspect-video shadow-lg border border-white/10"
                        @click="openVideo('{{ $video }}')" data-aos="fade-up"
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
            class="fixed inset-0 z-[60] bg-black/95 flex items-center justify-center" @click.self="lightbox = false"
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
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-[60] bg-black/90 flex items-center justify-center p-4"
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
            <div class="flex flex-col md:flex-row md:items-start gap-4" x-data="{ open: null }">
                @php
                    $faqs = [
                        [
                            'How much does a supermarket franchise cost in India?',
                            'It depends on the store format, city, and the brand. Costs vary based on the size of the space, fitout requirements, and the stock needed to open. The bigger the store and the bigger the city, the higher the number. Always ask for a written cost breakdown that separates the franchise fee, setup, and working capital before you decide.',
                        ],
                        [
                            'Is a grocery franchise profitable in India?',
                            'Yes, grocery franchises in India are profitable. That said, it depends on location, store size, and how well the business is run. Well-managed stores tend to do well because people buy groceries every day - the demand never stops. Add a good product mix and steady footfall, and the numbers work.',
                        ],
                        [
                            'Is a supermarket franchise better than opening an independent grocery store?',
                            'A franchise gives you a brand people already recognise, a supply chain that is already set up, and a trained support team from day one. An independent store gives you more control but puts everything - sourcing, branding, technology, and marketing - on you from scratch. For a first-time grocery business owner, a franchise reduces the three biggest risks: no brand pull, no supply chain, and no operational knowledge.',
                        ],
                        [
                            'How much space do I need to open a grocery store franchise?',
                            'Space requirements depend on the store format. Most grocery franchise brands offer three formats - small, medium, and large. A small or mini format typically runs from 500 sq ft and suits residential neighbourhoods. A medium format runs from 1500 sq ft and works for higher-footfall markets. Large or hyper formats need 4,000 sq ft and above. Check the minimum area requirement with the specific franchise brand before locking in a property.',
                        ],
                        [
                            'What is the royalty fee for a supermarket franchise in India?',
                            'Royalty fees vary by brand - some charge a percentage of monthly sales, others a flat monthly fee. In grocery retail where margins are already tight, the royalty structure directly affects monthly take-home profit. Always check when royalty starts, what it is calculated on, and whether there is a minimum charge regardless of how much you sell.',
                        ],
                        [
                            'How do I start a supermarket business in India with no retail experience?',
                            'A structured grocery franchise model fills the experience gap. Look for one that includes hands-on training during store setup and an assigned support contact after opening. The first few months are when most first-time store owners run into problems - live support during that period matters more than what is written in the brochure.',
                        ],
                        [
                            'How long does it take to open a grocery store franchise in India?',
                            'Most structured grocery franchise models get a store open within a few weeks to a couple of months from agreement signing. The main factors that affect the timeline are property readiness, documentation completion, and how quickly the fitout is done. A clean, ready space with complete paperwork gets you to opening day faster.',
                        ],
                        [
                            'What support does a retail supermarket franchise give to partners?',
                            'Good franchise support covers three phases - setup, opening, and post-launch. Setup includes store design, fitout, and training. Post-launch is where most brands pull back. Before signing, ask specifically what ongoing support looks like, who your point of contact is, and what the response time is for day-to-day problems.',
                        ],
                        [
                            'What is territory exclusivity in a supermarket franchise?',
                            'Territory exclusivity means the franchisor agrees not to open another store of the same brand within a defined area around your location. This protects your customer base from competition within the same franchise network. Not all grocery franchise brands offer it - some grant it based on location and market size, others assess it case by case. Always confirm the exact exclusivity terms in writing before signing the agreement.',
                        ],
                        [
                            'Can I open a grocery mart franchise in India on rented property?',
                            'Yes. Most grocery franchise brands in India allow rented, leased, or owned properties. Make sure your lease term is at least as long as the franchise agreement period. A mismatch between the two - a 5-year franchise tied to a 2-year rental - is a risk most first-time franchise partners overlook.',
                        ],
                    ];
                    $left = array_slice($faqs, 0, 5);
                    $right = array_slice($faqs, 5);
                @endphp

                {{-- Left column --}}
                <div class="flex-1 flex flex-col gap-4">
                    @foreach ($left as $idx => [$q, $a])
                        <div class="bg-white rounded-xl border overflow-hidden transition-all duration-300"
                            :class="open === {{ $idx }} ? 'border-[#d4e8dc] shadow-md' : 'border-[#d4e8dc] shadow-sm'"
                            data-aos="fade-up" data-aos-delay="{{ $idx * 60 }}">
                            <div class="flex">
                                <div class="w-1 flex-shrink-0 rounded-l-xl transition-all duration-300"
                                    :class="open === {{ $idx }} ? 'bg-[#f5a623]' : 'bg-transparent'"></div>
                                <div class="flex-1">
                                    <button
                                        @click="open === {{ $idx }} ? open = null : open = {{ $idx }}"
                                        class="w-full flex items-center justify-between px-5 py-4 text-left">
                                        <span
                                            class="font-semibold text-gray-900 text-sm pr-4 leading-snug">{{ $q }}</span>
                                        <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center transition-all duration-300"
                                            :class="open === {{ $idx }} ? 'bg-[#1a5c38]' : 'bg-[#f0f7f3]'">
                                            <svg :class="open === {{ $idx }} ? 'rotate-180 text-white' : 'text-[#1a5c38]'"
                                                class="w-4 h-4 transition-all duration-300" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </button>
                                    <div x-show="open === {{ $idx }}"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 -translate-y-1"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 -translate-y-1" class="px-5 pb-5">
                                        <p class="text-sm text-gray-500 leading-relaxed border-t border-[#f0f7f3] pt-3">
                                            {{ $a }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Right column --}}
                <div class="flex-1 flex flex-col gap-4">
                    @foreach ($right as $idx => [$q, $a])
                        @php $i = $idx + 5; @endphp
                        <div class="bg-white rounded-xl border overflow-hidden transition-all duration-300"
                            :class="open === {{ $i }} ? 'border-[#d4e8dc] shadow-md' : 'border-[#d4e8dc] shadow-sm'"
                            data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                            <div class="flex">
                                <div class="w-1 flex-shrink-0 rounded-l-xl transition-all duration-300"
                                    :class="open === {{ $i }} ? 'bg-[#f5a623]' : 'bg-transparent'"></div>
                                <div class="flex-1">
                                    <button
                                        @click="open === {{ $i }} ? open = null : open = {{ $i }}"
                                        class="w-full flex items-center justify-between px-5 py-4 text-left">
                                        <span
                                            class="font-semibold text-gray-900 text-sm pr-4 leading-snug">{{ $q }}</span>
                                        <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center transition-all duration-300"
                                            :class="open === {{ $i }} ? 'bg-[#1a5c38]' : 'bg-[#f0f7f3]'">
                                            <svg :class="open === {{ $i }} ? 'rotate-180 text-white' : 'text-[#1a5c38]'"
                                                class="w-4 h-4 transition-all duration-300" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </button>
                                    <div x-show="open === {{ $i }}"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 -translate-y-1"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 -translate-y-1" class="px-5 pb-5">
                                        <p class="text-sm text-gray-500 leading-relaxed border-t border-[#f0f7f3] pt-3">
                                            {{ $a }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    @if ($blogs->count())
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-end mb-6" data-aos="fade-up">
                    <div>
                        <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Latest Insights</span>
                        <h2 class="text-3xl font-extrabold text-gray-900 mt-2">From Our Blog</h2>
                    </div>
                    <a href="{{ route('blogs') }}"
                        class="text-[#055346] font-semibold text-sm hover:underline hidden sm:block">View all →</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($blogs as $blog)
                        <article class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100"
                            data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="block">
                                @if ($blog->featured_image)
                                    <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}"
                                        class="w-full h-44 object-cover" loading="lazy">
                                @else
                                    <div
                                        class="w-full h-44 bg-gradient-to-br from-[#055346] to-[#076b58] flex items-center justify-center">
                                        <span class="text-4xl">🛒</span>
                                    </div>
                                @endif
                            </a>
                            <div class="p-5">
                                @if ($blog->category)
                                    <span
                                        class="text-xs font-bold text-[#109125] bg-green-50 px-2.5 py-1 rounded-full">{{ $blog->category }}</span>
                                @endif
                                <a href="{{ route('blogs.show', $blog->slug) }}">
                                    <h3
                                        class="font-bold text-gray-900 mt-2 mb-2 line-clamp-2 leading-snug text-sm hover:text-[#055346] transition-colors">
                                        {{ $blog->title }}
                                    </h3>
                                </a>
                                <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $blog->excerpt }}</p>
                                <a href="{{ route('blogs.show', $blog->slug) }}"
                                    class="text-[#055346] text-sm font-semibold hover:underline">Read more →</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 60
        });
    </script>
@endsection
