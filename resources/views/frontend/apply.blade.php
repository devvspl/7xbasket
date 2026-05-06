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
            <div class="text-center mb-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                    Own a Highly Profitable "Ready-to-Run" Supermarket — India's Most Profitable Franchise.<br>
                    <span class="text-[#109125]">Open in 45 Days.</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <div class="relative rounded-2xl overflow-hidden shadow-md mb-5 aspect-video bg-gray-100">
                        <iframe src="https://www.youtube.com/embed/E1iC5EMfXkE" class="w-full h-full" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen loading="lazy">
                        </iframe>
                    </div>

                    {{-- Key Benefits --}}
                    <div class="grid grid-cols-2 gap-3 mb-5">
                        @foreach ([['💰', 'Zero royalty', 'No royalty charged for your first 2 years of operation.'], ['🚀', '45-day store launch', 'From signed agreement to grand opening in 45 days.'], ['🎓', 'Full staff training', 'Your team is trained and ready before the doors open.'], ['📦', '15,000+ products', 'Direct sourcing from top FMCG brands at wholesale prices.'], ['🔒', 'Exclusive territory', 'Your pincode zone is protected - no competing store in your area.'], ['🤝', 'Dedicated manager', 'A relationship manager assigned to your store from day one.']] as [$icon, $title, $desc])
                            <div class="flex items-start gap-3 bg-gray-50 rounded-xl p-3 border border-gray-100">
                                <span class="text-xl flex-shrink-0">{{ $icon }}</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-900">{{ $title }}</p>
                                    <p class="text-[11px] text-gray-500 leading-snug">{{ $desc }}</p>
                                </div>
                            </div>
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
                                    <option value="" selected disabled>Select Store Type</option>

                                    <option value="500-1000">
                                        Mini Store (500 – 1000 sqft)
                                    </option>

                                    <option value="1000-3000">
                                        Super Store (1000 – 3000 sqft)
                                    </option>

                                    <option value="3000+">
                                        Hyper Store (3000+ sqft)
                                    </option>
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
                                <option value="within_a_week">Within A Week</option>
                                <option value="exploring">Just Exploring</option>
                            </select>
                        </div>
                        <button type="submit" id="applyPageSubmit"
                            class="relative w-full overflow-hidden text-white font-extrabold py-4 rounded-xl text-sm tracking-wide shadow-[0_4px_20px_rgba(16,145,37,0.35)] hover:shadow-[0_6px_30px_rgba(16,145,37,0.55)] hover:-translate-y-0.5 transition-all duration-200 group btn-gradient-animate">
                            <span
                                class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/25 to-transparent skew-x-12 pointer-events-none"></span>
                            <span class="relative">YES! I Want to Open My Supermarket Franchise →</span>
                        </button>
                        <style>
                            .btn-gradient-animate {
                                background: linear-gradient(270deg, #ec2024, #109125, #055346, #109125, #ec2024);
                                background-size: 300% 300%;
                                animation: gradientShift 4s ease infinite;
                            }

                            @keyframes gradientShift {
                                0% {
                                    background-position: 0% 50%
                                }

                                50% {
                                    background-position: 100% 50%
                                }

                                100% {
                                    background-position: 0% 50%
                                }
                            }
                        </style>
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
                @foreach ([['150+', 'Stores PAN India'], ['100+', 'Cities Covered'], ['25', 'States Pan India'], ['4.9/5', 'Customer Rating'], ['13L', 'Starting Investment']] as [$num, $label])
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
                        India's Grocery Market Is ONE Of The
                        <span class="text-[#109125]">Largest Opportunities For Franchise Investors Right Now</span>
                    </h2>
                    <p class="text-gray-500 text-sm mt-4 leading-relaxed">Organised grocery retail accounts for roughly 12%
                        of India's total grocery market - which means 88% is still unbranded, unstructured kirana. That gap
                        is exactly where a 7x Basket franchise sits. The demand is local, weekly, and recession-proof.
                        Customers buy groceries regardless of economic conditions, which is what makes this one of the most
                        stable franchise opportunities in India today.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        @foreach ([['~58 Lakh CR', 'Market size in 2025 (estimated, INR)'], ['9% CAGR', 'Projected growth rate 2025–2030'], ['~12%', 'Organised retail share of total market'], ['85+ Lakh CR', 'Projected market size by 2030 (INR)']] as [$n, $l])
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
                    <p class="text-xs text-gray-400 mb-4">In INR Lakh Crore &middot; 2020&ndash;2026 (2025&ndash;26
                        projected)</p>
                    <div class="flex items-center gap-4 mb-3"><span
                            class="flex items-center gap-1.5 text-xs text-gray-600 font-medium"><span
                                class="w-3 h-3 rounded-sm inline-block bg-[#109125]"></span> Actual</span><span
                            class="flex items-center gap-1.5 text-xs text-gray-600 font-medium"><span
                                class="w-3 h-3 rounded-sm inline-block bg-[#86efac]"></span> Projected</span></div>
                    <div class="flex-1" style="min-height:300px"><canvas id="groceryChart"></canvas></div>
                    <p class="text-[10px] text-gray-400 mt-3 text-center">Sources: Statista / Style Baazar 2024, ORMS Today
                        / Euromonitor, Technavio. 2025&ndash;26 projected at 9% CAGR.</p>
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
                @foreach ([
            [1, '💰', 'Zero royalty model', 'Keep 100% of your profits for first 2 years. We earn through the supply chain. Your revenue is yours - no royalty deducted for first 2 years.'],
            [2, '🏗️', '45-day store launch', 'Store ready in 45 days flat. From signed agreement to grand opening in 45 days, fully managed by our operations team.'],
            [3, '📦', '15,000+ products', 'Direct sourcing at wholesale prices. Top FMCG brands, daily delivery, at prices that give you competitive margins on every sale.'],
            [4, '🖥️', 'Cloud POS and app', 'One platform for your entire store. Billing, inventory, and sales analytics in one app. No prior tech knowledge needed to use it.'],
            [5, '👥', 'Staff training', 'Your team is trained before day one. Complete operations training for you and every staff member, before the store opens its doors.'],
            [6, '📣', 'Marketing support', 'National campaigns, local results. Branded marketing kits and national digital campaigns that bring customers in from week one.'],
            [7, '🔒', 'Exclusive territory', 'Your zone, protected. Your pincode area is locked for your store. No other 7x Basket outlet operates within your radius.'],
            [8, '🤝', 'Dedicated manager', 'One point of contact, always. A relationship manager is assigned to your store from day one - reachable whenever you need them.'],
            [9, '📋', 'Legal compliance', 'All paperwork handled for you. FSSAI, GST, and Shops Act documentation managed by our compliance team. You focus on the store.'],
        ] as [$no, $icon, $title, $desc])
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5 hover:bg-white/10 hover:border-[#4ade80]/30 hover:-translate-y-0.5 transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">

                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 bg-[#109125]/20 rounded-xl flex items-center justify-center text-xl">
                                {{ $icon }}
                            </div>

                            <!-- Number badge -->
                            <span class="text-xs font-bold text-[#4ade80] bg-[#4ade80]/10 px-2 py-1 rounded-md">
                                {{ $no }}
                            </span>
                        </div>

                        <p class="text-sm font-bold text-white">{{ $title }}</p>

                        <p class="text-xs text-white leading-relaxed mt-1.5">
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
                            <td class="px-6 py-4 text-center bg-green-50/50 font-bold text-gray-800">Rs 13 Lakh</td>
                            <td class="px-6 py-4 text-center text-gray-600">Rs 20 Lakh+</td>
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
                            <td class="px-6 py-4 text-gray-600 text-sm">Zero Royalty Period</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Free for First 2 Years</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗ Charged from Month 1</span>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Free Accounting (3 months)</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Included</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗ Not included</span>
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
                                <span class="text-orange-500 font-semibold text-sm">~ Shared team</span>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">ROI Calculator on Page</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Live tool</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗ Not available</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 text-gray-600 text-sm">Investment Breakdown</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Detailed & transparent</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Basic only</span>
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
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-2">15,000+ Products from India's Top
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
                <p class="text-gray-500 max-w-xl mx-auto">150+ franchise partners across India. Here's what they have to
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
            <div class="flex flex-col md:flex-row md:items-start gap-4" x-data="{ open: null }">
                @php
                    $applyFaqs = [
                        [
                            'What is a franchise business and how does it work in India?',
                            'A franchise is a business model where you pay to use an established brand\'s name, products, and systems to run your own store. The franchisor provides training, supply chain, and operational support - you invest the capital and manage the outlet. In India, active franchisors number around 4,600 across sectors including grocery, food, education, and healthcare.',
                        ],
                        [
                            'Is owning a franchise better than starting an independent business?',
                            'A franchise gives you a proven model, brand recognition, and built-in supplier network - reducing the risk of starting from zero. Independent stores offer more flexibility but require you to build everything yourself including brand trust, procurement, and customer base. For first-time entrepreneurs, a franchise typically reaches break-even faster than an independent setup.',
                        ],
                        [
                            'Which are the best grocery franchise opportunities in India in 2026?',
                            'Top grocery franchise options in India include D-Mart, Reliance Fresh, Spencer\'s Retail, More Retail, and 7x Basket. For mid-capital investors, 7x Basket is the most accessible entry point in 2026.',
                        ],
                        [
                            'Can I convert my existing kirana store into a franchise?',
                            'Yes - several grocery franchise brands actively target existing kirana owners for conversion. The advantage is you already have a location, customer base, and basic operations in place. Brands like Reliance Fresh, More Retail, and 7x Basket have dedicated kirana upgrade programmes where your existing setup is assessed and rebranded into an organised franchise format.',
                        ],

                        [
                            'Can I get a bank loan to fund a franchise in India?',
                            'Yes. Most nationalised and private banks in India offer business loans for franchise investments under MSME and Mudra scheme categories. Banks typically fund 60–70% of the total project cost after reviewing the franchise agreement, location feasibility, and your financial profile. Having a signed franchise agreement and a projected cash flow statement significantly improves loan approval chances.',
                        ],
                        [
                            'What is the difference between FOFO and FOCO franchise models?',
                            'FOFO (Franchisee Owned, Franchisee Operated) means you invest the capital and run the store yourself - all profit and risk is yours. FOCO (Franchisee Owned, Company Operated) means you invest but the brand\'s team manages operations - returns are more predictable but lower. Most grocery franchises in India - including Reliance Fresh and 7x Basket - operate on the FOFO model.',
                        ],
                        [
                            'What should I check before signing a grocery franchise agreement?',
                            'Check five things before signing - royalty structure and when it starts, territory exclusivity terms, full investment breakdown with no hidden costs, renewal and exit clauses, and actual support quality by speaking to existing franchise partners. Always have a franchise consultant or lawyer review the agreement before committing.',
                        ],

                        [
                            'Is a grocery store a good business in India in 2026?',
                            'Grocery is one of the most recession-proof retail businesses because demand is daily and non-discretionary. India\'s grocery retail is changing with growing urbanization, digital convergence, and changing consumer patterns - the need for organised formats has never been higher. Organised grocery stores replacing unbranded kirana shops is the single biggest structural trend driving franchise growth right now.',
                        ],
                    ];
                    $leftFaqs = array_slice($applyFaqs, 0, 4);
                    $rightFaqs = array_slice($applyFaqs, 4);
                @endphp

                {{-- Left column --}}
                <div class="flex-1 flex flex-col gap-4">
                    @foreach ($leftFaqs as $idx => [$q, $a])
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
                    @foreach ($rightFaqs as $idx => [$q, $a])
                        @php $i = $idx + 4; @endphp
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
                    labels: ['2020', '2021', '2022', '2023', '2024', '2025*', '2026*'],
                    datasets: [{
                            label: 'Actual',
                            data: [39, 42, 46, 50, 54, null, null],
                            backgroundColor: '#109125',
                            borderColor: '#109125',
                            borderWidth: 0,
                            borderRadius: 5,
                            borderSkipped: false,
                            barPercentage: 0.55,
                            categoryPercentage: 0.75,
                        },
                        {
                            label: 'Projected',
                            data: [null, null, null, null, 54, 57, 62],
                            backgroundColor: '#86efac',
                            borderColor: '#86efac',
                            borderWidth: 0,
                            borderRadius: 5,
                            borderSkipped: false,
                            barPercentage: 0.55,
                            categoryPercentage: 0.75,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1f2937',
                            titleColor: '#f9fafb',
                            bodyColor: '#d1fae5',
                            padding: 10,
                            callbacks: {
                                label: function(c) {
                                    return '  ' + c.dataset.label + ': ' + c.parsed.y + ' L Cr';
                                }
                            }
                        }
                    },
                    layout: {
                        padding: {
                            top: 28,
                            left: 4,
                            right: 4
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 30,
                            max: 75,
                            grid: {
                                color: 'rgba(0,0,0,0.07)'
                            },
                            border: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 11,
                                    family: 'Inter, sans-serif'
                                },
                                color: '#6b7280',
                                callback: function(v) {
                                    return v + ' L Cr';
                                },
                                stepSize: 5
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            border: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 11,
                                    family: 'Inter, sans-serif'
                                },
                                color: '#6b7280'
                            }
                        }
                    },
                    animation: {
                        onComplete: function() {
                            var chart = this;
                            var ctx2 = chart.ctx;
                            ctx2.save();
                            ctx2.textAlign = 'center';
                            ctx2.textBaseline = 'bottom';
                            chart.data.datasets.forEach(function(dataset, i) {
                                var meta = chart.getDatasetMeta(i);
                                meta.data.forEach(function(bar, index) {
                                    var val = dataset.data[index];
                                    if (val !== null && val !== undefined) {
                                        var barWidth = bar.width || 30;
                                        // background pill
                                        var label = val + ' L Cr';
                                        ctx2.font = 'bold 10px Inter, sans-serif';
                                        var tw = ctx2.measureText(label).width;
                                        var px = bar.x;
                                        var py = bar.y - 6;
                                        var pad = 4;
                                        ctx2.fillStyle = i === 0 ? '#166534' : '#14532d';
                                        ctx2.beginPath();
                                        ctx2.roundRect(px - tw / 2 - pad, py - 14, tw +
                                            pad * 2, 16, 4);
                                        ctx2.fill();
                                        ctx2.fillStyle = '#ffffff';
                                        ctx2.fillText(label, px, py);
                                    }
                                });
                            });
                            ctx2.restore();
                        }
                    }
                }
            });
        })();
    </script>
@endsection
