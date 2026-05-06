@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] py-10 text-center">
        <div class="absolute blob w-72 h-72 bg-[#109125]/20 top-[-60px] left-[-60px]"></div>
        <div class="absolute blob w-56 h-56 bg-[#ec2024]/10 bottom-[-40px] right-[5%]"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span
                class="inline-flex items-center gap-2 bg-white/10 text-green-200 text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-white/20">
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
                            📈 Income calculator
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
                        interiorCostPerSqFt: 1000,
                        inventoryCostPerSqFt: 1000,
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
                        get interiorCost() {
                            return this.area * this.interiorCostPerSqFt
                        },
                        get inventoryCost() {
                            return this.area * this.inventoryCostPerSqFt
                        },
                        get franchiseFeesWithGst() {
                            return Math.round(this.franchiseBaseCost * (1 + this.gstRate))
                        },
                        get softwareCostWithGst() {
                            return Math.round(this.softwareBaseCost * (1 + this.gstRate))
                        },
                        get totalStartup() {
                            return this.interiorCost + this.inventoryCost + this.franchiseFeesWithGst + this.softwareCostWithGst
                        },
                    
                        /* ── Percentage calculations for progress bars ── */
                        get interiorPercent() {
                            return Math.round((this.interiorCost / this.totalStartup) * 100)
                        },
                        get inventoryPercent() {
                            return Math.round((this.inventoryCost / this.totalStartup) * 100)
                        },
                        get franchisePercent() {
                            return Math.round((this.franchiseFeesWithGst / this.totalStartup) * 100)
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
                                    <input type="range" x-model.number="area" min="500" max="10000" step="100"
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
                                            <span class="text-[#9bbfb0] font-medium">Interior cost (Store Interior)</span>
                                            <span class="font-bold text-white" x-text="fmt(interiorCost)"></span>
                                        </div>
                                        <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                            <div class="bg-[#109125] h-full rounded-full transition-all duration-500"
                                                :style="`width: ${interiorPercent}%`"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-sm mb-1.5">
                                            <span class="text-[#9bbfb0] font-medium">Inventory cost (Product Cost)</span>
                                            <span class="font-bold text-white" x-text="fmt(inventoryCost)"></span>
                                        </div>
                                        <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                            <div class="bg-[#055346] h-full rounded-full transition-all duration-500"
                                                :style="`width: ${inventoryPercent}%`"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-sm mb-1.5">
                                            <span class="text-[#9bbfb0] font-medium">Franchise Fees (incl. GST)</span>
                                            <span class="font-bold text-white" x-text="fmt(franchiseFeesWithGst)"></span>
                                        </div>
                                        <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                            <div class="bg-[#ec2024] h-full rounded-full transition-all duration-500"
                                                :style="`width: ${franchisePercent}%`"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-sm mb-1.5">
                                            <span class="text-[#9bbfb0] font-medium">Software cost per login (incl.
                                                GST)</span>
                                            <span class="font-bold text-white" x-text="fmt(softwareCostWithGst)"></span>
                                        </div>
                                        <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                            <div class="bg-[#f5a623] h-full rounded-full transition-all duration-500"
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
                        interiorCostPerSqFt: 1000,
                        inventoryCostPerSqFt: 1000,
                        franchiseBaseCost: 210000,
                        softwareBaseCost: 40000,
                        gstRate: 0.18,
                    
                        /* ── Startup Cost (same formula as Tab 1) ── */
                        get interiorCost() {
                            return this.area * this.interiorCostPerSqFt
                        },
                        get inventoryCost() {
                            return this.area * this.inventoryCostPerSqFt
                        },
                        get franchiseFeesWithGst() {
                            return Math.round(this.franchiseBaseCost * (1 + this.gstRate))
                        },
                        get softwareCostWithGst() {
                            return Math.round(this.softwareBaseCost * (1 + this.gstRate))
                        },
                        get startupCost() {
                            return this.interiorCost + this.inventoryCost + this.franchiseFeesWithGst + this.softwareCostWithGst
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
