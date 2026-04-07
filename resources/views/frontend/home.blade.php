@extends('layouts.app')
@section('content')
    {{-- ══════════════════════════════════════════
     HERO
══════════════════════════════════════════ --}}
    <section
        class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] min-h-screen flex items-center"
        style="max-width:100vw">
        {{-- blobs --}}
        <div class="blob w-96 h-96 bg-[#109125] top-[-80px] left-[-80px]"></div>
        <div class="blob w-72 h-72 bg-[#ec2024] bottom-[-60px] right-[10%]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div data-aos="fade-right" data-aos-duration="800">
                    <span
                        class="inline-flex items-center gap-2 bg-white/10 text-white text-xs font-semibold px-4 py-1.5 rounded-full mb-6 backdrop-blur-sm border border-white/20">
                        <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
                        India's Fastest Growing Grocery Franchise
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                        Own a <span class="text-[#4ade80]">7x Basket</span><br>Grocery Store
                    </h1>
                    <p class="text-green-100 text-lg leading-relaxed mb-8 max-w-lg">
                        Join 500+ successful franchise partners. Low investment, high returns, zero royalty, and complete
                        business support from day one.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-10">
                        <a href="{{ route('apply') }}"
                            class="btn-primary text-white font-bold px-8 py-4 rounded-xl text-base shadow-xl">
                            Apply Now →
                        </a>
                        <a href="#calculator"
                            class="btn-outline bg-transparent font-bold px-8 py-4 rounded-xl text-base text-white border-white/50 hover:bg-white hover:text-[#055346]">
                            Calculate Returns
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-8">
                        @foreach ([['500+', 'Partners'], ['₹5L', 'Min. Investment'], ['30%', 'Avg. ROI'], ['0', 'Royalty Fee']] as [$n, $l])
                            <div>
                                <p class="text-3xl font-extrabold text-white">{{ $n }}</p>
                                <p class="text-green-200 text-sm">{{ $l }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200" class="relative hidden lg:block">
                    <div class="relative bg-white/10 backdrop-blur-sm rounded-3xl p-6 border border-white/20">
                        <div
                            class="bg-gradient-to-br from-[#109125] to-[#055346] rounded-2xl h-72 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="text-7xl mb-4">🛒</div>
                                <p class="text-2xl font-bold">7x Basket Store</p>
                                <p class="text-green-200 text-sm mt-1">Your Franchise, Your Future</p>
                            </div>
                        </div>
                        {{-- floating badges --}}
                        <div
                            class="absolute -top-4 -right-4 bg-[#ec2024] text-white text-xs font-bold px-3 py-2 rounded-xl shadow-lg">
                            Zero Royalty!
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 bg-white text-[#055346] text-xs font-bold px-3 py-2 rounded-xl shadow-lg">
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
                    <div class="card-hover glow-green bg-white rounded-2xl p-6 border border-gray-100 shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="text-3xl mb-3">{{ $icon }}</div>
                        <p class="text-sm font-semibold text-[#ec2024] mb-2 line-through opacity-70">{{ $problem }}</p>
                        <p class="text-sm font-semibold text-[#109125]">{{ $solution }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     WHY CHOOSE US
══════════════════════════════════════════ --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div data-aos="fade-right">
                    <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Why 7x Basket</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-5">Built for Your Success</h2>
                    <p class="text-gray-500 leading-relaxed mb-8">We don't just give you a franchise — we give you a
                        complete business ecosystem with everything you need to thrive from day one.</p>
                    <div class="space-y-4">
                        @foreach (['Exclusive territory rights — no competition from us', 'Access to 5000+ SKUs at wholesale prices', 'Dedicated relationship manager for your store', 'Monthly performance reviews & growth planning', 'Digital marketing & social media handled for you', 'Customer loyalty program built-in'] as $item)
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-5 h-5 bg-[#109125] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
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
                    <a href="{{ route('apply') }}"
                        class="btn-primary inline-block mt-8 text-white font-bold px-8 py-3.5 rounded-xl">
                        Start Your Journey →
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-4" data-aos="fade-left">
                    @foreach ([['🏪', 'Proven Model', 'Tested across 500+ stores'], ['📱', 'Tech Platform', 'POS + App included'], ['🚚', 'Supply Chain', 'Daily fresh delivery'], ['💰', 'Zero Royalty', 'Keep all your profits']] as [$icon, $title, $desc])
                        <div class="card-hover bg-gradient-to-br from-[#055346] to-[#076b58] rounded-2xl p-6 text-white"
                            data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="text-3xl mb-3">{{ $icon }}</div>
                            <p class="font-bold text-base mb-1">{{ $title }}</p>
                            <p class="text-green-200 text-xs">{{ $desc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     STORE PLANS
══════════════════════════════════════════ --}}
    <section class="py-12 bg-gray-50" id="plans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Store Plans</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">Choose Your Store Format</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Three formats to match your investment capacity and market size.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([['Mini Store', '₹5–8 Lakhs', '300–500 sq ft', 'Basic', 'bg-white', 'border-gray-200', 'text-[#055346]', false, ['500+ SKUs', 'POS System', 'Basic Training', 'Local Support']], ['Super Store', '₹10–15 Lakhs', '800–1200 sq ft', 'Popular', 'bg-[#055346]', 'border-[#055346]', 'text-white', true, ['2000+ SKUs', 'Full Tech Stack', 'Advanced Training', 'Dedicated Manager', 'Marketing Support']], ['Hyper Store', '₹20–30 Lakhs', '2000+ sq ft', 'Premium', 'bg-white', 'border-gray-200', 'text-[#055346]', false, ['5000+ SKUs', 'Enterprise Tech', 'Full Team Training', 'Priority Support', 'National Campaigns', 'Loyalty Program']]] as [$name, $price, $size, $badge, $bg, $border, $text, $featured, $features])
                    <div class="card-hover glow-green rounded-2xl border-2 {{ $border }} {{ $bg }} p-6 relative {{ $featured ? 'scale-105 shadow-2xl' : 'shadow-sm' }}"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        @if ($featured)
                            <div
                                class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#ec2024] text-white text-xs font-bold px-4 py-1.5 rounded-full">
                                Most Popular
                            </div>
                        @endif
                        <p
                            class="text-xs font-bold uppercase tracking-widest {{ $featured ? 'text-green-300' : 'text-[#109125]' }} mb-2">
                            {{ $badge }}</p>
                        <h3 class="text-2xl font-extrabold {{ $text }} mb-1">{{ $name }}</h3>
                        <p class="text-3xl font-extrabold {{ $text }} mb-1">{{ $price }}</p>
                        <p class="text-sm {{ $featured ? 'text-green-200' : 'text-gray-400' }} mb-6">{{ $size }}
                            store area</p>
                        <ul class="space-y-3 mb-8">
                            @foreach ($features as $f)
                                <li
                                    class="flex items-center gap-2 text-sm {{ $featured ? 'text-green-100' : 'text-gray-600' }}">
                                    <svg class="w-4 h-4 {{ $featured ? 'text-[#4ade80]' : 'text-[#109125]' }} flex-shrink-0"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $f }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('apply') }}"
                            class="{{ $featured ? 'bg-white text-[#055346] hover:bg-green-50' : 'btn-primary text-white' }} block text-center font-bold py-3 rounded-xl transition-all">
                            Apply for {{ $name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     DUAL CALCULATOR
══════════════════════════════════════════ --}}
    <section class="py-12 bg-[#081510]" id="calculator">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#4ade80] text-sm font-bold uppercase tracking-widest">Smart Calculator</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#c8e8d8] mt-2 mb-3">Plan Your Franchise Investment
                </h2>
                <p class="text-[#4b7060] max-w-xl mx-auto">Calculate startup costs and projected earnings — all in one
                    place.</p>
            </div>

            <div x-data="{ tab: 'cost' }" data-aos="fade-up" data-aos-delay="100">

                {{-- Tab switcher --}}
                <div class="flex justify-center mb-6">
                    <div class="inline-flex bg-[#1a2e27] rounded-2xl p-1 gap-1">
                        <button @click="tab = 'cost'"
                            :class="tab === 'cost' ? 'bg-[#0f1f1a] text-[#4ade80] shadow-sm' :
                                'text-[#6b8f7e] hover:text-[#4ade80]'"
                            class="px-6 py-2.5 rounded-xl text-sm font-bold transition-all duration-200">
                            💰 Startup Costs
                        </button>
                        <button @click="tab = 'earn'"
                            :class="tab === 'earn' ? 'bg-[#0f1f1a] text-[#4ade80] shadow-sm' :
                                'text-[#6b8f7e] hover:text-[#4ade80]'"
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
                        class="bg-[#0f1f1a] border border-white/[0.08] rounded-3xl shadow-2xl overflow-hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2">

                            {{-- Left --}}
                            <div class="p-6 sm:p-8 border-b lg:border-b-0 lg:border-r border-white/[0.08]">
                                <p class="text-[#c8e8d8] font-bold text-base mb-5">Calculate Your Supermarket Franchise
                                    Startup Costs</p>

                                {{-- Store Type --}}
                                <div class="mb-5">
                                    <label
                                        class="text-xs font-semibold text-[#4b7060] uppercase tracking-wider block mb-3">Supermarket
                                        Format</label>
                                    <div class="grid grid-cols-3 gap-3">
                                        @foreach (['mini' => ['🏪', 'Mini Store', '300–500 sqft'], 'super' => ['🏬', 'Super Store', '800–1200 sqft'], 'hyper' => ['🏢', 'Hyper Store', '2000+ sqft']] as $key => [$icon, $name, $size])
                                            <button @click="storeType = '{{ $key }}'"
                                                :class="storeType === '{{ $key }}' ?
                                                    'border-[#109125] bg-[#109125]/10 text-[#4ade80]' :
                                                    'border-white/10 text-[#6b8f7e] hover:border-white/20'"
                                                class="border-2 rounded-xl p-3 text-center transition-all duration-200 bg-transparent">
                                                <div class="text-2xl mb-1">{{ $icon }}</div>
                                                <p class="text-xs font-bold">{{ $name }}</p>
                                                <p class="text-[10px] text-[#4b7060]">{{ $size }}</p>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Area --}}
                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label class="text-xs font-semibold text-[#4b7060] uppercase tracking-wider">Store
                                            Area (sq ft)</label>
                                        <span class="text-sm font-bold text-[#4ade80]"
                                            x-text="area.toLocaleString() + ' sqft'"></span>
                                    </div>
                                    <input type="range" x-model="area" min="300" max="10000" step="100"
                                        class="w-full h-1.5 rounded-full appearance-none cursor-pointer accent-[#109125] bg-white/10">
                                    <div class="flex justify-between text-xs text-[#2e4d3d] mt-1">
                                        <span>300</span><span>5,000</span><span>10,000</span></div>
                                </div>

                                {{-- Plan --}}
                                <div class="mb-5">
                                    <label
                                        class="text-xs font-semibold text-[#4b7060] uppercase tracking-wider block mb-3">Working
                                        Capital Plan</label>
                                    <div class="grid grid-cols-3 gap-2">
                                        @foreach ([1 => ['Basic', '₹5L'], 2 => ['Standard', '₹7.5L'], 3 => ['Premium', '₹10L']] as $p => [$pname, $pamount])
                                            <button @click="plan = {{ $p }}"
                                                :class="plan === {{ $p }} ? 'bg-[#055346] text-[#4ade80]' :
                                                    'bg-white/5 text-[#6b8f7e] hover:bg-white/10'"
                                                class="rounded-xl py-2 text-xs font-bold transition-all duration-200">
                                                <div>{{ $pname }}</div>
                                                <div class="opacity-75">{{ $pamount }}</div>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <a href="{{ route('apply') }}"
                                    class="block w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold text-center py-3 rounded-xl transition-all duration-200 text-sm">
                                    Plan My Budget →
                                </a>
                            </div>

                            {{-- Right --}}
                            <div class="p-6 sm:p-8 bg-[#081510]">
                                <p class="text-[#4b7060] text-xs font-semibold uppercase tracking-wider mb-1">Total
                                    Estimated Investment</p>
                                <p class="text-4xl font-extrabold text-[#4ade80] mb-6" x-text="fmt(total)"></p>

                                <div class="space-y-3">
                                    @foreach ([['Store Fitout & Setup', 'fitout', 'bg-[#109125]'], ['Initial Inventory', 'inventory', 'bg-[#055346]'], ['Franchise Fee', 'franchise', 'bg-[#ec2024]'], ['Working Capital', 'working', 'bg-[#4b7060]']] as [$label, $key, $color])
                                        <div>
                                            <div class="flex justify-between text-sm mb-1">
                                                <span class="text-[#6b8f7e]">{{ $label }}</span>
                                                <span class="font-bold text-[#c8e8d8]"
                                                    x-text="fmt({{ $key }})"></span>
                                            </div>
                                            <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                                <div class="{{ $color }} h-full rounded-full transition-all duration-500"
                                                    :style="`width: ${Math.round(({{ $key }} / total) * 100)}%`">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-5 grid grid-cols-2 gap-3">
                                    <div class="bg-white/[0.04] rounded-xl p-3 border border-white/[0.07] text-center">
                                        <p class="text-xs text-[#4b7060] mb-0.5">Monthly Rent Est.</p>
                                        <p class="font-bold text-[#4ade80] text-sm" x-text="fmt(baseRent)"></p>
                                    </div>
                                    <div class="bg-white/[0.04] rounded-xl p-3 border border-white/[0.07] text-center">
                                        <p class="text-xs text-[#4b7060] mb-0.5">Zero Royalty</p>
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
                        class="bg-[#0f1f1a] rounded-3xl overflow-hidden shadow-2xl border border-white/[0.08]">
                        <div class="grid grid-cols-1 lg:grid-cols-2">

                            {{-- Left --}}
                            <div class="p-6 sm:p-8 border-b lg:border-b-0 lg:border-r border-white/10">
                                <p class="text-white font-bold text-base mb-5">Calculate Your Earnings (Not Just Costs)
                                    <span
                                        class="text-[10px] bg-[#109125] text-white px-2 py-0.5 rounded-full ml-1">LIVE</span>
                                </p>

                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label class="text-[#4b7060] text-xs font-semibold uppercase tracking-wider">Store
                                            Size (sq ft)</label>
                                        <span class="text-[#4ade80] text-sm font-bold"
                                            x-text="storeSize + ' sq ft'"></span>
                                    </div>
                                    <input type="range" x-model="storeSize" min="500" max="10000"
                                        step="100"
                                        class="w-full h-1.5 rounded-full appearance-none cursor-pointer accent-[#109125] bg-white/10">
                                    <div class="flex justify-between text-xs text-[#2e4d3d] mt-1">
                                        <span>500</span><span>2,500</span><span>10,000</span></div>
                                </div>

                                <div class="mb-5">
                                    <label
                                        class="text-[#4b7060] text-xs font-semibold uppercase tracking-wider block mb-2">City
                                        Tier</label>
                                    <div class="grid grid-cols-3 gap-2">
                                        @foreach ([1 => 'Tier 1', 2 => 'Tier 2', 3 => 'Tier 3'] as $t => $label)
                                            <button @click="cityTier = {{ $t }}"
                                                :class="cityTier === {{ $t }} ?
                                                    'bg-[#109125] text-white border-[#109125]' :
                                                    'bg-transparent text-[#6b8f7e] border-white/20 hover:border-white/40'"
                                                class="border rounded-xl py-2 text-sm font-semibold transition-all duration-200">
                                                {{ $label }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label
                                            class="text-[#4b7060] text-xs font-semibold uppercase tracking-wider">Starting
                                            Capital (₹ Lakh)</label>
                                        <span class="text-[#4ade80] text-sm font-bold"
                                            x-text="'₹' + capital + 'L'"></span>
                                    </div>
                                    <input type="range" x-model="capital" min="5" max="50"
                                        step="1"
                                        class="w-full h-1.5 rounded-full appearance-none cursor-pointer accent-[#109125] bg-white/10">
                                    <div class="flex justify-between text-xs text-[#2e4d3d] mt-1">
                                        <span>₹5L</span><span>₹25L</span><span>₹50L</span></div>
                                </div>

                                <div class="mb-5">
                                    <div class="flex justify-between mb-2">
                                        <label
                                            class="text-[#4b7060] text-xs font-semibold uppercase tracking-wider">Expected
                                            Daily Footfall</label>
                                        <span class="text-[#4ade80] text-sm font-bold"
                                            x-text="footfall + ' customers'"></span>
                                    </div>
                                    <input type="range" x-model="footfall" min="50" max="1000"
                                        step="10"
                                        class="w-full h-1.5 rounded-full appearance-none cursor-pointer accent-[#109125] bg-white/10">
                                    <div class="flex justify-between text-xs text-[#2e4d3d] mt-1">
                                        <span>50</span><span>500</span><span>1000</span></div>
                                </div>

                                <a href="{{ route('apply') }}"
                                    class="block w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-bold text-center py-3 rounded-xl transition-all duration-200 text-sm">
                                    Calculate My Earnings →
                                </a>
                            </div>

                            {{-- Right --}}
                            <div class="p-6 sm:p-8 bg-[#081510]">
                                <p class="text-[#4b7060] text-xs font-semibold uppercase tracking-wider mb-1">Projected
                                    Monthly Revenue</p>
                                <p class="text-4xl sm:text-5xl font-extrabold text-[#4ade80] leading-none mb-5"
                                    x-text="fmtFull(monthlyRevenue)"></p>

                                <div class="grid grid-cols-3 gap-3 mb-5">
                                    <div class="bg-white/5 rounded-xl p-3 text-center">
                                        <p class="text-[#4ade80] text-xl font-extrabold" x-text="margin + '%'"></p>
                                        <p class="text-[#4b7060] text-xs mt-0.5">Margin</p>
                                    </div>
                                    <div class="bg-white/5 rounded-xl p-3 text-center">
                                        <p class="text-[#4ade80] text-xl font-extrabold" x-text="breakeven + 'mo'"></p>
                                        <p class="text-[#4b7060] text-xs mt-0.5">Breakeven</p>
                                    </div>
                                    <div class="bg-white/5 rounded-xl p-3 text-center">
                                        <p class="text-[#4ade80] text-xl font-extrabold" x-text="'₹' + fmt(annualProfit)">
                                        </p>
                                        <p class="text-[#4b7060] text-xs mt-0.5">Yr 1 Profit</p>
                                    </div>
                                </div>

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
                                <p class="text-xs text-[#2e4d3d] mt-3 text-center">*Based on average 7x Basket partner data
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
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">How It Works</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">6 Steps to Your Store</h2>
                <p class="text-gray-500 max-w-xl mx-auto">From application to grand opening in as little as 60 days.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([['01', '📝', 'Apply Online', 'Fill the franchise application form with your details and investment capacity.'], ['02', '📞', 'Consultation Call', 'Our team contacts you within 24 hours for a detailed discussion.'], ['03', '📍', 'Site Evaluation', 'We assess your proposed location for viability and footfall.'], ['04', '📄', 'Agreement Signing', 'Sign the franchise agreement and complete onboarding formalities.'], ['05', '🏗️', 'Store Setup', 'We help design and set up your store with our brand standards.'], ['06', '🚀', 'Grand Opening', 'Launch your store with our marketing support and start serving customers.']] as [$step, $icon, $title, $desc])
                    <div class="card-hover bg-white rounded-2xl p-6 border border-gray-100 shadow-sm relative"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="text-6xl font-extrabold text-gray-100 absolute top-4 right-5 leading-none select-none">
                            {{ $step }}</div>
                        <div class="text-3xl mb-3">{{ $icon }}</div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ $title }}</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════════ --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">Success Stories</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">What Our Partners Say</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([['Rajesh Kumar', 'Delhi', 'Super Store', 'Joining 7x Basket was the best business decision I made. Turned profitable in 8 months. The support team is always available.', '⭐⭐⭐⭐⭐'], ['Priya Sharma', 'Mumbai', 'Mini Store', 'The supply chain is excellent. Fresh products daily and margins are much better than running an independent store.', '⭐⭐⭐⭐⭐'], ['Amit Patel', 'Ahmedabad', 'Hyper Store', 'From training to launch, everything was smooth. The technology platform makes inventory management effortless.', '⭐⭐⭐⭐⭐']] as [$name, $city, $plan, $quote, $stars])
                    <div class="card-hover bg-gray-50 rounded-2xl p-5 border border-gray-100" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="text-lg mb-4">{{ $stars }}</div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">"{{ $quote }}"</p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-[#055346] rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                {{ substr($name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">{{ $name }}</p>
                                <p class="text-xs text-gray-400">{{ $plan }} · {{ $city }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     SERVICES
══════════════════════════════════════════ --}}
    <section class="py-12 bg-[#055346]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-green-300 text-sm font-bold uppercase tracking-widest">What We Offer</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2 mb-3">Complete Store Services</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ([['🛒', 'Grocery Retail', ''], ['🥦', 'Fresh Produce', ''], ['🥛', 'Dairy & Beverages', ''], ['🧴', 'Personal Care', ''], ['🏠', 'Home Essentials', ''], ['🍿', 'Snacks & Packaged', ''], ['🌾', 'Organic Products', ''], ['💰', 'Zero Royalty', 'highlight']] as [$icon, $name, $type])
                    <div class="card-hover {{ $type === 'highlight' ? 'bg-[#ec2024] border-[#ec2024]' : 'bg-white/10 border-white/10' }} rounded-2xl p-5 text-center border backdrop-blur-sm"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                        <div class="text-3xl mb-2">{{ $icon }}</div>
                        <p class="text-sm font-semibold text-white">{{ $name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     BRANDS STRIP
══════════════════════════════════════════ --}}
    <section class="py-8 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 text-center" data-aos="fade-up">
            <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Brands Available In Our Stores</p>
        </div>
        <div class="relative">
            <div class="flex gap-8 logo-strip whitespace-nowrap">
                @foreach (['Amul', 'Nestlé', 'Britannia', 'Parle', 'ITC', 'HUL', 'Dabur', 'Marico', 'Godrej', 'Patanjali', 'Amul', 'Nestlé', 'Britannia', 'Parle', 'ITC', 'HUL', 'Dabur', 'Marico', 'Godrej', 'Patanjali'] as $brand)
                    <div
                        class="inline-flex items-center justify-center bg-gray-50 rounded-xl px-8 py-4 border border-gray-100 flex-shrink-0">
                        <span class="text-gray-500 font-bold text-sm">{{ $brand }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
     FAQ
══════════════════════════════════════════ --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8" data-aos="fade-up">
                <span class="text-[#109125] text-sm font-bold uppercase tracking-widest">FAQ</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 mb-3">Frequently Asked Questions</h2>
            </div>
            <div class="space-y-3" x-data="{ open: null }">
                @foreach ([
            ['What is the minimum investment required?', 'The minimum investment for a 7x Basket Mini Store starts at ₹5 Lakhs, which includes franchise fee, store setup, and initial inventory.'],
            ['Is there any royalty fee?', 'No. 7x Basket charges zero royalty. You keep 100% of your profits. We earn through the supply chain, not from your revenue.'],
            ['How long does it take to open a store?', 'From application to grand opening typically takes 45–60 days, depending on location readiness and agreement completion.'],
            ['Do I need prior retail experience?', 'No prior experience is required. We provide comprehensive training covering operations, inventory, customer service, and technology.'],
            ['What support do I get after opening?', 'You get a dedicated relationship manager, monthly performance reviews, marketing support, supply chain management, and 24/7 technical support.'],
            ['Can I open multiple stores?', 'Yes. Many of our partners operate 2–5 stores. Multi-store partners get additional discounts and priority support.'],
        ] as [$q, $a])
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 60 }}">
                        <button @click="open === {{ $loop->index }} ? open = null : open = {{ $loop->index }}"
                            class="w-full flex items-center justify-between px-6 py-4 text-left">
                            <span class="font-semibold text-gray-900 text-sm pr-4">{{ $q }}</span>
                            <svg :class="open === {{ $loop->index }} ? 'rotate-180 text-[#055346]' : 'text-gray-400'"
                                class="w-5 h-5 flex-shrink-0 transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open === {{ $loop->index }}" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="px-6 pb-5">
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $a }}</p>
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
                                <h3 class="font-bold text-gray-900 mt-2 mb-2 line-clamp-2 leading-snug">
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

    {{-- ══════════════════════════════════════════
     CTA BANNER
══════════════════════════════════════════ --}}
    <section class="py-12 bg-gradient-to-r from-[#055346] to-[#076b58] relative overflow-hidden">
        <div class="blob w-96 h-96 bg-[#109125] -top-20 -right-20"></div>
        <div class="blob w-64 h-64 bg-[#ec2024] -bottom-10 left-10"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10" data-aos="fade-up">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4">
                Ready to Own Your Store?
            </h2>
            <p class="text-green-100 text-lg mb-8 max-w-2xl mx-auto">
                Join 500+ successful franchise partners. Apply today and our team will reach out within 24 hours.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('apply') }}"
                    class="bg-[#ec2024] text-white font-bold px-10 py-4 rounded-xl hover:bg-red-600 transition-all shadow-xl text-lg hover:-translate-y-1">
                    Apply for Franchise Now
                </a>
                <a href="{{ route('calculator') }}"
                    class="bg-white/10 backdrop-blur-sm text-white font-bold px-10 py-4 rounded-xl border border-white/30 hover:bg-white/20 transition-all text-lg">
                    Calculate Returns
                </a>
            </div>
        </div>
    </section>

    {{-- AOS Init --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 60
        });
    </script>
@endsection
