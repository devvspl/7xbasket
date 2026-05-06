@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] py-10 text-center">
    <div class="absolute blob w-72 h-72 bg-[#109125]/20 top-[-60px] left-[-60px]"></div>
    <div class="absolute blob w-56 h-56 bg-[#ec2024]/10 bottom-[-40px] right-[5%]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-flex items-center gap-2 bg-white/10 text-green-200 text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-white/20">
            <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
            Plan Your Investment
        </span>
        <h1 class="text-4xl font-extrabold text-white mb-3">Investment Calculator</h1>
        <p class="text-green-100/80">Estimate your potential returns from a 7x Basket franchise</p>
        <nav class="text-sm flex items-center gap-1 flex-wrap justify-center mt-4">
            <a href="{{ route('home') }}" class="text-green-300 hover:text-white transition-colors">Home</a>
            <span class="text-white/30">/</span>
            <span class="text-white font-medium">Investment Calculator</span>
        </nav>
    </div>
</section>

<section class="py-14 bg-gray-50">
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
                                    @foreach ([1 => ['Basic', '₹5L'], 2 => ['Standard', '₹7.5L'], 3 => ['Premium', '₹13L']] as $p => [$pname, $pamount])
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

                            <a href="{{ route('apply') }}"
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

                            <a href="{{ route('apply') }}"
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

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 600,
                once: true,
                offset: 60
            });
        }
    });
</script>

@endsection
