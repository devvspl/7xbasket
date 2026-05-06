<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.seo-head')
    <link rel="icon" href="{{ asset('custom/favicon.jpeg') }}" type="image/jpeg">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#16a34a', light: '#22c55e', dark: '#15803d' },
                        cream: '#f9fafb',
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans bg-white text-gray-800 antialiased">

    {{-- Sticky wrapper: announcement bar + navbar --}}
    <div class="sticky top-0 z-50" x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 10)">

    {{-- ── Notification Bar ── --}}
    <div x-data="{ show: true }" x-show="show" x-cloak
         class="relative bg-[#055346] text-white text-xs sm:text-sm font-medium overflow-hidden">
        {{-- animated shimmer line --}}
        <div class="shimmer-bar absolute inset-0 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 py-1 flex items-center justify-between gap-4">

            {{-- Scrolling marquee — all screen sizes --}}
            <div class="flex-1 overflow-hidden">
                <div class="marquee-track flex gap-16 whitespace-nowrap w-max">
                    {{-- set 1 --}}
                    <span class="flex items-center gap-1.5"><span class="text-[#ec2024]">🎉</span> Limited slots available — Apply before <strong>{{ date('d F Y') }}</strong></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-green-300">✅</span> <strong>Zero Hidden Charges</strong></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-[#ec2024]">📞</span> Call us: <a href="tel:919870275327" class="underline underline-offset-2 hover:text-green-200 transition-colors">+91 9870275327</a></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span>🏪</span> 150+ Franchise Partners Across India</span>
                    <span class="text-white/30">|</span>
                    {{-- duplicate for seamless loop --}}
                    <span class="flex items-center gap-1.5"><span class="text-[#ec2024]">🎉</span> Limited slots available — Apply before <strong>{{ date('d F Y') }}</strong></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-green-300">✅</span> <strong>Zero Royalty</strong> · Zero Hidden Charges</span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-[#ec2024]">📞</span> Call us: <a href="tel:919870275327" class="underline underline-offset-2 hover:text-green-200 transition-colors">+91 9870275327</a></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span>🏪</span> 150+ Franchise Partners Across India</span>
                    <span class="text-white/30">|</span>
                </div>
            </div>

            {{-- CTA + close --}}
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="#" onclick="openLeadPopup(); return false;"
                   class="hidden sm:inline-block bg-[#ec2024] hover:bg-red-600 text-white text-xs font-bold
                          px-3 py-1.5 rounded-lg transition-all hover:-translate-y-px whitespace-nowrap">
                    Apply Now
                </a>
                <button @click="show = false"
                        class="text-white/60 hover:text-white transition-colors p-0.5 flex-shrink-0"
                        aria-label="Close">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

    </div>

    {{-- Navbar --}}
    <nav x-data="{ open: false }" :class="scrolled ? 'shadow-md' : 'shadow-sm'" class="bg-white border-b border-gray-100 transition-shadow duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('custom/logo.png') }}" alt="7x Basket" class="h-10 w-auto object-contain">
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('home') ? 'text-green-600' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('about') ? 'text-green-600' : '' }}">About Us</a>
                    <a href="{{ route('apply') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('apply') ? 'text-green-600' : '' }}">Apply Franchise</a>
                    <a href="{{ route('calculator') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('calculator') ? 'text-green-600' : '' }}">Calculator</a>
                    <a href="{{ route('blogs') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('blogs*') ? 'text-green-600' : '' }}">Blogs</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('contact') ? 'text-green-600' : '' }}">Contact</a>
                    <a href="#" onclick="openLeadPopup('brochure'); return false;"
                       class="flex items-center gap-1.5 bg-[#055346] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-[#076b58] transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Download Brochure
                    </a>
                </div>

                <button @click="open = !open" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open" x-cloak class="md:hidden border-t border-gray-100 bg-white px-4 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Home</a>
            <a href="{{ route('about') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">About Us</a>
            <a href="{{ route('blogs') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Blogs</a>
            <a href="{{ route('calculator') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Calculator</a>
            <a href="{{ route('apply') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Apply Franchise</a>
            <a href="{{ route('contact') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Contact</a>
            <a href="#" onclick="openLeadPopup('brochure'); return false;" class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-[#055346]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Download Brochure
            </a>
        </div>
    </nav>

    </div>{{-- end sticky wrapper --}}

    {{-- Flash Messages --}}
    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="fixed top-20 right-4 z-50 bg-green-50 border border-green-200 text-green-800 px-5 py-3 rounded-lg shadow-lg text-sm font-medium">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="fixed top-20 right-4 z-50 bg-red-50 border border-red-200 text-red-800 px-5 py-3 rounded-lg shadow-lg text-sm font-medium">
        {{ session('error') }}
    </div>
    @endif

    <main class="overflow-x-clip">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="overflow-x-hidden relative overflow-hidden bg-gradient-to-br from-[#055346] via-[#076b58] to-[#055346] text-green-100 pt-16 pb-8">
        <div class="blob w-96 h-96 bg-[#109125] top-[-80px] left-[-80px]"></div>
        <div class="blob w-72 h-72 bg-[#ec2024] bottom-[-60px] right-[10%]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('custom/logo-ligth.png') }}" alt="7x Basket" class="h-10 w-auto object-contain">
                    </div>
                    <p class="text-sm leading-relaxed text-green-200 max-w-sm">Your trusted grocery franchise partner. Build a profitable business with our proven model, full support, and strong brand.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-green-200 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-green-200 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('blogs') }}" class="text-green-200 hover:text-white transition-colors">Blogs</a></li>
                        <li><a href="{{ route('calculator') }}" class="text-green-200 hover:text-white transition-colors">Calculator</a></li>
                        <li><a href="{{ route('apply') }}" class="text-green-200 hover:text-white transition-colors">Apply Franchise</a></li>
                        <li><a href="{{ route('contact') }}" class="text-green-200 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-2 text-sm text-green-200">
                        <li><a href="mailto:info@7xbasket.com" class="hover:text-white transition-colors">📧 info@7xbasket.com</a></li>
                        <li><a href="tel:+919870275327" class="hover:text-white transition-colors">📞 +91 9870275327</a></li>
                        <li><a href="https://maps.app.goo.gl/xKx7arLWfbyjaZvB8" target="_blank" rel="noopener" class="hover:text-white transition-colors">📍 Third Floor, C-97, Nearby OSR Jewellers, Lajpat Nagar, Delhi 110024</a></li>
                        <li>🕐 Mon–Sat: 9AM – 6PM</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/20 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-green-300">
                <p>&copy; {{ date('Y') }} 7x Basket. All rights reserved.</p>

                {{-- Social Icons --}}
                <div class="flex items-center gap-3">
                    <a href="https://www.facebook.com/7xbasketofficial" target="_blank" rel="noopener"
                       class="w-8 h-8 bg-white/10 hover:bg-[#1877F2] rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110" title="Facebook">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/7xbasket" target="_blank" rel="noopener"
                       class="w-8 h-8 bg-white/10 hover:bg-[#e1306c] rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110" title="Instagram">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/>
                            <circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/>
                            <circle cx="17.5" cy="6.5" r="1" fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@7xBasket" target="_blank" rel="noopener"
                       class="w-8 h-8 bg-white/10 hover:bg-[#FF0000] rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110" title="YouTube">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58z"/>
                            <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="#055346"/>
                        </svg>
                    </a>
                </div>

                <a href="{{ route('sitemap') }}" class="hover:text-white transition-colors">Sitemap</a>
            </div>
        </div>
    </footer>

    {{-- ══════════════════════════════════════════
         FIXED FLOATING ELEMENTS
    ══════════════════════════════════════════ --}}

    {{-- BOTTOM-LEFT: WhatsApp (detached) --}}
    <div class="fixed bottom-4 left-3 z-50 group flex flex-col items-center gap-1">
        <span class="opacity-0 group-hover:opacity-100 transition-all duration-200 translate-y-1 group-hover:translate-y-0
                     bg-gray-900 text-white text-[11px] font-semibold px-2.5 py-1 rounded-lg shadow-lg whitespace-nowrap pointer-events-none">
            WhatsApp
        </span>
        <button onclick="openLeadPopup('whatsapp')"
           class="w-10 h-10 rounded-xl bg-[#25D366] text-white flex items-center justify-center
                  shadow-lg shadow-green-400/30 hover:shadow-xl hover:shadow-green-400/50
                  hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.855L.057 23.882l6.198-1.448A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.371l-.36-.214-3.68.859.875-3.593-.234-.369A9.818 9.818 0 1112 21.818z"/>
            </svg>
        </button>
    </div>

    {{-- BOTTOM-RIGHT: Call (detached) --}}
    <div class="fixed bottom-4 right-3 z-50 group flex flex-col items-center gap-1">
        <span class="opacity-0 group-hover:opacity-100 transition-all duration-200 translate-y-1 group-hover:translate-y-0
                     bg-gray-900 text-white text-[11px] font-semibold px-2.5 py-1 rounded-lg shadow-lg whitespace-nowrap pointer-events-none">
            Call Now
        </span>
        <button onclick="openLeadPopup('call')"
           class="w-10 h-10 rounded-xl bg-[#ec2024] text-white flex items-center justify-center
                  shadow-lg shadow-red-500/40 hover:shadow-xl hover:shadow-red-500/60
                  hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.61 21 3 13.39 3 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.2 2.2z"/>
            </svg>
        </button>
    </div>

    {{-- RIGHT-CENTER: Apply Franchise vertical tab --}}
    <a href="#" onclick="openLeadPopup(); return false;"
       title="Apply for Franchise"
       id="stickyApplyBtn"
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

    {{-- ══════════════════════════════════════════
         LEAD POPUP — appears after 5 seconds on all pages
    ══════════════════════════════════════════ --}}
    <div id="leadPopup"
         class="fixed inset-0 z-[999] flex items-center justify-center p-4 hidden">

        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeLeadPopup()"></div>

        {{-- Modal --}}
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg z-10 animate-popup">

            {{-- Green header --}}
            <div class="bg-gradient-to-br from-[#055346] to-[#109125] rounded-t-2xl px-5 py-4 text-white">
                <button onclick="closeLeadPopup()" class="absolute top-3 right-3 w-7 h-7 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
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

            {{-- Form --}}
            <form id="leadPopupForm" action="{{ route('apply.store') }}" method="POST" class="px-5 py-4 space-y-3">
                @csrf
                <input type="hidden" name="source" value="popup">
                <input type="hidden" name="action_type" id="actionTypeInput" value="">

                {{-- Success / Error message --}}
                <div id="leadPopupMsg" class="hidden rounded-lg px-4 py-3 text-sm font-medium text-center"></div>

                {{-- Full Name --}}
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1">Full Name <span class="text-[#109125]">*</span></label>
                    <input type="text" name="name" required placeholder="e.g. Rajesh Kumar"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                </div>

                {{-- Mobile + Email --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Mobile Number <span class="text-[#109125]">*</span></label>
                        <input type="tel" name="phone" required placeholder="+91 9870275327"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Email Address</label>
                        <input type="email" name="email" placeholder="you@example.com"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                </div>

                {{-- Pincode + Store Area --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Pincode <span class="text-[#109125]">*</span></label>
                        <input type="text" name="pincode" required placeholder="e.g. 110001" maxlength="6"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1">Store Area (sq. ft.) <span class="text-[#109125]">*</span></label>
                        <select name="store_area" required
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-900 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
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
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-900 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
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
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-900 focus:outline-none focus:border-[#109125] focus:ring-1 focus:ring-[#109125] transition-all bg-white">
                        <option value="" disabled selected>Select timeline</option>
                        <option value="1_month">Within 1 Month</option>
                        <option value="3_months">1–3 Months</option>
                        <option value="6_months">3–6 Months</option>
                        <option value="1_year">6–12 Months</option>
                        <option value="exploring">Just Exploring</option>
                    </select>
                </div>

                {{-- Submit --}}
                <button type="submit" id="leadPopupSubmit"
                    class="w-full bg-[#109125] hover:bg-[#0d7a1e] text-white font-extrabold py-2.5 rounded-lg transition-all duration-200 text-xs shadow-md hover:-translate-y-0.5">
                    Submit & Get a Free Callback →
                </button>

                <p class="text-center text-[10px] text-gray-400 pb-1">No spam. We'll only call to discuss your franchise query.</p>
            </form>
        </div>
    </div>

    <style>
        @keyframes popupIn {
            from { opacity: 0; transform: scale(0.95); }
            to   { opacity: 1; transform: scale(1); }
        }
        .animate-popup { animation: popupIn 0.3s ease-out; }
    </style>

    <script>
        var _leadAction = null;
        function closeLeadPopup() {
            document.getElementById('leadPopup').classList.add('hidden');
            // Show sticky button when popup closes
            var stickyBtn = document.getElementById('stickyApplyBtn');
            if (stickyBtn) {
                stickyBtn.classList.remove('hidden');
                stickyBtn.style.display = '';
            }
            // Don't reset _leadAction here - keep it for redirect
        }
        function openLeadPopup(action) {
            _leadAction = action || null;
            document.getElementById('leadPopup').classList.remove('hidden');
            // Hide sticky button when popup opens
            var stickyBtn = document.getElementById('stickyApplyBtn');
            if (stickyBtn) {
                stickyBtn.classList.add('hidden');
            }
            // Set action type in hidden input
            var actionInput = document.getElementById('actionTypeInput');
            if (actionInput) {
                actionInput.value = action || '';
            }
            // Reset form & message on re-open
            document.getElementById('leadPopupForm').reset();
            // Re-set action type after reset
            if (actionInput) {
                actionInput.value = action || '';
            }
            var msg = document.getElementById('leadPopupMsg');
            msg.className = 'hidden rounded-lg px-4 py-3 text-sm font-medium text-center';
            msg.textContent = '';
            var btn = document.getElementById('leadPopupSubmit');
            btn.disabled = false;
            btn.textContent = 'Submit & Get a Free Callback →';
        }

        // AJAX submit
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('leadPopupForm');
            if (!form) return;

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const btn = document.getElementById('leadPopupSubmit');
                const msg = document.getElementById('leadPopupMsg');

                // Loading state
                btn.disabled = true;
                btn.textContent = 'Submitting…';

                const data = new FormData(form);

                // Capture values BEFORE any async operations
                var submittedName  = form.querySelector('[name="name"]') ? form.querySelector('[name="name"]').value : '';
                var submittedPhone = form.querySelector('[name="phone"]') ? form.querySelector('[name="phone"]').value : '';
                var currentAction = _leadAction; // Store action before it might change

                fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json', 'X-Page-Url': window.location.href },
                    body: data
                })
                .then(res => res.json())
                .then(json => {
                    msg.classList.remove('hidden');
                    if (json.success) {
                        msg.className = 'rounded-lg px-4 py-3 text-sm font-medium text-center bg-green-50 text-green-700 border border-green-200';
                        msg.textContent = json.message;
                        form.reset();
                        
                        setTimeout(() => {
                            closeLeadPopup();
                            
                            // Handle redirect based on action
                            if (currentAction === 'whatsapp') {
                                var text = encodeURIComponent('Hi, I\'m ' + submittedName + ' (' + submittedPhone + '). I\'m interested in 7x Basket franchise.');
                                window.open('https://wa.me/919870275327?text=' + text, '_blank');
                            } else if (currentAction === 'call') {
                                window.location.href = 'tel:+919870275327';
                            } else if (currentAction === 'brochure') {
                                // Trigger brochure download
                                window.location.href = '{{ route("brochure.download") }}';
                            }
                            
                            // Reset action after redirect
                            _leadAction = null;
                        }, 1500);
                    } else {
                        msg.className = 'rounded-lg px-4 py-3 text-sm font-medium text-center bg-red-50 text-red-700 border border-red-200';
                        msg.textContent = json.message || 'Something went wrong. Please try again.';
                        btn.disabled = false;
                        btn.textContent = 'Submit & Get a Free Callback →';
                    }
                })
                .catch(() => {
                    msg.classList.remove('hidden');
                    msg.className = 'rounded-lg px-4 py-3 text-sm font-medium text-center bg-red-50 text-red-700 border border-red-200';
                    msg.textContent = 'Network error. Please check your connection and try again.';
                    btn.disabled = false;
                    btn.textContent = 'Submit & Get a Free Callback →';
                });
            });
        });

        window.addEventListener('load', function () {
            setTimeout(function () {
                document.getElementById('leadPopup').classList.remove('hidden');
            }, 30000);
        });
    </script>

</html>


