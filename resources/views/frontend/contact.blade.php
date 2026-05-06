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
                We're Here to Help
            </span>
            <h1 class="text-4xl font-extrabold text-white mb-3">Contact Us</h1>
            <p class="text-green-100/80 text-base max-w-lg mx-auto">Our team is ready to help you get started.</p>
            <nav class="text-sm flex items-center gap-1 flex-wrap justify-center mt-4">
                <a href="{{ route('home') }}" class="text-green-300 hover:text-white transition-colors">Home</a>
                <span class="text-white/30">/</span>
                <span class="text-white font-medium">Contact</span>
            </nav>
        </div>
    </section>

    {{-- Info Cards Row --}}
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ([['📧', 'Email', 'info@7xbasket.com', 'mailto:info@7xbasket.com'], ['📞', 'Phone', '+91 9870275327', 'tel:+919870275327'], ['📍', 'Address', 'E-52, 3rd Floor, Sector 3, Noida, 201301, Uttar Pradesh', 'https://www.google.com/maps?q=28.580768,77.318195'], ['🕐', 'Hours', 'Mon–Sat: 9AM – 6PM', null]] as [$icon, $label, $value, $href])
                    <div
                        class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-start gap-3 hover:shadow-md transition-shadow">
                        <div
                            class="w-10 h-10 bg-[#f0faf4] rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                            {{ $icon }}</div>
                        <div class="min-w-0">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-0.5">{{ $label }}
                            </p>
                            @if ($href)
                                <a href="{{ $href }}"
                                    {{ str_starts_with($href, 'http') ? 'target="_blank" rel="noopener"' : '' }}
                                    class="text-gray-800 font-semibold text-sm hover:text-[#109125] transition-colors break-words">{{ $value }}</a>
                            @else
                                <p class="text-gray-800 font-semibold text-sm">{{ $value }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Form + Map --}}
    <section class="pb-14 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- Form --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <h2 class="text-xl font-extrabold text-gray-900 mb-1">Send a Message</h2>
                    <p class="text-gray-400 text-sm mb-6">Fill in your details and we'll get back to you within 24 hours.
                    </p>

                    <div id="contactFormMsg" class="hidden rounded-xl px-4 py-3 text-sm font-medium mb-5"></div>

                    <form id="contactPageForm" action="{{ route('apply.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="source" value="contact">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Full Name <span
                                        class="text-[#109125]">*</span></label>
                                <input type="text" name="name" required placeholder="e.g. Rajesh Kumar"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Mobile Number <span
                                        class="text-[#109125]">*</span></label>
                                <input type="tel" name="phone" required placeholder="+91 9870275327"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Email Address</label>
                                <input type="email" name="email" placeholder="you@example.com"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Pincode</label>
                                <input type="text" name="pincode" placeholder="e.g. 110001" maxlength="6"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Store Area (sq. ft.)</label>
                                <select name="store_area"
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
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Property Ownership</label>
                                <select name="property_type"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                                    <option value="">Select type</option>
                                    <option value="owned">Owned Property</option>
                                    <option value="rented">Rented Property</option>
                                    <option value="leased">Leased Property</option>
                                    <option value="looking">Still Looking</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">Planned Opening Timeline</label>
                            <select name="opening_timeline"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                                <option value="">Select timeline</option>
                                <option value="1_month">Within 1 Month</option>
                                <option value="3_months">1–3 Months</option>
                                <option value="6_months">3–6 Months</option>
                                <option value="within_a_week">Within A Week</option>
                                <option value="exploring">Just Exploring</option>
                            </select>
                        </div>
                        <button type="submit" id="contactPageSubmit"
                            class="w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-extrabold py-3.5 rounded-xl transition-all duration-200 text-sm shadow-md hover:-translate-y-0.5">
                            Submit & Get a Free Callback →
                        </button>
                        <p class="text-center text-xs text-gray-400">No spam. We'll only call to discuss your franchise
                            query.</p>
                    </form>
                </div>

                {{-- Map --}}
                <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm h-full min-h-[500px]">
                    <iframe src="https://maps.google.com/maps?q=28.580768,77.318195&z=15&output=embed" width="100%"
                        height="100%" style="border:0; min-height:500px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('contactPageForm');
            if (!form) return;
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var btn = document.getElementById('contactPageSubmit');
                var msg = document.getElementById('contactFormMsg');
                btn.disabled = true;
                btn.textContent = 'Submitting…';
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
                                'rounded-xl px-4 py-3 text-sm font-medium mb-5 bg-green-50 text-green-700 border border-green-200';
                            msg.textContent = json.message;
                            form.reset();
                            btn.textContent = 'Submitted ✓';
                        } else {
                            msg.className =
                                'rounded-xl px-4 py-3 text-sm font-medium mb-5 bg-red-50 text-red-700 border border-red-200';
                            msg.textContent = json.message || 'Something went wrong. Please try again.';
                            btn.disabled = false;
                            btn.textContent = 'Submit & Get a Free Callback →';
                        }
                    })
                    .catch(() => {
                        msg.classList.remove('hidden');
                        msg.className =
                            'rounded-xl px-4 py-3 text-sm font-medium mb-5 bg-red-50 text-red-700 border border-red-200';
                        msg.textContent = 'Network error. Please try again.';
                        btn.disabled = false;
                        btn.textContent = 'Submit & Get a Free Callback →';
                    });
            });
        });
    </script>
@endsection
