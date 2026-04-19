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
                India's Fastest Growing Grocery Franchise
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
                            <p class="text-white text-sm italic leading-relaxed">"We didn't build a supermarket chain. We
                                built a wealth-creation engine for middle-class India."</p>
                            <p class="text-[#4ade80] text-xs font-bold mt-2">Founder, 7x Basket</p>
                            <p class="text-gray-400 text-xs">New Delhi · Est. 2019</p>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left">
                    <span class="bg-[#f0faf4] text-[#109125] text-xs font-bold px-3 py-1 rounded-full inline-block">Our
                        Origin</span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mt-3 mb-2 leading-tight">A Problem We Saw Every Single
                        Day</h2>
                    <div class="w-8 h-1 bg-[#ec2024] rounded mb-5"></div>
                    <div class="space-y-3 text-gray-500 text-sm leading-relaxed">
                        <p>In 2019, our founder walked through the lanes of Lajpat Nagar and noticed something that bothered
                            him deeply — every kirana shop was the same. Unorganised. Dusty. Limited stock. No billing
                            software. No hygiene standards.</p>
                        <p>Meanwhile, India's middle class was growing fast. People wanted better shopping experiences —
                            organised shelves, digital payments, wide product choice, clean ambience. But corporate
                            supermarkets were too expensive and too far away.</p>
                        <p>7x Basket was born to fill that exact gap. A franchise model that gives everyday entrepreneurs
                            the tools, supply chain, brand, and training to run a world-class neighbourhood supermarket —
                            starting from just ₹13 Lakh.</p>
                        <p>We named it 7x because we believe every rupee you invest here should come back to you seven times
                            over.</p>
                    </div>
                    <div class="flex flex-wrap gap-3 mt-6">
                        <a href="{{ route('apply') }}"
                            class="bg-[#ec2024] hover:bg-red-700 text-white font-bold px-6 py-3 rounded-xl text-sm transition-all duration-200 hover:-translate-y-0.5">Apply
                            for Franchise →</a>
                        <a href="{{ route('brochure.download') }}"
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
                        class="bg-white/20 text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded-full inline-block mb-3">Mission</span>
                    <h3 class="text-xl font-extrabold text-white leading-tight">Bring Organised Retail to Every Indian
                        Neighbourhood</h3>
                    <p class="text-green-100 text-sm leading-relaxed mt-3">We exist to replace the fragmented kirana
                        ecosystem with affordable, technology-enabled, franchise-owned supermarkets that serve every Indian
                        family — regardless of city size.</p>
                    <a href="{{ route('apply') }}"
                        class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-2 rounded-xl text-xs mt-6 inline-block transition-all duration-200">Learn
                        More →</a>
                </div>

                <div class="bg-[#0f2d1f] rounded-2xl p-7" data-aos="fade-up" data-aos-delay="100">
                    <span
                        class="bg-white/10 text-[#4ade80] text-[10px] font-bold uppercase px-2 py-0.5 rounded-full inline-block mb-3">Vision</span>
                    <h3 class="text-xl font-extrabold text-white leading-tight">1,000 Stores Across India by 2028</h3>
                    <p class="text-green-300/70 text-sm leading-relaxed mt-3">We're on a path to become India's most trusted
                        neighbourhood supermarket brand — present in every tier-1, tier-2, and tier-3 city, powering
                        livelihoods for thousands of franchise owners.</p>
                </div>

                <div class="bg-[#109125] rounded-2xl p-7" data-aos="fade-up" data-aos-delay="200">

                    <span
                        class="bg-white/20 text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded-full inline-block mb-3">
                        Our Values
                    </span>

                    <h3 class="text-xl font-extrabold text-white leading-tight">
                        What We Stand For
                    </h3>

                    <p class="text-green-100 text-sm leading-relaxed mt-3">
                        We believe in complete transparency in every cost and process, ensuring trust at every step.
                        Our franchise partners are at the heart of everything we do.
                    </p>

                    <a href="{{ route('apply') }}"
                        class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-2 rounded-xl text-xs mt-6 inline-block transition-all duration-200">
                        Learn More →
                    </a>

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
                        From One Store<br>to <span class="text-[#109125]">Two<br>Hundred</span>
                    </h2>
                    <p class="text-gray-500 text-base mt-4 leading-relaxed">Five years of relentless building, one franchise
                        at a time.</p>
                    <div class="border-l-4 border-[#109125] bg-gray-50 rounded-r-xl pl-4 pr-5 py-4 mt-6">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Currently operating</p>
                        <p class="text-5xl font-extrabold text-[#109125] mt-1 leading-none">200+</p>
                        <p class="text-sm text-gray-500 mt-2">stores across 12 states</p>
                    </div>
                </div>

                {{-- RIGHT: timeline scrolls naturally --}}
                <div class="flex-1 min-w-0">
                    <div class="relative border-l-2 border-gray-100 ml-2 space-y-10 pb-4">
                        @foreach ([
            ['2019', 'The Idea Takes Shape', 'Founded in Lajpat Nagar, New Delhi. First pilot store launched.', [['1ST STORE DELHI', false]]],
            ['2020', 'Surviving & Strengthening', 'Pandemic hit, neighbourhood grocery became essential. Rapid expansion.', [['10 STORES', false], ['CLOUD POS LAUNCHED', false]]],
            ['2021', 'First Multi-State Expansion', 'Crossed NCR into UP, Haryana, Rajasthan.', [['35 STORES', false], ['4 STATES', false], ['BRAND PARTNERSHIPS', false]]],
            ['2022', 'Technology & Training Overhaul', 'Launched 7x Basket Franchise App. 45-day store launch guarantee introduced.', [['80 STORES', false], ['APP LAUNCH', false], ['45-DAY GUARANTEE', false]]],
            ['2023', 'Award Recognition & 130+ Stores', 'Best FMCG Startup award. National media coverage.', [['130 STORES', false], ['BEST FMCG STARTUP', false], ['8 STATES', false]]],
            ['2024–25', '200 Stores & Beyond', 'Exclusive territory model launched. Tier-2 city push begins.', [['200+ STORES', false], ['12 STATES', false], ['EXCLUSIVE TERRITORY', false]]],
            ['2026 →', 'Road to 1,000 Stores', 'Targeting tier-2 and tier-3 expansion aggressively.', [['500 STORES TARGET (2026)', false], ['1,000 BY 2028', true]]],
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
                    <p class="text-gray-400 text-sm mt-3 max-w-xs">From Kashmir to Kanyakumari — we're growing. See where
                        7x Basket stores are active and where we're heading next.</p>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        @foreach ([['12+', 'Active States'], ['200+', 'Live Stores'], ['8+', 'Coming Soon'], ['50+', 'Cities Covered']] as [$n, $l])
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
                    <a href="{{ route('apply') }}"
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
                <p class="text-green-300/60 text-sm mt-2 max-w-lg mx-auto">We're not a faceless corporation. We're a team
                    obsessed with franchisee success.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([['🧑‍💼', 'Franchisee-First Mindset', 'Every decision we make starts with one question: does this help our franchise owners earn more?'], ['⚡', 'Execution Speed', 'Site survey in 3 days. Store open in 45 days. Team response within the hour.'], ['🔍', 'Radical Transparency', 'No hidden fees. No vague promises. We show you every cost, every margin, every expected outcome before you sign.'], ['🏙️', 'Built for Small Cities Too', 'We actively target tier-2 and tier-3 cities — lower competition, higher loyalty, faster ROI for you.'], ['💻', 'Technology-Driven Operations', 'From cloud POS to a dedicated franchise app, we use technology to make daily store operations simple.'], ['👥', 'Community of Owners', 'Our WhatsApp franchise community has 200+ active store owners sharing tips, solving problems, and celebrating milestones together.']] as [$icon, $title, $body])
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="w-9 h-9 bg-white/10 rounded-xl flex items-center justify-center text-lg mb-3">
                            {{ $icon }}</div>
                        <p class="text-white font-semibold text-sm">{{ $title }}</p>
                        <p class="text-white/60 text-xs leading-relaxed mt-1.5">
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
                    <p class="text-6xl font-extrabold text-white">200+</p>
                    <p class="text-green-100 text-sm mt-3 leading-relaxed">Active franchise stores across India — each one
                        a proof point that the model works.</p>
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
                        <p class="text-gray-500 text-sm leading-relaxed mt-2">Recognised as Best FMCG Startup of the Year
                            at the Brands Impact Summit 2024. Covered in Business Standard, Entrepreneur India, and
                            Franchise India Magazine.</p>
                    </div>

                    {{-- Legal --}}
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                        <div class="text-2xl mb-3">📋</div>
                        <p class="text-base font-bold text-gray-900">Full Legal Compliance</p>
                        <p class="text-gray-500 text-sm leading-relaxed mt-2">Every franchise agreement is formally
                            registered. All operations comply with FSSAI, GST, Shops & Establishments Act. Your investment
                            is legally protected.</p>
                    </div>

                    {{-- Territory — full width of right column --}}
                    <div class="sm:col-span-2 bg-[#ec2024] rounded-2xl p-6">
                        <div class="text-2xl mb-3">🔒</div>
                        <p class="text-base font-bold text-white">Your Territory is Protected</p>
                        <p class="text-red-100 text-sm leading-relaxed mt-2">We practise exclusive territory franchising.
                            Once your pincode zone is assigned, 7x Basket will not open another store within your radius for
                            the duration of your agreement. You own your locality — completely.</p>
                    </div>

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
            <p class="text-gray-500 text-sm mt-3 max-w-lg mx-auto">200+ entrepreneurs trusted us to help them build
                something real. You could be next. Apply today — our team calls you within 30 minutes.</p>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <a href="{{ route('apply') }}"
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
