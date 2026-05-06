@extends('layouts.landing')
@section('content')
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                    India's Most Supported Supermarket Franchise — Starting at ₹13 Lakh, <span class="text-[#109125]">Zero
                        Royalty for 2 Years</span>
                </h2>
                <p class="text-gray-600 text-base max-w-4xl mx-auto mt-4 leading-relaxed">
                    Most people searching for a grocery store franchise in India hit the same wall: brands that look good on
                    the website but give you almost no real support after you sign.
                </p>
                <p class="text-gray-700 text-base max-w-4xl mx-auto mt-3 leading-relaxed font-medium">
                    7x Basket is built differently. You get a fully stocked supermarket franchise — 15,000+ products from
                    Amul, HUL, Nestlé, and 150+ national brands — open in 45 days, with one named person managing your
                    account from day one.
                </p>
                <p class="text-gray-600 text-base max-w-4xl mx-auto mt-3 leading-relaxed">
                    Grocery franchise cost starting at ₹13 lakh. No royalty for the first 2 years. Your profits stay yours.
                </p>
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
                        @foreach ([['💰', 'Zero royalty — 2 years', 'Keep every rupee of profit for your first two years of operation.'], ['🚀', 'Opens in 45 days', 'Signed agreement to grand opening in 45 days, fully managed.'], ['🎓', 'Full staff training', 'Your team trained and ready before the doors open.'], ['📦', '15,000+ products', 'Direct sourcing from top FMCG brands at wholesale prices.'], ['🔒', 'Exclusive territory', 'Your pincode zone is protected — no competing store nearby.'], ['💵', 'Starts at ₹13 lakh', 'Transparent investment breakdown — no surprise costs after signing.']] as [$icon, $title, $desc])
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
                    <h2 class="text-lg font-extrabold text-gray-900 mb-1">Apply for your grocery store franchise</h2>
                    <p class="text-gray-400 text-sm mb-5">Our team calls you within 24 hours.</p>
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
                            <span class="relative">YES — I want to open my store →</span>
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
                        <p class="text-center text-xs text-gray-400">No spam. No pressure. We call only to discuss your
                            franchise query.
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
                        Why a grocery business franchise is one of the
                        <span class="text-[#109125]">strongest opportunities in India right now</span>
                    </h2>
                    <p class="text-gray-500 text-sm mt-4 leading-relaxed">Organised grocery retail covers 12% of India's
                        market. The remaining 88% is still unbranded kirana — local stores with no supply chain advantage,
                        no technology, and no brand pull.</p>
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed">That gap is exactly where a grocery supermarket
                        franchise operates. Demand is weekly. It does not slow down in recessions. Customers buy groceries
                        regardless of what the economy is doing, which is what makes supermarket franchise opportunities in
                        India more stable than most retail categories.</p>
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed">India's grocery market is projected to cross ₹85
                        lakh crore by 2030, growing at 9% per year. The franchisees who claim a territory now will have 5–6
                        years of compounding customer loyalty before that growth peaks. The ones who wait will pay more for
                        the same territory, or find it already taken.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        @foreach ([['~₹58 lakh cr', 'Estimated market size 2025'], ['9% CAGR', 'Projected growth 2025–2030'], ['~12%', 'Organised retail share today'], ['₹85 lakh cr', 'Projected size by 2030']] as [$n, $l])
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
                    <p class="text-xs text-gray-400 mb-4">In INR Lakh Crore · 2020–2026 (2025–26 projected)</p>
                    <div class="flex items-center gap-4 mb-3"><span
                            class="flex items-center gap-1.5 text-xs text-gray-600 font-medium"><span
                                class="w-3 h-3 rounded-sm inline-block bg-[#109125]"></span> Actual</span><span
                            class="flex items-center gap-1.5 text-xs text-gray-600 font-medium"><span
                                class="w-3 h-3 rounded-sm inline-block bg-[#86efac]"></span> Projected</span></div>
                    <div class="flex-1" style="min-height:300px"><canvas id="groceryChart"></canvas></div>
                    <p class="text-[10px] text-gray-400 mt-3 text-center">Sources: Statista / Euromonitor / Technavio.
                        2025–2030 projected at 9% CAGR.</p>
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
                <h2 class="text-3xl font-extrabold text-white mt-2">Everything in place before your grocery store franchise
                    opens</h2>
                <p class="text-green-300/60 text-sm mt-2 max-w-3xl mx-auto">Most people who try to open an independent
                    grocery store or small grocery franchise spend the first year learning things they should have known
                    before signing anything — supplier contacts, software, store layout, licences, staff training. By the
                    time they sort it out, a better-stocked competitor has already taken their customers.</p>
                <p class="text-green-300/60 text-sm mt-2 max-w-3xl mx-auto">With 7x Basket, that groundwork is done before
                    your store opens. Whether you are opening a mini grocery store franchise in a residential area or a full
                    supermarket in a high-footfall location, here is what is in place from day one.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([
            [1, '💰', 'Zero royalty — 2 years', 'You keep 100% of what your store earns for the first two years. 7x Basket earns through the supply chain, not your revenue. No royalty deducted, no hidden monthly fee. Your profit is yours to reinvest or take home.'],
            [2, '🏗️', 'Store ready in 45 days', 'From signed agreement to grand opening in 45 days. Applies to every store format — mini supermarket franchise or full hyper format. The operations team manages the full setup: fit-out, shelving, branding, and POS installation. You do not manage contractors or chase timelines.'],
            [3, '📦', '15,000+ products at wholesale', 'Direct sourcing from national FMCG brands at prices that give you margins a standalone kirana cannot match. Stock from Amul, Nestlé, HUL, Britannia, Dabur, and 150+ others, delivered on a regular cycle.'],
            [4, '🖥️', 'Cloud POS and inventory app', 'One platform for billing, stock tracking, and sales data. Works on a tablet or a basic laptop. No IT background needed. Your staff learns it before the store opens, and support is one call away if anything goes wrong.'],
            [5, '👥', 'Staff hired and trained', '7x Basket helps you hire and then trains every staff member before opening day. They know the POS, the layout, the customer flow, and the inventory system. You do not start with untrained staff figuring things out on your customers.'],
            [6, '📣', 'Marketing from week one', 'Branded marketing kits for your local area and national digital campaigns that drive footfall. You do not build a customer base from zero — the brand name and the marketing bring people in from the first week.'],
            [7, '🔒', 'Exclusive territory', 'Your pincode zone is locked. No other 7x Basket store opens within your protected radius. You build your customer base without competing against the same brand across the road.'],
            [8, '🤝', 'Dedicated relationship manager', 'One named person assigned to your store from day one. Reachable when you have a stock issue, a staffing question, or a technical problem. Not a call centre. One person who knows your store.'],
            [9, '📋', 'Legal and compliance handled', 'FSSAI, GST, and Shops Act documentation managed by 7x Basket\'s compliance team. You do not chase government offices or pay a consultant to figure out which licences you need. It gets done.'],
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
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-3">How 7x Basket compares to other supermarket
                    franchise options</h2>
                <p class="text-gray-500 text-sm max-w-2xl mx-auto">If you have looked at other grocery franchise brands,
                    you will have noticed a pattern: most do not publish their costs upfront, start charging royalty from
                    month one, and leave you to manage operations mostly on your own after signing.
                </p>
                <p class="text-gray-500 text-sm max-w-2xl mx-auto mt-2">Here is an honest comparison. Every line is
                    verifiable — ask any existing 7x Basket franchisee to confirm.
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
                            <td class="px-6 py-4 text-gray-600 text-sm">Grocery franchise cost / starting investment</td>
                            <td class="px-6 py-4 text-center bg-green-50/50 font-bold text-gray-800">₹13–15 lakh, fully
                                itemised</td>
                            <td class="px-6 py-4 text-center text-gray-600">₹20 lakh+, often undisclosed</td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Supermarket franchise cost transparency</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Full breakdown before signing</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Basic overview only</span>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Store opening timeline</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ 45 days, guaranteed</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗ Not stated</span>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Royalty-free period</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ 2 full years</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗ Charged from month 1</span>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Free accounting support</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ 3 months included</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-500 font-semibold text-sm">✗ Not included</span>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Exclusive territory</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Pincode protected</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Limited or shared</span>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-100">
                            <td class="px-6 py-4 text-gray-600 text-sm">Staff hiring and training</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ Full — hire and train</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Varies by brand</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 text-gray-600 text-sm">Dedicated franchise manager</td>
                            <td class="px-6 py-4 text-center bg-green-50/50">
                                <span class="text-[#109125] font-bold text-sm">✓ One named person, always</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-orange-500 font-semibold text-sm">~ Shared team</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-10">
                <a href="#apply-form"
                    onclick="document.querySelector('#applyPageForm').scrollIntoView({behavior:'smooth'}); return false;"
                    class="bg-[#ec2024] hover:bg-red-700 text-white font-extrabold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 hover:-translate-y-0.5 inline-block shadow-lg">
                    Apply now and claim your territory →
                </a>
            </div>
        </div>
    </section>
    <section class="bg-white border-t border-b border-gray-200 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-6">
            <div class="text-center mb-6" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Our Product Range</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-2">15,000+ products from India's most
                    recognised brands</h2>
                <p class="text-gray-500 max-w-2xl mx-auto text-sm">Your store stocks what people actually buy — not niche
                    imports, not unknown labels. The brands your customers grew up with: Amul, Britannia, Parle, ITC, HUL,
                    Dabur, Marico, Godrej, Patanjali, Colgate, Haldirams, Nestlé. Sourced directly at wholesale, delivered
                    regularly.</p>
            </div>
            <p class="text-center text-gray-600 text-sm mb-6" data-aos="fade-up">Stock covers 10 categories:</p>
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
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">As seen in</span>
                <p class="text-gray-500 text-sm mt-2">Recognised by India's leading business and franchise publications</p>
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
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2 mb-3">Inside a 7x Basket franchise store
                </h2>
                <p class="text-[#6b8f7e] mx-auto">Every photo below is from a real 7x Basket franchise store, already
                    running across India.</p>
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
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-1">Watch before you decide</h2>
                <p class="text-[#6b8f7e] text-sm">These three videos cover what most franchise enquiry calls cover in the
                    first 20 minutes. Watch them now — you will have better questions when our team calls.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-16">
                @foreach ([['custom/7x_Basket_Store.png', 'How to start a 7x Basket grocery store franchise — investment, process, and what to expect', 'Complete franchise guide', 'Expert Guide', 'E8SjNuM04Xk'], ['custom/7x_Basket_Store.png', 'Supermarket franchise offer — opening your store: ₹13 lakh investment, what you get', 'Full breakdown of costs and support', 'Business Overview', '_AWeuLbDD1w'], ['custom/7x_Basket_Store.png', 'Full setup guide — from agreement to grand opening, step by step', 'Complete launch timeline explained', 'Step-by-Step', 'znAW7U4EoDY']] as [$img, $title, $subtitle, $tag, $ytId])
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
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-1">What 200+ franchise partners say</h2>
                <p class="text-[#6b8f7e] text-sm">Real franchisees, real outcomes.</p>
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
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[60] bg-black/90 flex items-center justify-center p-4" @click.self="closeVideo()"
            style="display:none">
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
                                    'Turned profitable in 8 months. The support team picked up every call I made in the first year. Best business decision I have made.',
                                ],
                                [
                                    'Priya Sharma',
                                    'Mumbai',
                                    'Mini Store',
                                    'I ran a kirana store for six years before switching to a 7x Basket franchise. The difference in margins and daily footfall is not comparable. Fresh stock daily, better pricing, and the brand does the selling.',
                                ],
                                [
                                    'Amit Patel',
                                    'Ahmedabad',
                                    'Hyper Store',
                                    'From staff training to launch, everything happened on the timeline they promised. My store opened in 44 days.',
                                ],
                                [
                                    'Sunita Verma',
                                    'Jaipur',
                                    'Super Store',
                                    'Zero royalty for two years meant I could reinvest my profits back into the store in the first year. The brand name brings people in without spending on local ads.',
                                ],
                                [
                                    'Kiran Reddy',
                                    'Hyderabad',
                                    'Mini Store',
                                    'I converted my kirana shop to a 7x Basket franchise and the break-even came in 6 months. The relationship manager walked me through every step of the conversion.',
                                ],
                                [
                                    'Manoj Singh',
                                    'Lucknow',
                                    'Super Store',
                                    'I was not sure the 45-day launch was real. It was. My store opened exactly on schedule.',
                                ],
                                [
                                    'Deepa Nair',
                                    'Kochi',
                                    'Hyper Store',
                                    'The POS system is easier to use than I expected. My staff learned it in two days. Customer retention has been strong since month one.',
                                ],
                                [
                                    'Vikram Joshi',
                                    'Pune',
                                    'Mini Store',
                                    'Brand recognition drives footfall before you run a single local campaign. Customers walk in already knowing the name.',
                                ],
                                [
                                    'Anita Gupta',
                                    'Chandigarh',
                                    'Super Store',
                                    'National marketing campaigns mean I spend my time running the store, not trying to get people through the door. The brand does that part.',
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
                    Questions most people ask before applying
                </h2>
                <p class="text-gray-500 text-sm">
                    Everything you need to know before starting your franchise journey.
                </p>
            </div>
            <div class="flex flex-col md:flex-row md:items-start gap-4" x-data="{ open: null }">
                @php
                    $applyFaqs = [
                        [
                            'Do I need retail experience to open a grocery supermarket franchise?',
                            'No retail experience is needed. Before your store opens, 7x Basket trains you and every staff member on the POS system, inventory management, customer flow, and daily operations. The training covers what would take an independent store owner two years to learn on their own. Support continues after opening — there is no point where you are figuring it out without anyone to call.',
                        ],
                        [
                            'What is the grocery store franchise cost — total investment?',
                            'The starting investment is ₹13 lakh, which covers the franchise fee, store setup, initial stock, POS hardware, and branding. This is the grocery franchise cost for a standard format store. Supermarket franchise cost for larger formats varies by size — the full itemised breakdown is shared before you sign. There are no costs that appear after the agreement.',
                        ],
                        [
                            'Is there a royalty fee I need to pay?',
                            'No royalty for the first two years of operation. After year two, the royalty structure is disclosed upfront at the time of the agreement — there are no surprises built into the contract. During the first two years, every rupee your store earns is yours.',
                        ],
                        [
                            'How long does it actually take to open the store?',
                            '45 days from signed agreement to grand opening. This covers store fit-out, branding, shelving, POS installation, initial stock delivery, staff training, and compliance setup. The operations team manages the full timeline. You are not coordinating contractors or chasing paperwork.',
                        ],
                        [
                            'I already run a kirana store or grocery shop — can I convert it to a franchise?',
                            'Yes. 7x Basket has a conversion pathway for existing kirana store and grocery shop owners. Your current location is assessed for footfall and area potential. If it qualifies, the store is rebranded, restocked, and upgraded to the 7x Basket format. You keep your existing customer base and gain the procurement, technology, and brand pull that comes with the franchise. Many of 7x Basket\'s current partners came in through this kirana shop franchise conversion route.',
                        ],
                        [
                            'Can I get a bank loan to fund the franchise?',
                            'Yes. Most national and private banks in India offer MSME and Mudra scheme loans for franchise investments. Banks typically fund 60–70% of the project cost after reviewing the franchise agreement and your financial profile. A signed franchise agreement and a basic cash flow projection improve your approval chances significantly.',
                        ],
                        [
                            'What support do I get after the store opens?',
                            'After opening, you have a named relationship manager reachable directly — not a call centre queue. Stock is delivered on a regular cycle. The POS and inventory system is supported remotely. Marketing campaigns run at the national level and filter to your store. The support does not stop at opening day.',
                        ],
                        [
                            'Are supermarket franchise opportunities still available in my city?',
                            'Territories are allocated by pincode zone. Once a zone is taken, it is closed — 7x Basket does not put two stores in the same protected area. Fill the form or call +91 98702 75327 to check availability in your specific area. Some cities have open slots. Some do not.',
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

    <script>
        // Handle landing page form submission
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('applyPageForm');
            if (!form) return;

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const btn = document.getElementById('applyPageSubmit');
                const msg = document.getElementById('applyFormMsg');
                
                btn.disabled = true;
                btn.innerHTML = '<span class="relative">Submitting…</span>';
                
                const data = new FormData(form);
                
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-Page-Url': window.location.href
                    },
                    body: data
                })
                .then(res => res.json())
                .then(json => {
                    msg.classList.remove('hidden');
                    if (json.success) {
                        msg.className = 'rounded-xl px-4 py-3 text-sm font-medium mb-4 text-center bg-green-50 text-green-700 border border-green-200';
                        msg.textContent = json.message;
                        form.reset();
                        
                        // Redirect to thank-you page
                        setTimeout(() => {
                            if (json.redirect) {
                                window.location.href = json.redirect;
                            } else {
                                window.location.href = '{{ route("thank-you") }}';
                            }
                        }, 1500);
                    } else {
                        msg.className = 'rounded-xl px-4 py-3 text-sm font-medium mb-4 text-center bg-red-50 text-red-700 border border-red-200';
                        msg.textContent = json.message || 'Something went wrong. Please try again.';
                        btn.disabled = false;
                        btn.innerHTML = '<span class="relative">YES — I want to open my store →</span>';
                    }
                })
                .catch(() => {
                    msg.classList.remove('hidden');
                    msg.className = 'rounded-xl px-4 py-3 text-sm font-medium mb-4 text-center bg-red-50 text-red-700 border border-red-200';
                    msg.textContent = 'Network error. Please try again.';
                    btn.disabled = false;
                    btn.innerHTML = '<span class="relative">YES — I want to open my store →</span>';
                });
            });
        });
    </script>
@endsection
