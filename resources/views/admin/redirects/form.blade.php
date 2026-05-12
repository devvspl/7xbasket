@extends('layouts.admin')

@section('title', $redirect->exists ? 'Edit Redirect' : 'Add Redirect')
@section('subtitle', $redirect->exists ? 'Update redirect rule' : 'Create a new redirect rule')

@section('content')
<div class="max-w-2xl">

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">

        <form method="POST"
              action="{{ $redirect->exists ? route('admin.redirects.update', $redirect) : route('admin.redirects.store') }}"
              class="space-y-5">
            @csrf
            @if($redirect->exists)
                @method('PUT')
            @endif

            {{-- From Path --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    From Path <span class="text-red-500">*</span>
                </label>
                <input type="text" name="from_path"
                       value="{{ old('from_path', $redirect->from_path) }}"
                       placeholder="/old-url-path"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-mono
                              focus:outline-none focus:ring-2 focus:ring-green-500/30 focus:border-green-400
                              @error('from_path') border-red-400 @enderror">
                @error('from_path')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-400">Must start with <code class="bg-gray-100 px-1 rounded">/</code>. Example: <code class="bg-gray-100 px-1 rounded">/old-page</code></p>
            </div>

            {{-- To Path --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    To Path / URL <span class="text-red-500">*</span>
                </label>
                <input type="text" name="to_path"
                       value="{{ old('to_path', $redirect->to_path) }}"
                       placeholder="/new-url-path or https://example.com/page"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-mono
                              focus:outline-none focus:ring-2 focus:ring-green-500/30 focus:border-green-400
                              @error('to_path') border-red-400 @enderror">
                @error('to_path')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-400">Can be a relative path or a full URL.</p>
            </div>

            {{-- Status Code + Active --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Status Code <span class="text-red-500">*</span>
                    </label>
                    <select name="status_code"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-green-500/30 focus:border-green-400
                                   @error('status_code') border-red-400 @enderror">
                        @foreach([301 => 'Permanent (301)', 302 => 'Temporary (302)', 307 => 'Temporary (307)', 308 => 'Permanent (308)'] as $code => $label)
                        <option value="{{ $code }}"
                            {{ old('status_code', $redirect->status_code ?? 301) == $code ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                        @endforeach
                    </select>
                    @error('status_code')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Active</label>
                    <div class="flex items-center h-[42px]">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                   class="sr-only peer"
                                   {{ old('is_active', $redirect->is_active ?? true) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2
                                        peer-focus:ring-green-500/30 rounded-full peer
                                        peer-checked:after:translate-x-full peer-checked:after:border-white
                                        after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                        after:bg-white after:border-gray-300 after:border after:rounded-full
                                        after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                            <span class="ml-3 text-sm text-gray-600">Enable redirect</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition-colors shadow-sm">
                    {{ $redirect->exists ? 'Update Redirect' : 'Create Redirect' }}
                </button>
                <a href="{{ route('admin.redirects.index') }}"
                   class="text-sm text-gray-500 hover:text-gray-700 px-4 py-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
