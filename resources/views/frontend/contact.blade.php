@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-br from-green-50 to-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Contact Us</h1>
            <p class="text-gray-500 max-w-xl mx-auto">Have questions about our franchise? We're here to help.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="space-y-5">
                @foreach([
                    ['📧', 'Email', 'franchise@7xbasket.com'],
                    ['📞', 'Phone', '+91 98765 43210'],
                    ['📍', 'Address', 'New Delhi, India'],
                    ['🕐', 'Hours', 'Mon-Sat: 9AM - 6PM'],
                ] as [$icon, $label, $value])
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-start gap-4">
                    <div class="text-2xl">{{ $icon }}</div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-0.5">{{ $label }}</p>
                        <p class="text-gray-800 font-medium text-sm">{{ $value }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Send a Message</h2>
                <form class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Name</label>
                            <input type="text" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Your name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="you@example.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Subject</label>
                        <input type="text" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="How can we help?">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Message</label>
                        <textarea rows="5" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 resize-none" placeholder="Your message..."></textarea>
                    </div>
                    <button type="submit" class="bg-green-600 text-white font-semibold px-8 py-3 rounded-xl hover:bg-green-700 transition-colors text-sm">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
