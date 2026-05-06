@extends('layouts.app')
@section('content')
    {{-- ══════════════════════════════════════════
     HERO
══════════════════════════════════════════ --}}
    <section
        class="relative overflow-hidden bg-[#f0faf4] lg:min-h-screen flex items-center"
        style="max-width:100vw">
        {{-- blobs --}}
        <div class="blob w-96 h-96 bg-[#109125]/10 top-[-80px] left-[-80px]"></div>
        <div class="blob w-72 h-72 bg-[#ec2024]/10 bottom-[-60px] right-[10%]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16 w-full relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div data-aos="fade-right" data-aos-duration="800">
                    <span
                        class="inline-flex items-center gap-2 bg-[#109125]/10 text-[#055346] text-xs font-semibold px-4 py-1.5 rounded-full mb-6 border border-[#109125]/20">
                        <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                        India's Fastest Growing Grocery Franchise
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                        Own a <span class="text-[#109125]">7x Basket</span><br>Grocery Store
                    </h1>
                    <p class="text-gray-500 text-lg leading-relaxed mb-8 max-w-lg">
                        Join 150+ successful franchise partners. Low investment, high returns, zero royalty, and complete
                        business support from day one.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-10">
                        <a href="#" onclick="openLeadPopup(); return false;"
                            class="inline-block bg-[#ec2024] hover:bg-[#c41e1e] text-white font-extrabold px-8 py-4 rounded-xl text-base shadow-[0_4px_20px_rgba(236,32,36,0.4)] hover:shadow-[0_6px_28px_rgba(236,32,36,0.55)] hover:-translate-y-0.5 transition-all duration-200">
                            Apply Now →
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-8">
                        @foreach ([['150+', 'Partners'], ['₹5L', 'Min. Investment'], ['30%', 'Avg. ROI'], ['0', 'Royalty Fee']] as [$n, $l])
                            <div>
                                <p class="text-3xl font-extrabold text-gray-900">{{ $n }}</p>
                                <p class="text-gray-500 text-sm">{{ $l }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200" class="relative">
                    <div class="relative bg-white rounded-3xl p-6 border border-gray-200 shadow-xl">
                        <img src="{{ asset('custom/7x_Basket_Store.png') }}" alt="7x Basket Store"
                            class="w-full h-72 object-cover rounded-2xl">
                        {{-- floating badges --}}
                        <div
                            class="absolute -top-4 -right-4 bg-[#ec2024] text-white text-xs font-bold px-3 py-2 rounded-xl shadow-lg">
                            Zero Royalty!
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 bg-white text-[#055346] text-xs font-bold px-3 py-2 rounded-xl shadow-lg border border-gray-100">
                            ✓ FSSAI Certified
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- wave --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 60L1440 60L1440 20C1200 60 960 0 720 20C480 40 240 0 0 20L0 60Z" fill="white" />
            </svg>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     TRUST BADGES
══════════════════════════════════════════ --}}
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ([['🏛️', 'FSSAI', 'Certified'], ['📋', 'GST', 'Registered'], ['⭐', '4.8/5', 'Customer Rating'], ['📅', '6+', 'Years in Business'], ['🏆', '15+', 'Industry Awards']] as [$icon, $val, $label])
                    <div class="card-hover bg-gray-50 rounded-2xl p-5 text-center border border-gray-100 {{ $loop->last ? 'col-span-2 sm:col-span-1' : '' }}"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="text-3xl mb-2">{{ $icon }}</div>
                        <p class="text-xl font-extrabold text-[#055346]">{{ $val }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     PROBLEM / SOLUTION
══════════════════════════════════════════ --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#ec2024] text-sm font-bold uppercase tracking-widest">Why Independent Stores Fail</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">The Problems We Solve</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Running a grocery store alone is hard. 7x Basket eliminates every
                    major pain point.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([['😰', 'No Brand Recognition', '✅ Instant brand trust with 7x Basket name'], ['📦', 'Supply Chain Issues', '✅ Direct sourcing, daily fresh delivery'], ['💸', 'High Operating Costs', '✅ Bulk buying power, lower margins'], ['📊', 'No Tech Support', '✅ POS, inventory & app included'], ['🎓', 'No Training', '✅ Full onboarding + staff training'], ['📣', 'Zero Marketing', '✅ National + local campaigns handled']] as [$icon, $problem, $solution])
                    <div class="card-hover bg-white rounded-2xl p-6 border border-gray-100 shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="text-3xl mb-3">{{ $icon }}</div>
                        <p class="text-sm font-semibold text-[#ec2024] mb-2 line-through opacity-70">{{ $problem }}
                        </p>
                        <p class="text-sm font-semibold text-[#109125]">{{ $solution }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     WHY CHOOSE US
══════════════════════════════════════════ --}}
    <section class="py-16 bg-gray-50 relative overflow-hidden">
        <div class="blob w-[500px] h-[500px] bg-[#109125]/5 top-[-100px] left-[-150px]"></div>
        <div class="blob w-80 h-80 bg-[#ec2024]/5 bottom-[-80px] right-[-80px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                {{-- Right: text content --}}
                <div data-aos="fade-left" data-aos-delay="100" class="lg:sticky lg:top-8">
                    <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Why 7x Basket</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-2 mb-4">Why Choose 7x Basket Franchise?
                    </h2>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Choosing a 7x Basket franchise in India is like hitting the jackpot! With our established brand
                        recognition, you'll be the go-to grocery store in no time. Our diverse product range means you can
                        cater to every customer's craving, from snacks to soaps. Plus, our flexible business model lets you
                        add your personal touch while still following our tried-and-true guidelines — no cookie-cutter
                        stores here!
                        <br><br>
                        Start a Supermarket Franchise with us to make inventory management a breeze. We've got your back
                        with ongoing training and 7x Basket Franchise Support to keep your store buzzing.
                    </p>

                    <div class="space-y-3 mb-8">
                        @foreach (['Exclusive territory rights — no competition from us', 'Access to 5000+ SKUs at wholesale prices', 'Dedicated relationship manager for your store', 'Digital marketing & social media handled for you', 'Customer loyalty program built-in'] as $item)
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-5 h-5 bg-[#109125] rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700 text-sm">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>

                    <a href="#" onclick="openLeadPopup(); return false;"
                        class="inline-block bg-[#ec2024] hover:bg-red-600 text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 text-base shadow-lg hover:-translate-y-0.5">
                        👉 Apply Franchise
                    </a>
                </div>

                {{-- Left: feature cards --}}
                <div class="flex flex-col gap-4" data-aos="fade-right">
                    <div class="grid grid-cols-2 gap-4" style="grid-auto-rows: 1fr">
                        @foreach ([[1, '💰', 'Lucrative Margins', 'Attractive profit margins and exclusive deals maximize earning potential with a high return on investment.'], [2, '📈', 'Proven Profitability', 'A franchise model with a proven track record of profitability, giving you a solid foundation from day one.'], [3, '🤝', 'Comprehensive Support', 'Full support from site selection and setup to ongoing operations — we are with you every step of the way.'], [4, '💡', 'Innovative Technology', 'Cutting-edge POS, inventory software, and digital marketing tools to streamline operations and drive growth.'], [5, '🛍️', 'Diverse Product Range', 'Groceries, household essentials, personal care, and more — catering to every customer need under one roof.'], [6, '🏷️', 'Established Brand', 'Leverage the 7x Basket brand trusted nationwide for quality, reliability, and everyday affordability.']] as [$num, $icon, $title, $desc])
                            <div class="relative bg-white border border-gray-200 rounded-xl p-4 hover:border-[#109125]/40 hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col justify-center"
                                data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                                <span
                                    class="absolute top-2 right-3 text-5xl font-extrabold text-gray-900/[0.04] leading-none select-none">{{ $num }}</span>
                                <div class="flex items-center gap-2 mb-1.5 relative z-10">
                                    <span class="text-sm leading-none">{{ $icon }}</span>
                                    <p class="font-bold text-gray-900 text-sm leading-tight">{{ $title }}</p>
                                </div>
                                <p class="text-gray-500 text-xs leading-relaxed relative z-10">{{ $desc }}</p>
                            </div>
                        @endforeach
                    </div>
                    {{-- 7th card centered --}}
                    <div class="flex justify-center">
                        <div class="relative bg-white border border-gray-200 rounded-xl p-4 hover:border-[#109125]/40 hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col justify-center w-1/2"
                            data-aos="fade-up" data-aos-delay="360">
                            <span
                                class="absolute top-2 right-3 text-5xl font-extrabold text-gray-900/[0.04] leading-none select-none">7</span>
                            <div class="flex items-center gap-2 mb-1.5 relative z-10">
                                <span class="text-sm leading-none">🌐</span>
                                <p class="font-bold text-gray-900 text-sm leading-tight">Community Network</p>
                            </div>
                            <p class="text-gray-500 text-xs leading-relaxed relative z-10">Join a network of franchisees
                                sharing best practices, experiences, and resources for mutual growth.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     STORE PLANS
══════════════════════════════════════════ --}}
    <section class="py-16 bg-white" id="plans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Store Plans</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">Choose Your Store Format</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Three formats to match your investment capacity and market size.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                @foreach ([['Mini Store', '₹5–8 Lakhs', '300–500 sq ft', 'Starter', false, ['150+ SKUs', 'POS System', 'Basic Staff Training', 'Local Marketing Support', 'FSSAI Compliance Help']], ['Super Store', '₹10–15 Lakhs', '800–1200 sq ft', 'Most Popular', true, ['2,000+ SKUs', 'Full POS + Inventory Tech', 'Advanced Staff Training', 'Dedicated Relationship Manager', 'Regional Marketing Campaigns']], ['Hyper Store', '₹20–30 Lakhs', '2000+ sq ft', 'Premium', false, ['5,000+ SKUs', 'Enterprise Tech Stack', 'Full Team Training', 'Priority 24/7 Support', 'National Marketing Campaigns']]] as [$name, $price, $size, $badge, $featured, $features])
                    <div class="relative rounded-2xl overflow-hidden border transition-all duration-300 hover:-translate-y-1 hover:shadow-xl
                        {{ $featured ? 'bg-white border-gray-200 shadow-2xl scale-105' : 'bg-gray-50 border-gray-200 shadow-sm' }}"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                        @if ($featured)
                            <div class="h-1.5 bg-[#ec2024] w-full"></div>
                        @else
                            <div class="h-1.5 bg-[#109125]/30 w-full"></div>
                        @endif

                        <div class="p-7">
                            <div class="flex items-center justify-between mb-4">
                                <span
                                    class="text-xs font-bold uppercase tracking-widest
                                    {{ $featured ? 'text-[#ec2024]' : 'text-[#109125]' }}">
                                    {{ $badge }}
                                </span>
                                @if ($featured)
                                    <span
                                        class="bg-[#ec2024] text-white text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wide">
                                        ⭐ Most Popular
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-2xl font-extrabold text-gray-900 mb-1">{{ $name }}</h3>
                            <p class="text-3xl font-extrabold {{ $featured ? 'text-[#ec2024]' : 'text-[#055346]' }} mb-1">
                                {{ $price }}</p>
                            <p class="text-sm text-gray-400 mb-6 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $size }} store area
                            </p>

                            <div class="border-t border-gray-100 mb-5"></div>

                            <ul class="space-y-3 mb-8">
                                @foreach ($features as $f)
                                    <li class="flex items-center gap-2.5 text-sm text-gray-700">
                                        <div
                                            class="w-5 h-5 {{ $featured ? 'bg-[#ec2024]' : 'bg-[#109125]' }} rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-3 h-3 {{ $featured ? 'text-white' : 'text-white' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        {{ $f }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="#" onclick="openLeadPopup(); return false;"
                                class="block text-center font-bold py-3.5 rounded-xl transition-all duration-200
                                {{ $featured
                                    ? 'bg-[#109125] hover:bg-[#0d7a1e] text-white shadow-lg shadow-green-900/20'
                                    : 'bg-[#109125]/10 hover:bg-[#109125] text-[#109125] hover:text-white border border-[#109125]/30 hover:border-[#109125]' }}">
                                Apply for {{ $name }} →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     DUAL CALCULATOR
══════════════════════════════════════════ --}}
    <section class="py-12 bg-gray-50" id="calculator">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Smart Calculator</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">Plan Your Franchise Investment
                </h2>
                <p class="text-gray-500 max-w-xl mx-auto">Calculate startup costs and projected earnings — all in one
                    place.</p>
            </div>

            <div x-data="{ tab: 'cost' }" data-aos="fade-up" data-aos-delay="100">

                {{-- Tab switcher --}}
                <div class="flex justify-center mb-6">
                    <div class="inline-flex bg-gray-100 rounded-2xl p-1 gap-1">
                        <button @click="tab = 'cost'"
                            :class="tab === 'cost' ? 'bg-white text-[#055346] shadow-sm' :
                                'text-gray-500 hover:text-[#055346]'"
                            class="px-6 py-2.5 rounded-xl text-sm font-bold transition-all duration-200">
                            💰 Startup Costs
                        </button>
                        <button @click="tab = 'earn'"
                            :class="tab === 'earn' ? 'bg-white text-[#055346] shadow-sm' :
                                'text-gray-500 hover:text-[#055346]'"
                            class="px-6 py-2.5 rounded-xl text-sm font-bold transition-all duration-200">
                            📈 Earnings Projection
                        </button>
                    </div>
                </div>

                {{-- ── TAB 1: Startup Cost Calculator ── --}}
                <div x-show="tab === 'cost'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                    <div x-data="{
                        storeType: 'super',
                        area: 10000,
                        plan: 1,
                        get baseRent() { return this.area * (this.storeType === 'mini' ? 35 : this.storeType === 'super' ? 45 : 55) },
                        get fitout() { return this.area * (this.storeType === 'mini' ? 800 : this.storeType === 'super' ? 1200 : 1500) },
                        get inventory() { return this.storeType === 'mini' ? 500000 : this.storeType === 'super' ? 1200000 : 2500000 },
                        get franchise() { return this.storeType === 'mini' ? 100000 : this.storeType === 'super' ? 200000 : 350000 },
                        get working() { return this.plan === 1 ? 500000 : this.plan === 2 ? 750000 : 1000000 },
                        get total() { return this.fitout + this.inventory + this.franchise + this.working },
                        fmt(n) { return '₹' + Number(n).toLocaleString('en-IN') }
                    }"
                        class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2">

                            {{-- Left --}}
                            <div class="p-6 sm:p-8 border-b lg:border-b-0 lg:border-r border-gray-100">
                                <p class="text-gray-900 font-bold text-base mb-5">Calculate Your Supermarket Franchise
                                    Startup Costs</p>

                                {{-- Store Type --}}
                                <div class="mb-5">
                                    <label
                                        class="text-gray-700 text-xs font-bold uppercase tracking-wider block mb-3">Supermarket
                                        Format</label>
                                    <div class="grid grid-cols-3 gap-3">
                                        @foreach (['mini' => ['🏪', 'Mini Store', '300–500 sqft'], 'super' => ['🏬', 'Super Store', '800–1200 sqft'], 'hyper' => ['🏢', 'Hyper Store', '2000+ sqft']] as $key => [$icon, $name, $size])
                                            <button @click="storeType = '{{ $key }}'"
                                                :class="storeType === '{{ $key }}' ?
                                                    'border-[#109125] bg-green-50 text-[#055346]' :
                                                    'border-gray-200 text-gray-600 hover:border-gray-300'"
                                                class="border-2 rounded-xl p-3 text-center transition-all duration-200 bg-transparent">
                                                <div class="text-2xl mb-1">{{ $icon }}</div>
                                                <p class="text-xs font-bold">{{ $name }}</p>
                                                <p class="text-[10px] text-gray-400">{{ $size }}</p>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Area --}}
                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label class="text-gray-700 text-xs font-bold uppercase tracking-wider">Store Area
                                            (sq ft)</label>
                                        <span class="text-sm font-bold text-[#055346]"
                                            x-text="area.toLocaleString() + ' sqft'"></span>
                                    </div>
                                    <input type="range" x-model="area" min="300" max="10000" step="100"
                                        class="w-full h-2 rounded-full appearance-none cursor-pointer accent-[#109125] bg-gray-200">
                                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                                        <span>300</span><span>5,000</span><span>10,000</span>
                                    </div>
                                </div>

                                {{-- Plan --}}
                                <div class="mb-5">
                                    <label
                                        class="text-gray-700 text-xs font-bold uppercase tracking-wider block mb-3">Working
                                        Capital Plan</label>
                                    <div class="grid grid-cols-3 gap-2">
                                        @foreach ([1 => ['Basic', '₹5L'], 2 => ['Standard', '₹7.5L'], 3 => ['Premium', '₹10L']] as $p => [$pname, $pamount])
                                            <button @click="plan = {{ $p }}"
                                                :class="plan === {{ $p }} ? 'bg-[#109125] text-white' :
                                                    'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                                class="rounded-xl py-2 text-xs font-bold transition-all duration-200">
                                                <div>{{ $pname }}</div>
                                                <div class="opacity-75">{{ $pamount }}</div>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <a href="#" onclick="openLeadPopup(); return false;"
                                    class="block w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold text-center py-3 rounded-xl transition-all duration-200 text-sm">
                                    Plan My Budget →
                                </a>
                            </div>

                            {{-- Right --}}
                            <div class="p-6 sm:p-8 bg-gray-50">
                                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider mb-1">Total
                                    Estimated Investment</p>
                                <p class="text-5xl font-extrabold text-[#ec2024] mb-1" x-text="fmt(total)"></p>
                                <p class="text-gray-400 text-xs mb-6">Based on your selected format & plan</p>

                                <div class="space-y-4">
                                    @foreach ([['Store Fitout & Setup', 'fitout', 'bg-[#109125]'], ['Initial Inventory', 'inventory', 'bg-[#055346]'], ['Franchise Fee', 'franchise', 'bg-[#ec2024]'], ['Working Capital', 'working', 'bg-[#ec2024]']] as [$label, $key, $color])
                                        <div>
                                            <div class="flex justify-between text-sm mb-1.5">
                                                <span class="text-gray-500 font-medium">{{ $label }}</span>
                                                <span class="font-bold text-gray-900"
                                                    x-text="fmt({{ $key }})"></span>
                                            </div>
                                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="{{ $color }} h-full rounded-full transition-all duration-500"
                                                    :style="`width: ${Math.round(({{ $key }} / total) * 100)}%`">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-5 grid grid-cols-2 gap-3">
                                    <div class="bg-white rounded-xl p-3 border border-gray-100 text-center">
                                        <p class="text-xs text-gray-500 mb-0.5">Monthly Rent Est.</p>
                                        <p class="font-bold text-[#055346] text-sm" x-text="fmt(baseRent)"></p>
                                    </div>
                                    <div class="bg-white rounded-xl p-3 border border-gray-100 text-center">
                                        <p class="text-xs text-gray-500 mb-0.5">Zero Royalty</p>
                                        <p class="font-bold text-[#109125] text-sm">₹0 / month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── TAB 2: Earnings Calculator ── --}}
                <div x-show="tab === 'earn'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                    <div x-data="{
                        storeSize: 2000,
                        cityTier: 1,
                        capital: 10,
                        footfall: 300,
                        get tierMultiplier() { return this.cityTier === 1 ? 1.3 : this.cityTier === 2 ? 1.1 : 0.9 },
                        get avgBill() { return this.cityTier === 1 ? 420 : this.cityTier === 2 ? 340 : 260 },
                        get dailyRevenue() { return this.footfall * this.avgBill },
                        get monthlyRevenue() { return this.dailyRevenue * 26 },
                        get margin() { return this.cityTier === 1 ? 28 : this.cityTier === 2 ? 24 : 20 },
                        get monthlyProfit() { return Math.round(this.monthlyRevenue * this.margin / 100) },
                        get breakeven() { return Math.ceil((this.capital * 100000) / this.monthlyProfit) },
                        get annualProfit() { return this.monthlyProfit * 12 },
                        get chartBars() {
                            let bars = [];
                            for (let i = 1; i <= 12; i++) {
                                bars.push(Math.round(this.monthlyProfit * (1 + (i - 1) * 0.04)));
                            }
                            return bars;
                        },
                        get maxBar() { return Math.max(...this.chartBars) },
                        fmt(n) { return (n >= 100000) ? (n / 100000).toFixed(1) + 'L' : (n >= 1000) ? (n / 1000).toFixed(0) + 'K' : n },
                        fmtFull(n) { return '₹' + Number(n).toLocaleString('en-IN') }
                    }"
                        class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-200">
                        <div class="grid grid-cols-1 lg:grid-cols-2">

                            {{-- Left --}}
                            <div class="p-6 sm:p-8 border-b lg:border-b-0 lg:border-r border-gray-100">
                                <p class="text-gray-900 font-bold text-base mb-5">Calculate Your Earnings (Not Just Costs)
                                    <span
                                        class="text-[10px] bg-[#109125] text-white px-2 py-0.5 rounded-full ml-1">LIVE</span>
                                </p>

                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label class="text-gray-700 text-xs font-bold uppercase tracking-wider">Store Size
                                            (sq ft)</label>
                                        <span class="text-[#055346] text-sm font-bold"
                                            x-text="storeSize + ' sq ft'"></span>
                                    </div>
                                    <input type="range" x-model="storeSize" min="500" max="10000"
                                        step="100"
                                        class="w-full h-2 rounded-full appearance-none cursor-pointer accent-[#109125] bg-gray-200">
                                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                                        <span>500</span><span>2,500</span><span>10,000</span>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label
                                        class="text-gray-700 text-xs font-bold uppercase tracking-wider block mb-2">City
                                        Tier</label>
                                    <div class="grid grid-cols-3 gap-2">
                                        @foreach ([1 => 'Tier 1', 2 => 'Tier 2', 3 => 'Tier 3'] as $t => $label)
                                            <button @click="cityTier = {{ $t }}"
                                                :class="cityTier === {{ $t }} ?
                                                    'bg-[#109125] text-white border-[#109125]' :
                                                    'bg-transparent text-gray-600 border-gray-200 hover:border-gray-300'"
                                                class="border rounded-xl py-2 text-sm font-semibold transition-all duration-200">
                                                {{ $label }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label class="text-gray-700 text-xs font-bold uppercase tracking-wider">Starting
                                            Capital (₹ Lakh)</label>
                                        <span class="text-[#055346] text-sm font-bold"
                                            x-text="'₹' + capital + 'L'"></span>
                                    </div>
                                    <input type="range" x-model="capital" min="5" max="50"
                                        step="1"
                                        class="w-full h-2 rounded-full appearance-none cursor-pointer accent-[#109125] bg-gray-200">
                                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                                        <span>₹5L</span><span>₹25L</span><span>₹50L</span>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label class="text-gray-700 text-xs font-bold uppercase tracking-wider">Expected
                                            Daily Footfall</label>
                                        <span class="text-[#055346] text-sm font-bold"
                                            x-text="footfall + ' customers'"></span>
                                    </div>
                                    <input type="range" x-model="footfall" min="50" max="1000"
                                        step="10"
                                        class="w-full h-2 rounded-full appearance-none cursor-pointer accent-[#109125] bg-gray-200">
                                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                                        <span>50</span><span>500</span><span>1000</span>
                                    </div>
                                </div>

                                <a href="#" onclick="openLeadPopup(); return false;"
                                    class="block w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold text-center py-3 rounded-xl transition-all duration-200 text-sm">
                                    Calculate My Earnings →
                                </a>
                            </div>

                            {{-- Right --}}
                            <div class="p-6 sm:p-8 bg-gray-50">
                                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider mb-1">Projected
                                    Monthly Revenue</p>
                                <p class="text-5xl font-extrabold text-[#ec2024] leading-none mb-1"
                                    x-text="fmtFull(monthlyRevenue)"></p>
                                <p class="text-gray-400 text-xs mb-5">Estimated based on your inputs</p>

                                <div class="grid grid-cols-3 gap-3 mb-5">
                                    <div class="bg-white rounded-xl p-3 text-center border border-gray-100">
                                        <p class="text-[#055346] text-xl font-extrabold" x-text="margin + '%'"></p>
                                        <p class="text-gray-500 text-xs mt-0.5">Margin</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-3 text-center border border-gray-100">
                                        <p class="text-[#055346] text-xl font-extrabold" x-text="breakeven + 'mo'"></p>
                                        <p class="text-gray-500 text-xs mt-0.5">Breakeven</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-3 text-center border border-gray-100">
                                        <p class="text-[#109125] text-xl font-extrabold" x-text="'₹' + fmt(annualProfit)">
                                        </p>
                                        <p class="text-gray-500 text-xs mt-0.5">Yr 1 Profit</p>
                                    </div>
                                </div>

                                <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-2">Monthly
                                    Earnings Projection</p>
                                <div class="flex items-end gap-1 h-24 bg-gray-50 rounded-xl p-2">
                                    <template x-for="(bar, i) in chartBars" :key="i">
                                        <div class="flex-1 rounded-t-sm transition-all duration-500 ease-out"
                                            :style="`height: ${Math.round((bar / maxBar) * 100)}%; background: ${i >= 9 ? '#4ade80' : i >= 6 ? '#22c55e' : i >= 3 ? '#16a34a' : '#109125'}; min-height: 3px;`">
                                        </div>
                                    </template>
                                </div>
                                <div class="flex justify-between text-xs text-gray-400 mt-1.5">
                                    <span>Month 1</span><span>Month 6</span><span>Month 12</span>
                                </div>
                                <p class="text-xs text-gray-400 mt-3 text-center">*Based on average 7x Basket partner data
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     STEPS
══════════════════════════════════════════ --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">How It Works</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">8 Steps to Your Store</h2>
                <p class="text-gray-500 max-w-xl mx-auto">From application to grand opening in as little as 60 days.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ([[1, 'Apply Online', 'Fill the franchise application form with your details and investment capacity.'], [2, 'Consultation Call', 'Our team contacts you within 24 hours for a detailed discussion about your goals.'], [3, 'Site Evaluation', 'We assess your proposed location for viability, footfall, and market potential.'], [4, 'Agreement Signing', 'Sign the franchise agreement and complete all onboarding formalities smoothly.'], [5, 'Store Design', 'Our team designs your store layout, shelving, signage, and brand standards.'], [6, 'Setup & Stocking', 'We set up the store, install POS, and stock initial inventory before launch.'], [7, 'Staff Training', 'Your team gets full training on operations, billing, and customer service.'], [8, 'Grand Opening', 'Launch your store with our marketing support and start serving customers.']] as [$num, $title, $desc])
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="w-8 h-8 rounded-full bg-green-50 border border-green-200 flex items-center justify-center mb-4 flex-shrink-0">
                            <span class="text-[#109125] text-xs font-extrabold leading-none">{{ $num }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-2">{{ $title }}</h3>
                        <p class="text-xs text-gray-500 leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
    </section>

    {{-- ══════════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════════ --}}
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
                                ['Rajesh Kumar', 'Delhi', 'Super Store', 'Joining 7x Basket was the best business decision I made. Turned profitable in 8 months. The support team is always available.'],
                                ['Priya Sharma', 'Mumbai', 'Mini Store', 'The supply chain is excellent. Fresh products daily and margins are much better than running an independent store.'],
                                ['Amit Patel', 'Ahmedabad', 'Hyper Store', 'From training to launch, everything was smooth. The technology platform makes inventory management effortless.'],
                                ['Sunita Verma', 'Jaipur', 'Super Store', 'Zero royalty model is a game changer. I keep all my profits and the brand name brings customers in without extra marketing.'],
                                ['Kiran Reddy', 'Hyderabad', 'Mini Store', 'The dedicated relationship manager helped me through every step. My store broke even in just 6 months.'],
                                ['Manoj Singh', 'Lucknow', 'Super Store', 'I was skeptical at first but the 45-day launch timeline is real. My store was up and running exactly on schedule.'],
                                ['Deepa Nair', 'Kochi', 'Hyper Store', 'The POS system and inventory app are incredibly easy to use. Customer loyalty program keeps them coming back.'],
                                ['Vikram Joshi', 'Pune', 'Mini Store', 'Best investment I have made. The brand recognition alone drives footfall. 7x Basket is trusted before they walk in.'],
                                ['Anita Gupta', 'Chandigarh', 'Super Store', 'National marketing campaigns save me so much time and money. I just focus on running the store and customers keep coming.'],
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

    {{-- ══════════════════════════════════════════
     SERVICES — What We Handle For You
══════════════════════════════════════════ --}}
    <section class="py-16 bg-white relative overflow-hidden">
        <div class="blob w-[500px] h-[500px] bg-[#109125]/5 top-[-100px] right-[-150px]"></div>
        <div class="blob w-80 h-80 bg-[#ec2024]/5 bottom-[-80px] left-[-80px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Done For You</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">Everything We Handle For You</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">You focus on serving customers. We take care of everything else
                    — from setup to daily operations.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([
            ['🏗️', 'Interior Design & Setup', 'Complete store design, shelving, signage, and branding done by our expert team.', '✔ Ready-to-operate store in 45 days', ''],
            ['📦', 'Product Procurement', 'Access to 10,000+ SKUs sourced directly from top FMCG brands at wholesale prices.', '✔ Daily fresh delivery to your store', ''],
            ['🖥️', 'POS Software + Training', 'Cloud-based billing, inventory tracking, and analytics — fully set up and staff-trained.', '✔ Zero tech knowledge required', ''],
            ['👥', 'Staff Hiring & Training', 'We help recruit, screen, and train your store staff to brand standards.', '✔ Trained team before opening day', ''],
            ['📋', 'Legal Documentation', 'Franchise agreement, FSSAI, GST registration, and all compliance paperwork handled.', '✔ 100% legally compliant from day one', ''],
            ['💰', 'Zero Royalty — Year 1', 'No royalty fees in your first year. Keep 100% of your profits while you grow.', '✔ Maximum earnings from month one', 'highlight'],
            ['📣', 'Marketing & Branding', 'National campaigns, social media, local promotions, and in-store branding all managed.', '✔ Customers walk in before you advertise', ''],
            ['⏱️', 'Expiry Management System', 'Automated alerts and processes to track product expiry and reduce wastage.', '✔ Reduce losses, improve margins', ''],
            ['🛟', '24/7 Backend Support', 'Round-the-clock support for operations, tech issues, supply chain, and escalations.', '✔ Never face a problem alone', ''],
        ] as [$icon, $title, $desc, $benefit, $type])
                    <div class="relative {{ $type === 'highlight' ? 'bg-red-50 border-red-200 hover:bg-red-50/80' : 'bg-white border-gray-200 hover:border-[#109125]/40 hover:shadow-md' }} border rounded-2xl p-5 flex flex-col transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        @if ($type === 'highlight')
                            <span
                                class="absolute -top-3 left-4 bg-[#ec2024] text-white text-[10px] font-bold px-3 py-1 rounded-full">Year
                                1 Offer</span>
                        @endif
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-10 h-10 {{ $type === 'highlight' ? 'bg-red-100' : 'bg-green-50' }} rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                                {{ $icon }}
                            </div>
                            <p class="font-bold text-gray-900 text-sm leading-tight">{{ $title }}</p>
                        </div>
                        <p class="text-gray-500 text-xs leading-relaxed mb-3 flex-1">{{ $desc }}</p>
                        <p
                            class="text-xs font-semibold {{ $type === 'highlight' ? 'text-[#ec2024]' : 'text-[#109125]' }}">
                            {{ $benefit }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     BRANDS — 10,000+ Products
══════════════════════════════════════════ --}}
    <section class="bg-white border-t border-b border-gray-200 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-10">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Our Product Range</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">10,000+ Products from India's Top
                    Brands</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Every category your customers need — all under one roof, sourced
                    directly from manufacturers.</p>
            </div>

            <div class="flex flex-wrap justify-center gap-2 mb-10" data-aos="fade-up">
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
    </section>

    {{-- ══════════════════════════════════════════
     GALLERY + VIDEO
══════════════════════════════════════════ --}}
    <section class="py-16 bg-gray-50 relative overflow-hidden" x-data="{
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
        openLightbox(i) { this.lightboxIndex = i;
            this.lightbox = true },
        prevImage() { this.lightboxIndex = (this.lightboxIndex - 1 + this.images.length) % this.images.length },
        nextImage() { this.lightboxIndex = (this.lightboxIndex + 1) % this.images.length },
        openVideo(src) { this.videoSrc = src;
            this.videoModal = true },
        closeVideo() { this.videoModal = false;
            this.videoSrc = '' }
    }"
        @keydown.escape.window="lightbox = false; closeVideo()" @keydown.arrow-left.window="if(lightbox) prevImage()"
        @keydown.arrow-right.window="if(lightbox) nextImage()">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ── Image Slider ── --}}
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Inside 7x Basket</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">Our Stores & Stories</h2>
                <p class="text-gray-500 max-w-xl mx-auto">A look inside our franchise stores across India.</p>
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

            {{-- ── Have Doubts? Videos ── --}}
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-1">Have Doubts? These Videos Will Help!</h2>
                <p class="text-gray-500 text-sm">Watch real stories and expert insights about 7x Basket franchise.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-16">
                @foreach ([['custom/7x_Basket_Store.png', 'How to Start a 7x Basket Franchise', 'Investment & ROI Explained', 'Expert Guide', ''], ['custom/7x_Basket_Store.png', 'Franchise Offer — Start Your Supermarket', '₹5L Investment, High Returns', 'Business Overview', ''], ['custom/7x_Basket_Store.png', 'Supermarket Grocery Store Business', 'Full Setup Guide for Beginners', 'Step-by-Step', '']] as [$img, $title, $subtitle, $tag, $ytId])
                    <div class="relative rounded-2xl overflow-hidden cursor-pointer group aspect-video shadow-sm border border-gray-200"
                        @click="openVideo('https://www.youtube.com/embed/{{ $ytId }}')" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 80 }}">
                        <img src="{{ asset($img) }}" alt="{{ $title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-[#1a5c38]/80 to-black/70 group-hover:from-[#1a5c38]/90 transition-all duration-300">
                        </div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="bg-[#ec2024] text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wide">{{ $tag }}</span>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-14 h-14 bg-[#ec2024] rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:bg-white transition-all duration-300">
                                <svg class="w-6 h-6 text-[#1a5c38] ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <p class="text-white font-bold text-sm leading-tight mb-0.5">{{ $title }}</p>
                            <p class="text-[#ec2024] text-xs font-medium">{{ $subtitle }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ── What Our Franchise Partner Says ── --}}
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-1">What Our Franchise Partner Says</h2>
                <p class="text-gray-500 text-sm">Hear directly from our franchise owners across India.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ([['custom/7x_Basket_Store.png', 'Rajesh Kumar', 'Delhi', 'Super Store Owner', '"Turned profitable in 8 months. Best decision of my life."'], ['custom/7x_Basket_Store.png', 'Priya Sharma', 'Mumbai', 'Mini Store Owner', '"Fresh products daily. Margins far better than independent stores."'], ['custom/7x_Basket_Store.png', 'Amit Patel', 'Ahmedabad', 'Hyper Store Owner', '"From training to launch — everything was smooth and on time."']] as [$img, $name, $city, $role, $quote])
                    <div class="relative rounded-2xl overflow-hidden cursor-pointer group aspect-video shadow-sm border border-gray-200"
                        @click="openVideo('https://www.youtube.com/embed/')" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 80 }}">
                        <img src="{{ asset($img) }}" alt="{{ $name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-[#1a5c38]/85 to-black/75 group-hover:from-[#1a5c38]/90 transition-all duration-300">
                        </div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="bg-[#ec2024] text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wide">Partner
                                Story</span>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-14 h-14 bg-white/20 border-2 border-white/60 rounded-full flex items-center justify-center shadow-2xl group-hover:bg-[#ec2024] group-hover:border-[#ec2024] transition-all duration-300">
                                <svg class="w-6 h-6 text-white ml-1 group-hover:text-[#1a5c38]" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <p class="text-[#ec2024] text-xs font-medium italic mb-1.5">{{ $quote }}</p>
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-7 h-7 bg-[#1a5c38] border-2 border-[#ec2024] rounded-full flex items-center justify-center text-white text-xs font-extrabold flex-shrink-0">
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

        {{-- Image Lightbox --}}
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

        {{-- Video Modal --}}
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

    {{-- ══════════════════════════════════════════
     FAQ
══════════════════════════════════════════ --}}
    <section class="py-16 bg-gray-50">
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
                        :class="open === {{ $loop->index }} ? 'border-gray-200 shadow-md' : 'border-gray-200 shadow-sm'"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">

                        <div class="flex">

                            <div class="w-1 flex-shrink-0 rounded-l-xl transition-all duration-300"
                                :class="open === {{ $loop->index }} ? 'bg-[#ec2024]' : 'bg-transparent'"></div>

                            <div class="flex-1">

                                <button
                                    @click="open === {{ $loop->index }} ? open = null : open = {{ $loop->index }}"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left">

                                    <span class="font-semibold text-gray-800 text-sm pr-4 leading-snug">
                                        {{ $q }}
                                    </span>

                                    <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center transition-all duration-300"
                                        :class="open === {{ $loop->index }} ? 'bg-[#1a5c38]' : 'bg-gray-100'">

                                        <svg :class="open === {{ $loop->index }} ? 'rotate-180 text-white' : 'text-[#1a5c38]'"
                                            class="w-4 h-4 transition-all duration-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </button>

                                <div x-show="open === {{ $loop->index }}"
                                    x-transition:enter="transition ease-out duration-250"
                                    x-transition:enter-start="opacity-0 -translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-1" class="px-5 pb-5">

                                    <p class="text-sm text-gray-500 leading-relaxed border-t border-gray-100 pt-3">
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

    {{-- ══════════════════════════════════════════
     BLOG PREVIEW
══════════════════════════════════════════ --}}
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
                            @if ($blog->featured_image)
                                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}"
                                    class="w-full h-44 object-cover" loading="lazy">
                            @else
                                <div
                                    class="w-full h-44 bg-gradient-to-br from-[#055346] to-[#076b58] flex items-center justify-center">
                                    <span class="text-4xl">🛒</span>
                                </div>
                            @endif
                            <div class="p-5">
                                @if ($blog->category)
                                    <span
                                        class="text-xs font-bold text-[#109125] bg-green-50 px-2.5 py-1 rounded-full">{{ $blog->category }}</span>
                                @endif
                                <h3 class="font-bold text-gray-900 mt-2 mb-2 line-clamp-2 leading-snug text-sm">
                                    {{ $blog->title }}</h3>
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

    {{-- AOS Init --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 60
        });
    </script>
@endsection



