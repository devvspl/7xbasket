@extends('layouts.app')
@section('content')
    {{-- Hero / Breadcrumb --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] py-10 text-center">
        <div class="absolute blob w-72 h-72 bg-[#109125]/20 top-[-60px] left-[-60px]"></div>
        <div class="absolute blob w-56 h-56 bg-[#ec2024]/10 bottom-[-40px] right-[5%]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span
                class="inline-flex items-center gap-2 bg-white/10 text-green-200 text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-white/20">
                <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                India's trusted supermarket chain in India
            </span>
            <h1 class="text-4xl font-extrabold text-white mb-3">About 7x Basket</h1>
            <p class="text-green-100/80 text-base max-w-lg mx-auto">Building India's most trusted grocery franchise network.
            </p>
            <nav class="text-sm flex items-center gap-1 flex-wrap justify-center mt-4">
                <a href="{{ route('home') }}" class="text-green-300 hover:text-white transition-colors">Home</a>
                <span class="text-white/30">/</span>
                <span class="text-white font-medium">About</span>
            </nav>
        </div>
    </section>

    {{-- Our Origin --}}
    <section class="py-12  bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="relative" data-aos="fade-right">
                    <div class="bg-[#0f2d1f] rounded-2xl p-5 relative">
                        <div
                            class="absolute -top-4 -right-4 bg-[#ec2024] text-white rounded-xl px-4 py-2.5 text-center shadow-lg">
                            <div class="text-xl font-black leading-none">5+</div>
                            <div class="text-[10px] font-bold uppercase mt-0.5">Years Strong</div>
                        </div>
                        <img src="{{ asset('custom/7x_Basket_Store.jpg') }}" alt="7x Basket Store"
                            class="rounded-xl w-full h-72 object-cover">
                        <div class="bg-black/30 rounded-xl p-4 mt-4">
                            <p class="text-white text-md text-center italic leading-relaxed">"We didn't build a supermarket chain. We
                                built a wealth-creation engine for middle-class India."</p>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left">
                    <span class="bg-[#f0faf4] text-[#109125] text-xs font-bold px-3 py-1 rounded-full inline-block">Our
                        Origin</span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mt-3 mb-2 leading-tight">How 7x Basket Started - And
                        Where It Stands Today</h2>
                    <div class="w-8 h-1 bg-[#ec2024] rounded mb-5"></div>
                    <div class="space-y-3 text-gray-500 text-sm leading-relaxed">
                        <p>7x Basket was founded in Delhi in 2022. Grocery is one of the most everyday businesses in India -
                            every family buys it daily. But most small store owners were running without any real system. No
                            billing software, no steady supply, no brand that gave customers a reason to choose them.</p>
                        <p>So we built a model where anyone who wants to open a grocery store gets everything they need from
                            day one - the brand, the products, the software, and the training. They run the store. We take
                            care of the rest. Today that model is live across 150+ stores in 25 states.</p>
                        <p>The name 7x reflects what we want every store owner to earn back on their investment. We work
                            toward that by keeping costs clear, timelines honest, and support available long after the store
                            has opened.</p>
                    </div>
                    <div class="flex flex-wrap gap-3 mt-6">
                        <a href="#" onclick="openLeadPopup(); return false;"
                            class="bg-[#ec2024] hover:bg-red-700 text-white font-bold px-6 py-3 rounded-xl text-sm transition-all duration-200 hover:-translate-y-0.5">Apply
                            for Franchise →</a>
                        <a href="#" onclick="openLeadPopup('brochure'); return false;"
                            class="bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold px-6 py-3 rounded-xl text-sm transition-all duration-200 hover:-translate-y-0.5">Download
                            Brochure</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Stats Bar --}}
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

    {{-- Mission / Vision / Values --}}
    <section class="py-12  bg-[#f8faf8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-xs font-bold uppercase tracking-widest">What Drives Us</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Purpose. Direction. <span
                        class="text-[#109125]">Principles.</span></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-[#109125] rounded-2xl p-7" data-aos="fade-up" data-aos-delay="0">
                    <span
                        class="bg-white/20 text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded-full inline-block">Mission</span>

                    <p class="text-green-100 text-sm leading-relaxed mt-3">Our mission is to help aspiring entrepreneurs
                        open and run a successful grocery store - with the right brand, products, technology, and training
                        already in place. We make sure no one has to start from zero.</p>

                </div>

                <div class="bg-[#0f2d1f] rounded-2xl p-7" data-aos="fade-up" data-aos-delay="100">
                    <span
                        class="bg-white/10 text-[#4ade80] text-[10px] font-bold uppercase px-2 py-0.5 rounded-full inline-block">Vision</span>

                    <p class="text-green-300/70 text-sm leading-relaxed mt-3">We want a 7x Basket store in every
                        neighbourhood across India where families still rely on unorganised shops. Our goal is 1,000
                        franchise stores by 2028 - in big cities and small towns alike. </p>
                </div>

                <div class="bg-[#109125] rounded-2xl p-7" data-aos="fade-up" data-aos-delay="200">

                    <span
                        class="bg-white/20 text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded-full inline-block">
                        Our Values
                    </span>



                    <p class="text-green-100 text-sm leading-relaxed mt-3">
                        With a wide range of quality FMCG products, we want every customer to find what they need at a fair
                        price. We stand by our franchise owners with full transparency and hands-on support - because their
                        success is what makes this work.

                    </p>



                </div>

            </div>
        </div>
    </section>

    {{-- Journey / Timeline --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-14 lg:items-start">

                {{-- LEFT: sticky on desktop only --}}
                <div class="w-full lg:w-80 flex-shrink-0 journey-sticky">
                    <span class="text-[#109125] text-xs font-bold uppercase tracking-widest block">Our Journey</span>

                    <h2 class="text-4xl font-extrabold text-gray-900 leading-tight mt-3">
                        From One Store<br>to <span class="text-[#109125]">a Supermarket Chain</span>
                    </h2>

                    <p class="text-gray-500 text-base mt-4 leading-relaxed">
                        What started as one store in Delhi is now a growing network across India.
                    </p>

                    <div class="border-l-4 border-[#109125] bg-gray-50 rounded-r-xl pl-4 pr-5 py-4 mt-6">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Currently Operating</p>
                        <p class="text-5xl font-extrabold text-[#109125] mt-1 leading-none">150+</p>
                        <p class="text-sm text-gray-500 mt-2">Stores Across 25 States</p>
                    </div>
                </div>

                {{-- RIGHT: timeline scrolls naturally --}}
                <div class="flex-1 min-w-0">
                    <div class="relative border-l-2 border-gray-100 ml-2 space-y-10 pb-4">
                        @foreach ([
            ['2021', 'Research and Groundwork', 'Before building anything, we spent time in the market — talking to store owners, understanding how supply chains worked, and figuring out what a grocery franchise in India actually needed to succeed.', []],

            ['2022', '7x Basket Officially Founded', '2022 was when it all became official. Brand registered, first store opened, first franchise partner onboarded. The model went from concept to reality.', []],

            ['2023', 'First Multi-state Expansion', 'The network crossed state lines. New franchise partners joined from UP, Haryana, and Rajasthan. FMCG brand tie-ups and cloud-based POS system rolled out across all stores.', []],

            ['2024', 'Technology and Training Overhaul', 'Dedicated franchise training programme launched. 9 support pillars formalised for every franchise partner. Tier-2 city expansion begins with active pincode-based territory mapping.', []],

            ['2025', '150 stores, 25 states', 'Network crosses 150 active stores across 25 Indian states. Zero-royalty model confirmed for the first 2 years of operation. Customer rating reaches 4.9/5 across the franchise network.', []],

            ['2026 →', 'Road to 500 stores', 'Expansion into tier-2 and tier-3 cities is well underway. New franchise slots are opening every month across India. The target is 500 active stores - and we are on track.', []],
        ] as [$year, $title, $body, $tags])
                            <div class="relative pl-10 timeline-item opacity-0 translate-y-4 transition-all duration-500">
                                <div
                                    class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-[#109125] border-2 border-white shadow-sm">
                                </div>
                                <span
                                    class="text-[#109125] text-xs font-bold uppercase tracking-widest">{{ $year }}</span>
                                <h3 class="text-base font-semibold text-gray-900 mt-0.5">{{ $title }}</h3>
                                <p class="text-gray-500 text-sm leading-relaxed mt-1">{{ $body }}</p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach ($tags as [$tag, $red])
                                        <span
                                            class="text-[10px] font-bold uppercase px-2 py-1 rounded-full {{ $red ? 'bg-[#ec2024] text-white' : 'bg-gray-100 text-gray-500' }}">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // Animate timeline items on scroll
        (function() {
            var items = document.querySelectorAll('.timeline-item');
            if (!items.length) return;
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-4');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15
            });
            items.forEach(function(item) {
                observer.observe(item);
            });
        })();
    </script>

    {{-- Pan India Network --}}
    <section class="py-12  bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                <div data-aos="fade-right">
                    <span class="text-[#109125] text-xs font-bold uppercase tracking-widest">Pan India Network</span>
                    <h2 class="text-3xl font-extrabold text-gray-900 leading-tight mt-2">
                        Spreading Across <span class="text-[#109125]">Every</span> State
                    </h2>
                    <p class="text-gray-400 text-sm mt-3 max-w-md">From Delhi to 25 states - and we are not done yet. See
                        where we are active and where we are headed.</p>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        @foreach ([['150+', 'Live Stores'], ['100+', 'Cities Covered'], ['25+', 'States Covered'], ['New', 'Slots Opening Monthly']] as [$n, $l])
                            <div class="bg-white border border-gray-100 rounded-xl p-4">
                                <p class="text-2xl font-extrabold text-[#109125]">{{ $n }}</p>
                                <p class="text-gray-400 text-xs mt-0.5">{{ $l }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-left">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Active States</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['Delhi & NCR', 'Uttar Pradesh', 'Haryana', 'Rajasthan', 'Punjab', 'Bihar', 'Uttarakhand', 'Odisha', 'Madhya Pradesh', 'Jharkhand', 'Gujarat', 'Himachal Pradesh'] as $state)
                            <span
                                class="flex items-center gap-1.5 bg-white border border-gray-200 text-gray-700 text-sm px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 rounded-full bg-[#109125] flex-shrink-0"></span>{{ $state }}
                            </span>
                        @endforeach
                    </div>
                    <p class="text-xs font-bold text-[#ec2024] uppercase tracking-widest mt-5 mb-3">Expanding Soon</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['Maharashtra', 'West Bengal', 'Telangana', 'Karnataka', 'Tamil Nadu'] as $state)
                            <span
                                class="flex items-center gap-1.5 bg-white border border-gray-200 text-gray-700 text-sm px-3 py-1.5 rounded-full">
                                <span class="w-2 h-2 rounded-full bg-[#ec2024] flex-shrink-0"></span>{{ $state }}
                            </span>
                        @endforeach
                    </div>
                    <a href="#" onclick="openLeadPopup(); return false;"
                        class="bg-[#109125] text-white font-bold px-6 py-3 rounded-xl text-sm mt-8 inline-block hover:bg-[#0d7a1e] transition-all duration-200 hover:-translate-y-0.5">Apply
                        for Your City →</a>
                </div>

            </div>
        </div>
    </section>

    {{-- What Makes Us Different --}}
    <section class="py-12  bg-[#0f2d1f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span
                    class="border border-[#4ade80]/20 text-[#4ade80] text-xs font-bold px-3 py-1 rounded-full inline-block">Inside
                    7x Basket</span>
                <h2 class="text-3xl font-extrabold text-white mt-3">What Makes Us <span
                        class="text-[#4ade80]">Different</span></h2>
                <p class="text-green-300/60 text-sm mt-2 mx-auto">Most franchise brands give you a manual and leave. We do
                    not. Here is what is different about working with us.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([
            ['🧑‍💼', 'Franchisee-First Decisions', 'Every decision we make - big or small - starts with one question: is this good for the store owner? If the answer is no, we go back and rethink it.'],

            ['⚡', 'Your Store Opens Fast', 'Sign the agreement today. Your store can be ready in 45 days. We check your site in 3 days and answer your calls the same day - not next week.'],

            ['🔍', 'No Hidden Costs', 'We show you exactly what you will spend before you say yes to anything. Every cost is written down clearly. Nothing gets added later.'],

            ['🏙️', 'Built for Smaller Cities', 'Tier-2 and tier-3 cities have real demand but far less competition. Our franchise owners in smaller cities often do better than those in big metros.'],

            ['💻', 'Easy to Use Technology', 'Our billing and stock management system is simple. Your staff can learn it in a day. No technical background needed - it just works.'],

            ['👥', '150+ Community Network', 'When you join 7x Basket, you join a group of 150+ store owners who share tips, help each other out, and know what works on the ground.'],
        ] as [$icon, $title, $body])
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="w-9 h-9 bg-white/10 rounded-xl flex items-center justify-center text-lg mb-3">
                            {{ $icon }}</div>
                        <p class="text-white font-semibold text-sm">{{ $title }}</p>
                        <p class="text-white text-xs leading-relaxed mt-1.5">
                            {{ $body }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Built on Proof --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-xs font-bold uppercase tracking-widest">Why Trust Us</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Built on Proof, Not <span
                        class="text-[#109125]">Promises</span></h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Big number — tall left card --}}
                <div class="bg-[#109125] rounded-2xl p-8 flex flex-col justify-center items-center text-center"
                    data-aos="fade-up" data-aos-delay="0">
                    <p class="text-6xl font-extrabold text-white">4.9/5</p>
                    <p class="text-green-100 text-sm mt-3 leading-relaxed">Average customer rating across all 7x Basket
                        stores - rated by real shoppers, not us.</p>
                    <a href="{{ route('blogs') }}"
                        class="bg-white text-[#109125] font-bold px-6 py-3 rounded-xl text-sm mt-6 w-full block text-center hover:bg-gray-100 transition-all duration-200">View
                        Success Stories →</a>
                </div>

                {{-- Right: 2x2 grid --}}
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6" data-aos="fade-up" data-aos-delay="100">

                    {{-- Award --}}
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                        <div class="text-2xl mb-3">🏆</div>
                        <p class="text-base font-bold text-gray-900">Award-Winning Model</p>
                        <p class="text-gray-500 text-sm leading-relaxed mt-2">7x Basket has been recognised across industry
                            platforms as one of India's fastest-growing grocery franchise brands. A model built on real
                            numbers, real stores, and real franchise owners.</p>
                    </div>

                    {{-- Legal --}}
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                        <div class="text-2xl mb-3">📋</div>
                        <p class="text-base font-bold text-gray-900">Full Legal Compliance</p>
                        <p class="text-gray-500 text-sm leading-relaxed mt-2">Every franchise agreement is formally
                            registered. All stores operate under FSSAI, GST, and the Shops & Establishments Act. Your
                            investment is legally documented from day one.</p>
                    </div>

                    {{-- Territory — full width of right column --}}
                    <div class="sm:col-span-2 bg-[#ec2024] rounded-2xl p-6">
                        <div class="text-2xl mb-3">🔒</div>
                        <p class="text-base font-bold text-white">Your Territory is Protected</p>
                        <p class="text-red-100 text-sm leading-relaxed mt-2">Once your area is confirmed, no other 7x
                            Basket store opens within your zone for the full term of your agreement. The customers in your
                            locality are yours to serve.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-12 pt-0 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-xs font-bold uppercase tracking-widest">FAQ</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-3">Frequently Asked Questions</h2>
                <p class="text-gray-500 text-sm">Everything you need to know about the 7x Basket franchise model.</p>
            </div>
            <div class="flex flex-col md:flex-row md:items-start gap-4" x-data="{ open: null }">
                @php
                    $faqs = [
                        ['What is 7x Basket and how does the franchise model work?', '7x Basket is a supermarket franchise brand headquartered in Delhi. Under the model, a franchisee pays a one-time fee and a variable setup cost based on store size, then runs a fully branded neighbourhood supermarket with 7x Basket\'s supply chain, software, and operational support. The brand charges zero royalty for the first 2 years of operation, after which a 1% royalty on total monthly sales applies from year 3 onwards. The franchise agreement runs for 5 years and is renewable.'],
                        ['How large is India\'s grocery market and why does it matter to franchisees?', 'India\'s grocery market is one of the largest in the world and remains predominantly unorganised. Over 90 percent of grocery retail in India still happens through unorganised channels - small shops, wet markets, and individual vendors. This means the shift toward branded, organised grocery retail is still in its early stages, which creates genuine demand for franchise-owned neighbourhood supermarkets in both urban and semi-urban areas.'],
                        ['How many states and cities does 7x Basket operate in?', '7x Basket currently operates 150+ franchise stores across 100+ cities in 25 states pan-India. The network is expanding monthly, with active territory mapping in tier-2 and tier-3 cities. Established in 2022, the brand has 3+ years of proven franchise operations. You can check city availability by contacting the team directly or applying online.'],
                        ['What support does 7x Basket provide to franchisees?', '7x Basket provides 9 dedicated support pillars to every franchisee. This includes site selection, store design and setup, 1-month on-site training during the launch phase, ongoing remote support post-launch, cloud-based billing software, inventory management guidance, marketing support for the store launch, branded signage and in-store materials, and access to the brand\'s national procurement network for product sourcing.'],
                    ];
                    $left = array_slice($faqs, 0, 2);
                    $right = array_slice($faqs, 2);
                @endphp

                {{-- Left column --}}
                <div class="flex-1 flex flex-col gap-4">
                    @foreach ($left as $idx => [$q, $a])
                        <div class="bg-gray-50 rounded-xl border border-[#d4e8dc] overflow-hidden transition-all duration-300"
                            :class="open === {{ $idx }} ? 'shadow-md' : 'shadow-sm'" data-aos="fade-up"
                            data-aos-delay="{{ $idx * 60 }}">
                            <div class="flex">
                                <div class="w-1 flex-shrink-0 rounded-l-xl transition-all duration-300"
                                    :class="open === {{ $idx }} ? 'bg-[#109125]' : 'bg-transparent'"></div>
                                <div class="flex-1">
                                    <button @click="open === {{ $idx }} ? open = null : open = {{ $idx }}"
                                        class="w-full flex items-center justify-between px-5 py-4 text-left">
                                        <span class="font-semibold text-gray-900 text-sm pr-4 leading-snug">{{ $q }}</span>
                                        <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center transition-all duration-300"
                                            :class="open === {{ $idx }} ? 'bg-[#109125]' : 'bg-[#f0f7f3]'">
                                            <svg :class="open === {{ $idx }} ? 'rotate-180 text-white' : 'text-[#109125]'"
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
                        @php $i = $idx + 2; @endphp
                        <div class="bg-gray-50 rounded-xl border border-[#d4e8dc] overflow-hidden transition-all duration-300"
                            :class="open === {{ $i }} ? 'shadow-md' : 'shadow-sm'" data-aos="fade-up"
                            data-aos-delay="{{ $i * 60 }}">
                            <div class="flex">
                                <div class="w-1 flex-shrink-0 rounded-l-xl transition-all duration-300"
                                    :class="open === {{ $i }} ? 'bg-[#109125]' : 'bg-transparent'"></div>
                                <div class="flex-1">
                                    <button @click="open === {{ $i }} ? open = null : open = {{ $i }}"
                                        class="w-full flex items-center justify-between px-5 py-4 text-left">
                                        <span class="font-semibold text-gray-900 text-sm pr-4 leading-snug">{{ $q }}</span>
                                        <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center transition-all duration-300"
                                            :class="open === {{ $i }} ? 'bg-[#109125]' : 'bg-[#f0f7f3]'">
                                            <svg :class="open === {{ $i }} ? 'rotate-180 text-white' : 'text-[#109125]'"
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
    {{-- Final CTA --}}
    <section class="py-12 bg-[#f0faf4] text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <span
                class="border border-[#109125]/30 text-[#109125] text-xs font-bold px-3 py-1 rounded-full inline-block">Join
                the Network</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-5 leading-tight">
                You've Read Our Story.<br>Now <span class="text-[#109125]">Write Yours.</span>
            </h2>
            <p class="text-gray-500 text-sm mt-3 max-w-lg mx-auto">Over 150 entrepreneurs across India chose 7x Basket to
                start their business. If you are thinking about it, the best time to take that first step is now.</p>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <a href="#" onclick="openLeadPopup(); return false;"
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
    <script>
        AOS.init({
            once: true,
            offset: 60
        });
    </script>
@endsection
