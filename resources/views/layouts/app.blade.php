<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.seo-head')
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        html { scroll-behavior: smooth; }
        .prose img { border-radius: 0.5rem; }
    </style>
</head>
<body class="font-sans bg-white text-gray-800 antialiased">

    {{-- Navbar --}}
    <nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">7x</span>
                    </div>
                    <span class="text-xl font-bold text-gray-900">Basket</span>
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('home') ? 'text-green-600' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('about') ? 'text-green-600' : '' }}">About</a>
                    <a href="{{ route('blogs') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('blogs*') ? 'text-green-600' : '' }}">Blog</a>
                    <a href="{{ route('calculator') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('calculator') ? 'text-green-600' : '' }}">Calculator</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors {{ request()->routeIs('contact') ? 'text-green-600' : '' }}">Contact</a>
                    <a href="{{ route('apply') }}" class="bg-green-600 text-white text-sm font-semibold px-5 py-2 rounded-lg hover:bg-green-700 transition-colors">Apply Now</a>
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
            <a href="{{ route('apply') }}" class="block bg-green-600 text-white text-sm font-semibold px-4 py-2 rounded-lg text-center">Apply Now</a>
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
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-sm">7x</span>
                        </div>
                        <span class="text-xl font-bold text-white">Basket</span>
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

</body>
</html>
