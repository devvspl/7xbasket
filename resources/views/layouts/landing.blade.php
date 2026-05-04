<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.seo-head')
    <link rel="icon" href="{{ asset('custom/favicon.jpeg') }}" type="image/jpeg">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#16a34a',
                            light: '#22c55e',
                            dark: '#15803d'
                        },
                        cream: '#f9fafb',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans bg-white text-gray-800 antialiased">

    {{-- Minimal landing header — logo + phone only --}}
    <header class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-14 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('custom/logo.png') }}" alt="7x Basket" class="h-8 w-auto">
            </a>
            <a href="#" onclick="openLeadPopup(); return false;"
                class="flex items-center gap-2 bg-[#109125] hover:bg-[#0d7a1e] text-white text-xs font-bold px-4 py-2 rounded-xl transition-all duration-200">Apply
                Franchise
            </a>
        </div>
    </header>

    <main class="overflow-x-clip">
        @yield('content')
    </main>

    {{-- Minimal landing footer --}}
    <footer class="bg-[#055346] text-green-200 py-6 text-center text-xs">
        <p>© {{ date('Y') }} 7x Basket. All rights reserved.</p>
    </footer>

    {{-- Floating WhatsApp --}}
    <div class="fixed bottom-4 left-3 z-50 group flex flex-col items-center gap-1">
        <span
            class="opacity-0 group-hover:opacity-100 transition-all duration-200 translate-y-1 group-hover:translate-y-0
                     bg-gray-900 text-white text-[11px] font-semibold px-2.5 py-1 rounded-lg shadow-lg whitespace-nowrap pointer-events-none">
            WhatsApp
        </span>
        <button onclick="openLeadPopup('whatsapp')"
            class="w-10 h-10 rounded-xl bg-[#25D366] text-white flex items-center justify-center
                  shadow-lg shadow-green-400/30 hover:shadow-xl hover:shadow-green-400/50
                  hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                <path
                    d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.855L.057 23.882l6.198-1.448A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.371l-.36-.214-3.68.859.875-3.593-.234-.369A9.818 9.818 0 1112 21.818z" />
            </svg>
        </button>
    </div>

    {{-- Floating Call --}}
    <div class="fixed bottom-4 right-3 z-50 group flex flex-col items-center gap-1">
        <span
            class="opacity-0 group-hover:opacity-100 transition-all duration-200 translate-y-1 group-hover:translate-y-0
                     bg-gray-900 text-white text-[11px] font-semibold px-2.5 py-1 rounded-lg shadow-lg whitespace-nowrap pointer-events-none">
            Call Now
        </span>
        <button onclick="openLeadPopup('call')"
            class="w-10 h-10 rounded-xl bg-[#ec2024] text-white flex items-center justify-center
                  shadow-lg shadow-red-500/40 hover:shadow-xl hover:shadow-red-500/60
                  hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.61 21 3 13.39 3 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.2 2.2z" />
            </svg>
        </button>
    </div>

    {{-- Apply Franchise vertical tab --}}
    <a href="#" onclick="openLeadPopup(); return false;"
        class="fixed right-0 top-1/2 -translate-y-1/2 z-50
              bg-[#ec2024] text-white shadow-xl rounded-l-2xl
              flex items-center justify-center
              hover:bg-red-600 transition-all duration-300
              py-5 px-3">
        <span class="text-xs font-extrabold tracking-widest uppercase"
            style="writing-mode:vertical-rl;text-orientation:mixed;transform:rotate(180deg);letter-spacing:.15em;">
            Apply Franchise
        </span>
    </a>

    {{-- Lead Popup --}}
    <div id="leadPopup" class="fixed inset-0 z-[999] flex items-center justify-center p-4 hidden">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeLeadPopup()"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg z-10 animate-popup">
            <div class="bg-gradient-to-br from-[#055346] to-[#109125] rounded-t-2xl px-5 py-4 text-white">
                <button onclick="closeLeadPopup()"
                    class="absolute top-3 right-3 w-7 h-7 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="flex items-center gap-2">
                    <span class="text-xl">🏪</span>
                    <div>
                        <h2 class="text-sm font-extrabold leading-tight">Start Your 7x Basket Franchise</h2>
                        <p class="text-white/80 text-[11px]">Our team will call you within 24 hours.</p>
                    </div>
                </div>
            </div>
            <form id="leadPopupForm" action="{{ route('apply.store') }}" method="POST" class="px-5 py-4 space-y-3">
                @csrf
                <input type="hidden" name="source" value="popup">
                <div id="leadPopupMsg" class="hidden rounded-lg px-4 py-3 text-sm font-medium text-center"></div>
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1">Full Name <span
                            class="text-[#109125]">*</span></label>
                    <input type="text" name="name" required placeholder="e.g. Rajesh Kumar"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Mobile <span
                                class="text-[#109125]">*</span></label>
                        <input type="tel" name="phone" required placeholder="+91 9870275327"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Email</label>
                        <input type="email" name="email" placeholder="you@example.com"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Pincode <span
                                class="text-[#109125]">*</span></label>
                        <input type="text" name="pincode" required placeholder="110001" maxlength="6"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Store Area <span
                                class="text-[#109125]">*</span></label>
                        <select name="store_area" required
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                            <option value="" disabled selected>Select</option>
                            <option value="300-500">300–500 sq ft</option>
                            <option value="500-800">500–800 sq ft</option>
                            <option value="800-1200">800–1200 sq ft</option>
                            <option value="1200-2000">1200–2000 sq ft</option>
                            <option value="2000+">2000+ sq ft</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1">Property Type <span
                            class="text-[#109125]">*</span></label>
                    <select name="property_type" required
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
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
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                        <option value="" disabled selected>Select timeline</option>
                        <option value="1_month">Within 1 Month</option>
                        <option value="3_months">1–3 Months</option>
                        <option value="6_months">3–6 Months</option>
                        <option value="1_year">6–12 Months</option>
                        <option value="exploring">Just Exploring</option>
                    </select>
                </div>
                <button type="submit" id="leadPopupSubmit"
                    class="w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-extrabold py-2.5 rounded-lg transition-all duration-200 text-xs shadow-md hover:-translate-y-0.5">
                    Submit & Get a Free Callback →
                </button>
                <p class="text-center text-[10px] text-gray-400 pb-1">No spam. We'll only call to discuss your
                    franchise query.</p>
            </form>
        </div>
    </div>

    <style>
        @keyframes popupIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-popup {
            animation: popupIn 0.3s ease-out;
        }
    </style>

    <script>
        var _leadAction = null;

        function closeLeadPopup() {
            document.getElementById('leadPopup').classList.add('hidden');
        }

        function openLeadPopup(action) {
            _leadAction = action || null;
            document.getElementById('leadPopup').classList.remove('hidden');
            document.getElementById('leadPopupForm').reset();
            var msg = document.getElementById('leadPopupMsg');
            msg.className = 'hidden rounded-lg px-4 py-3 text-sm font-medium text-center';
            msg.textContent = '';
            var btn = document.getElementById('leadPopupSubmit');
            btn.disabled = false;
            btn.textContent = 'Submit & Get a Free Callback →';
        }
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('leadPopupForm');
            if (!form) return;
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const btn = document.getElementById('leadPopupSubmit');
                const msg = document.getElementById('leadPopupMsg');
                btn.disabled = true;
                btn.textContent = 'Submitting…';
                const data = new FormData(form);
                var submittedName = form.querySelector('[name="name"]')?.value || '';
                var submittedPhone = form.querySelector('[name="phone"]')?.value || '';
                var currentAction = _leadAction;
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
                            msg.className =
                                'rounded-lg px-4 py-3 text-sm font-medium text-center bg-green-50 text-green-700 border border-green-200';
                            msg.textContent = json.message;
                            form.reset();
                            setTimeout(() => {
                                closeLeadPopup();
                                if (currentAction === 'whatsapp') {
                                    var text = encodeURIComponent('Hi, I\'m ' + submittedName +
                                        ' (' + submittedPhone +
                                        '). I\'m interested in 7x Basket franchise.');
                                    window.open('https://wa.me/919870275327?text=' + text,
                                        '_blank');
                                } else if (currentAction === 'call') {
                                    window.location.href = 'tel:+919870275327';
                                }
                                _leadAction = null;
                            }, 1500);
                        } else {
                            msg.className =
                                'rounded-lg px-4 py-3 text-sm font-medium text-center bg-red-50 text-red-700 border border-red-200';
                            msg.textContent = json.message || 'Something went wrong. Please try again.';
                            btn.disabled = false;
                            btn.textContent = 'Submit & Get a Free Callback →';
                        }
                    })
                    .catch(() => {
                        msg.classList.remove('hidden');
                        msg.className =
                            'rounded-lg px-4 py-3 text-sm font-medium text-center bg-red-50 text-red-700 border border-red-200';
                        msg.textContent = 'Network error. Please try again.';
                        btn.disabled = false;
                        btn.textContent = 'Submit & Get a Free Callback →';
                    });
            });
        });
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('leadPopup').classList.remove('hidden');
            }, 30000);
        });
    </script>

</body>

</html>
