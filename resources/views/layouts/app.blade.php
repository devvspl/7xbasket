<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body class="font-sans bg-white text-gray-800 antialiased overflow-x-hidden">

    {{-- ── Notification Bar ── --}}
    <div x-data="{ show: true }" x-show="show" x-cloak
         class="relative bg-[#055346] text-white text-xs sm:text-sm font-medium overflow-hidden">
        {{-- animated shimmer line --}}
        <div class="shimmer-bar absolute inset-0 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 py-2.5 flex items-center justify-between gap-4">

            {{-- Scrolling marquee — all screen sizes --}}
            <div class="flex-1 overflow-hidden">
                <div class="marquee-track flex gap-16 whitespace-nowrap w-max">
                    {{-- set 1 --}}
                    <span class="flex items-center gap-1.5"><span class="text-yellow-300">🎉</span> Limited slots available — Apply before <strong>30 April 2026</strong></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-green-300">✅</span> <strong>Zero Royalty</strong> · Zero Hidden Charges</span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-yellow-300">📞</span> Call us: <a href="tel:+919876543210" class="underline underline-offset-2 hover:text-green-200 transition-colors">+91 98765 43210</a></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span>🏪</span> 500+ Franchise Partners Across India</span>
                    <span class="text-white/30">|</span>
                    {{-- duplicate for seamless loop --}}
                    <span class="flex items-center gap-1.5"><span class="text-yellow-300">🎉</span> Limited slots available — Apply before <strong>30 April 2026</strong></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-green-300">✅</span> <strong>Zero Royalty</strong> · Zero Hidden Charges</span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span class="text-yellow-300">📞</span> Call us: <a href="tel:+919876543210" class="underline underline-offset-2 hover:text-green-200 transition-colors">+91 98765 43210</a></span>
                    <span class="text-white/30">|</span>
                    <span class="flex items-center gap-1.5"><span>🏪</span> 500+ Franchise Partners Across India</span>
                    <span class="text-white/30">|</span>
                </div>
            </div>

            {{-- CTA + close --}}
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('apply') }}"
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
    <nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('custom/logo.png') }}" alt="7x Basket" class="h-10 w-auto object-contain">
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('home') ? 'text-green-600' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('about') ? 'text-green-600' : '' }}">About</a>
                    <a href="{{ route('blogs') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('blogs*') ? 'text-green-600' : '' }}">Blog</a>
                    <a href="{{ route('calculator') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('calculator') ? 'text-green-600' : '' }}">Calculator</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('contact') ? 'text-green-600' : '' }}">Contact</a>
                    <a href="{{ route('brochure.download') }}"
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
            <a href="{{ route('about') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">About</a>
            <a href="{{ route('blogs') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Blog</a>
            <a href="{{ route('calculator') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Calculator</a>
            <a href="{{ route('contact') }}" class="block text-sm font-medium text-gray-700 hover:text-green-600">Contact</a>
            <a href="{{ route('brochure.download') }}" class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-[#055346]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Download Brochure
            </a>
        </div>
    </nav>

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

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-300 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('custom/logo-ligth.jpeg') }}" alt="7x Basket" class="h-10 w-auto object-contain">
                    </div>
                    <p class="text-sm leading-relaxed text-gray-400 max-w-sm">Your trusted grocery franchise partner. Build a profitable business with our proven model, full support, and strong brand.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-green-400 transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-green-400 transition-colors">About Us</a></li>
                        <li><a href="{{ route('blogs') }}" class="hover:text-green-400 transition-colors">Blog</a></li>
                        <li><a href="{{ route('calculator') }}" class="hover:text-green-400 transition-colors">Investment Calculator</a></li>
                        <li><a href="{{ route('apply') }}" class="hover:text-green-400 transition-colors">Apply Franchise</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>📧 franchise@7xbasket.com</li>
                        <li>📞 +91 98765 43210</li>
                        <li>📍 India</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-6 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} 7x Basket. All rights reserved.</p>
                <a href="{{ route('sitemap') }}" class="hover:text-green-400">Sitemap</a>
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
        <a href="https://wa.me/919876543210?text=Hi%2C%20I%27m%20interested%20in%207x%20Basket%20franchise"
           target="_blank" rel="noopener"
           class="w-10 h-10 rounded-xl bg-[#25D366] text-white flex items-center justify-center
                  shadow-lg shadow-green-400/30 hover:shadow-xl hover:shadow-green-400/50
                  hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.855L.057 23.882l6.198-1.448A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.371l-.36-.214-3.68.859.875-3.593-.234-.369A9.818 9.818 0 1112 21.818z"/>
            </svg>
        </a>
    </div>

    {{-- BOTTOM-RIGHT: Call (detached) --}}
    <div class="fixed bottom-4 right-3 z-50 group flex flex-col items-center gap-1">
        <span class="opacity-0 group-hover:opacity-100 transition-all duration-200 translate-y-1 group-hover:translate-y-0
                     bg-gray-900 text-white text-[11px] font-semibold px-2.5 py-1 rounded-lg shadow-lg whitespace-nowrap pointer-events-none">
            Call Now
        </span>
        <a href="tel:+919876543210"
           class="w-10 h-10 rounded-xl bg-[#ec2024] text-white flex items-center justify-center
                  shadow-lg shadow-red-500/40 hover:shadow-xl hover:shadow-red-500/60
                  hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.61 21 3 13.39 3 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.2 2.2z"/>
            </svg>
        </a>
    </div>

    {{-- RIGHT-CENTER: Apply Franchise vertical tab --}}
    <a href="{{ route('apply') }}"
       title="Apply for Franchise"
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

</body>
</html>
