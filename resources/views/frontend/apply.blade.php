@extends('layouts.app')
@section('content')

{{-- Hero --}}
<section class="bg-[#f0faf4] py-10 text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="inline-flex items-center gap-2 bg-[#109125]/10 text-[#055346] text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-[#109125]/20">
            <span class="w-2 h-2 bg-[#ec2024] rounded-full animate-pulse"></span>
            Join Us
        </span>
        <h1 class="text-4xl font-extrabold text-gray-900 mt-2">Apply for Franchise</h1>
        <p class="text-gray-500 text-base mt-2 max-w-lg mx-auto">Fill in your details and our team will contact you within 24 hours.</p>
        <nav class="text-sm text-gray-400 flex items-center gap-1 flex-wrap justify-center mt-4">
            <a href="{{ route('home') }}" class="hover:text-[#109125] transition-colors">Home</a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-600 font-medium">Apply Franchise</span>
        </nav>
    </div>
</section>

{{-- Form --}}
<section class="py-14 bg-white">
    <div class="max-w-lg mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

            <div id="applyFormMsg" class="hidden rounded-xl px-4 py-3 text-sm font-medium mb-5 text-center"></div>

            <form id="applyPageForm" action="{{ route('apply.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="source" value="website">

                {{-- Full Name --}}
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1">Full Name <span class="text-[#109125]">*</span></label>
                    <input type="text" name="name" required placeholder="e.g. Rajesh Kumar"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                </div>

                {{-- Mobile + Email --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Mobile Number <span class="text-[#109125]">*</span></label>
                        <input type="tel" name="phone" required placeholder="+91 9870275327"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Email Address</label>
                        <input type="email" name="email" placeholder="you@example.com"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                </div>

                {{-- Pincode + Store Area --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Pincode <span class="text-[#109125]">*</span></label>
                        <input type="text" name="pincode" required placeholder="e.g. 110001" maxlength="6"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Store Area (sq. ft.) <span class="text-[#109125]">*</span></label>
                        <select name="store_area" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                            <option value="" disabled selected>Select area</option>
                            <option value="300-500">300–500 sq ft (Mini)</option>
                            <option value="500-800">500–800 sq ft</option>
                            <option value="800-1200">800–1200 sq ft (Super)</option>
                            <option value="1200-2000">1200–2000 sq ft</option>
                            <option value="2000+">2000+ sq ft (Hyper)</option>
                        </select>
                    </div>
                </div>

                {{-- Property Ownership --}}
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1">Property Ownership Type <span class="text-[#109125]">*</span></label>
                    <select name="property_type" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                        <option value="" disabled selected>Select ownership type</option>
                        <option value="owned">Owned Property</option>
                        <option value="rented">Rented Property</option>
                        <option value="leased">Leased Property</option>
                        <option value="looking">Still Looking for Space</option>
                    </select>
                </div>

                {{-- Opening Timeline --}}
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1">Planned Store Opening Timeline <span class="text-[#109125]">*</span></label>
                    <select name="opening_timeline" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                        <option value="" disabled selected>Select timeline</option>
                        <option value="1_month">Within 1 Month</option>
                        <option value="3_months">1–3 Months</option>
                        <option value="6_months">3–6 Months</option>
                        <option value="1_year">6–12 Months</option>
                        <option value="exploring">Just Exploring</option>
                    </select>
                </div>

                {{-- Submit --}}
                <button type="submit" id="applyPageSubmit"
                    class="w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-extrabold py-3.5 rounded-xl transition-all duration-200 text-sm shadow-md hover:-translate-y-0.5">
                    Submit & Get a Free Callback →
                </button>

                <p class="text-center text-xs text-gray-400">No spam. We'll only call to discuss your franchise query.</p>
            </form>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('applyPageForm');
    if (!form) return;
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        var btn = document.getElementById('applyPageSubmit');
        var msg = document.getElementById('applyFormMsg');
        btn.disabled = true;
        btn.textContent = 'Submitting…';
        fetch(form.action, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
            body: new FormData(form)
        })
        .then(r => r.json())
        .then(json => {
            msg.classList.remove('hidden');
            if (json.success) {
                msg.className = 'rounded-xl px-4 py-3 text-sm font-medium mb-5 text-center bg-green-50 text-green-700 border border-green-200';
                msg.textContent = json.message;
                form.reset();
                btn.textContent = 'Submitted ✓';
            } else {
                msg.className = 'rounded-xl px-4 py-3 text-sm font-medium mb-5 text-center bg-red-50 text-red-700 border border-red-200';
                msg.textContent = json.message || 'Something went wrong. Please try again.';
                btn.disabled = false;
                btn.textContent = 'Submit & Get a Free Callback →';
            }
        })
        .catch(() => {
            msg.classList.remove('hidden');
            msg.className = 'rounded-xl px-4 py-3 text-sm font-medium mb-5 text-center bg-red-50 text-red-700 border border-red-200';
            msg.textContent = 'Network error. Please try again.';
            btn.disabled = false;
            btn.textContent = 'Submit & Get a Free Callback →';
        });
    });
});
</script>

@endsection
