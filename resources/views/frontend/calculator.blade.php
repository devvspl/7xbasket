@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-br from-green-50 to-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Investment Calculator</h1>
            <p class="text-gray-500">Estimate your potential returns from a 7x Basket franchise</p>
        </div>

        <div x-data="{
            investment: 500000,
            dailySales: 15000,
            margin: 18,
            months: 12,
            get monthlyRevenue() { return this.dailySales * 30; },
            get monthlyProfit() { return (this.monthlyRevenue * this.margin) / 100; },
            get annualProfit() { return this.monthlyProfit * this.months; },
            get roi() { return ((this.annualProfit / this.investment) * 100).toFixed(1); },
            get breakeven() { return Math.ceil(this.investment / this.monthlyProfit); },
            fmt(n) { return '₹' + Number(n).toLocaleString('en-IN'); }
        }" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Total Investment</label>
                        <input type="range" x-model="investment" min="500000" max="5000000" step="100000" class="w-full accent-green-600">
                        <div class="flex justify-between text-xs text-gray-400 mt-1">
                            <span>₹5L</span>
                            <span class="font-semibold text-green-600" x-text="fmt(investment)"></span>
                            <span>₹50L</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Expected Daily Sales</label>
                        <input type="range" x-model="dailySales" min="5000" max="100000" step="1000" class="w-full accent-green-600">
                        <div class="flex justify-between text-xs text-gray-400 mt-1">
                            <span>₹5K</span>
                            <span class="font-semibold text-green-600" x-text="fmt(dailySales)"></span>
                            <span>₹1L</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Profit Margin (%)</label>
                        <input type="range" x-model="margin" min="10" max="35" step="1" class="w-full accent-green-600">
                        <div class="flex justify-between text-xs text-gray-400 mt-1">
                            <span>10%</span>
                            <span class="font-semibold text-green-600" x-text="margin + '%'"></span>
                            <span>35%</span>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 rounded-2xl p-6 space-y-4">
                    <h3 class="font-bold text-gray-900 mb-4">Projected Returns</h3>
                    <div class="flex justify-between items-center py-3 border-b border-green-100">
                        <span class="text-sm text-gray-600">Monthly Revenue</span>
                        <span class="font-bold text-gray-900" x-text="fmt(monthlyRevenue)"></span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-green-100">
                        <span class="text-sm text-gray-600">Monthly Profit</span>
                        <span class="font-bold text-green-600" x-text="fmt(monthlyProfit)"></span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-green-100">
                        <span class="text-sm text-gray-600">Annual Profit</span>
                        <span class="font-bold text-green-600" x-text="fmt(annualProfit)"></span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-green-100">
                        <span class="text-sm text-gray-600">ROI</span>
                        <span class="font-bold text-2xl text-green-600" x-text="roi + '%'"></span>
                    </div>
                    <div class="flex justify-between items-center py-3">
                        <span class="text-sm text-gray-600">Break-even</span>
                        <span class="font-bold text-gray-900" x-text="breakeven + ' months'"></span>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-xs text-yellow-800">
                <strong>Disclaimer:</strong> These are estimated projections based on average franchise performance. Actual results may vary based on location, management, and market conditions.
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('apply') }}" class="inline-block bg-green-600 text-white font-semibold px-8 py-3.5 rounded-xl hover:bg-green-700 transition-colors">
                    Apply for Franchise Now →
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
