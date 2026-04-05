@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-br from-green-50 to-white py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Apply for Franchise</h1>
            <p class="text-gray-500">Fill in your details and our team will contact you within 24 hours.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                <ul class="text-sm text-red-700 space-y-1">
                    @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('apply.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Your full name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="you@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone Number <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="+91 98765 43210">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">City <span class="text-red-500">*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Your city">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Investment Budget <span class="text-red-500">*</span></label>
                    <select name="investment_budget" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white">
                        <option value="">Select your budget range</option>
                        <option value="5-10 Lakhs" {{ old('investment_budget') == '5-10 Lakhs' ? 'selected' : '' }}>₹5 - ₹10 Lakhs</option>
                        <option value="10-20 Lakhs" {{ old('investment_budget') == '10-20 Lakhs' ? 'selected' : '' }}>₹10 - ₹20 Lakhs</option>
                        <option value="20-50 Lakhs" {{ old('investment_budget') == '20-50 Lakhs' ? 'selected' : '' }}>₹20 - ₹50 Lakhs</option>
                        <option value="50+ Lakhs" {{ old('investment_budget') == '50+ Lakhs' ? 'selected' : '' }}>₹50+ Lakhs</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Message (Optional)</label>
                    <textarea name="message" rows="4"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
                        placeholder="Tell us about your business experience or any questions...">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white font-semibold py-3.5 rounded-xl hover:bg-green-700 transition-colors text-sm shadow-lg shadow-green-200">
                    Submit Application
                </button>

                <p class="text-xs text-gray-400 text-center">By submitting, you agree to be contacted by our franchise team. We respect your privacy.</p>
            </form>
        </div>
    </div>
</section>

@endsection
