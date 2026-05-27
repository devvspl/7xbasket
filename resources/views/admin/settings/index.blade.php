@extends('layouts.admin')
@section('title', 'Settings')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-gray-900">Site Settings</h2>
</div>

@if(session('success'))
    <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-5 text-sm text-green-700 font-medium">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Lead Popup Settings --}}
    <div class="stat-card">
        <div class="flex items-center gap-3 mb-5">
            <div class="w-9 h-9 bg-orange-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-900">Lead Popup</p>
                <p class="text-xs text-gray-500">Control the franchise inquiry popup on the website</p>
            </div>
        </div>

        <div class="space-y-5">
            {{-- Active/Inactive Toggle --}}
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                <div>
                    <p class="text-sm font-semibold text-gray-800">Popup Status</p>
                    <p class="text-xs text-gray-500 mt-0.5">Enable or disable the auto-popup on all pages</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="hidden" name="lead_popup_active" value="0">
                    <input type="checkbox" name="lead_popup_active" value="1" id="popupToggle"
                        {{ $settings['lead_popup_active'] == '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-green-500 rounded-full peer peer-checked:after:translate-x-5 peer-checked:bg-green-500 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    <span class="ml-3 text-sm font-medium peer-checked:text-green-600 text-gray-500" id="popupLabel">
                        {{ $settings['lead_popup_active'] == '1' ? 'Active' : 'Inactive' }}
                    </span>
                </label>
            </div>

            {{-- Delay Time --}}
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Popup Delay</p>
                        <p class="text-xs text-gray-500 mt-0.5">Time in seconds before the popup appears automatically</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <input type="number" name="lead_popup_delay" id="popupDelay"
                        value="{{ $settings['lead_popup_delay'] }}"
                        min="1" max="300"
                        class="w-24 border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 text-center">
                    <span class="text-sm text-gray-500">seconds</span>
                    <div class="flex gap-2 ml-auto">
                        <button type="button" onclick="document.getElementById('popupDelay').value = 5"
                            class="text-xs bg-white border border-gray-200 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition-colors font-medium">5s</button>
                        <button type="button" onclick="document.getElementById('popupDelay').value = 10"
                            class="text-xs bg-white border border-gray-200 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition-colors font-medium">10s</button>
                        <button type="button" onclick="document.getElementById('popupDelay').value = 30"
                            class="text-xs bg-white border border-gray-200 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition-colors font-medium">30s</button>
                        <button type="button" onclick="document.getElementById('popupDelay').value = 60"
                            class="text-xs bg-white border border-gray-200 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition-colors font-medium">60s</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Save Button --}}
    <div class="flex justify-end mt-5">
        <button type="submit"
            class="bg-green-600 text-white font-semibold px-8 py-2.5 rounded-xl hover:bg-green-700 transition-colors text-sm">
            Save Settings
        </button>
    </div>
</form>

<script>
    document.getElementById('popupToggle').addEventListener('change', function() {
        document.getElementById('popupLabel').textContent = this.checked ? 'Active' : 'Inactive';
    });
</script>

@endsection
