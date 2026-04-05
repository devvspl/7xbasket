<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — 7x Basket Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }

        /* Sidebar transition */
        .sidebar { transition: width 0.25s cubic-bezier(.4,0,.2,1); }
        .sidebar-label { transition: opacity 0.15s ease, width 0.2s ease; }

        /* Nav link */
        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 500;
            color: #94a3b8;
            cursor: pointer;
            transition: background .15s, color .15s;
            white-space: nowrap;
            overflow: hidden;
            text-decoration: none;
        }
        .nav-link:hover  { background: rgba(255,255,255,.07); color: #fff; }
        .nav-link.active { background: rgba(255,255,255,.12); color: #fff; }
        .nav-link .icon  { width: 18px; height: 18px; flex-shrink: 0; }

        /* Section label */
        .section-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #475569;
            padding: 0 12px;
            margin: 18px 0 6px;
            white-space: nowrap;
            overflow: hidden;
        }

        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 22px 24px;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 4px rgba(0,0,0,.04);
        }
    </style>
</head>
<body class="bg-slate-50 antialiased" x-data="{ collapsed: false, mobileOpen: false }">

<div class="flex h-screen overflow-hidden">

    {{-- ════════════════════════════════
         SIDEBAR
    ════════════════════════════════ --}}
    <aside
        :class="collapsed ? 'w-[68px]' : 'w-[230px]'"
        class="sidebar hidden lg:flex flex-col flex-shrink-0 bg-[#0f172a] overflow-hidden relative z-30">

        {{-- Logo --}}
        <div class="flex items-center h-14 border-b border-white/[.06] px-4 overflow-hidden flex-shrink-0"
             :class="collapsed ? 'justify-center' : 'gap-3'">
            <div class="w-9 h-9 rounded-xl bg-green-500 flex items-center justify-center flex-shrink-0 shadow-lg shadow-green-900/40">
                <span class="text-white font-extrabold text-sm leading-none">7x</span>
            </div>
            <div class="sidebar-label overflow-hidden" :class="collapsed ? 'opacity-0 w-0' : 'opacity-100 w-auto'">
                <p class="font-bold text-white text-sm leading-tight">7x Basket</p>
                <p class="text-[11px] text-slate-400">Admin Panel</p>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 overflow-y-auto overflow-x-hidden px-2 py-3 space-y-0.5 scrollbar-none">

            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               :class="collapsed ? 'justify-center px-0' : 'gap-[11px]'">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75H15.75a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H3.75A.75.75 0 013 21V9.75z"/>
                </svg>
                <span class="sidebar-label" :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100'">Dashboard</span>
            </a>

            <a href="{{ route('admin.blogs.index') }}"
               class="nav-link {{ request()->routeIs('admin.blogs*') ? 'active' : '' }}"
               :class="collapsed ? 'justify-center px-0' : 'gap-[11px]'">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                </svg>
                <span class="sidebar-label" :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100'">Blogs</span>
            </a>

            <a href="{{ route('admin.seo.index') }}"
               class="nav-link {{ request()->routeIs('admin.seo*') ? 'active' : '' }}"
               :class="collapsed ? 'justify-center px-0' : 'gap-[11px]'">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0015.803 15.803z"/>
                </svg>
                <span class="sidebar-label" :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100'">SEO Manager</span>
            </a>

            <a href="{{ route('admin.applications.index') }}"
               class="nav-link {{ request()->routeIs('admin.applications*') ? 'active' : '' }}"
               :class="collapsed ? 'justify-center px-0' : 'gap-[11px]'">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/>
                </svg>
                <span class="sidebar-label" :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100'">Applications</span>
            </a>

            <a href="{{ route('admin.visitors.index') }}"
               class="nav-link {{ request()->routeIs('admin.visitors*') ? 'active' : '' }}"
               :class="collapsed ? 'justify-center px-0' : 'gap-[11px]'">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                </svg>
                <span class="sidebar-label" :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100'">Visitors</span>
            </a>

            <a href="{{ route('admin.blocked-ips.index') }}"
               class="nav-link {{ request()->routeIs('admin.blocked-ips*') ? 'active' : '' }}"
               :class="collapsed ? 'justify-center px-0' : 'gap-[11px]'">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                </svg>
                <span class="sidebar-label" :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100'">Blocked IPs</span>
            </a>

        </nav>

        {{-- Collapse toggle button — pinned to bottom --}}
        <div class="border-t border-white/[.06] px-2 py-2">
            <button @click="collapsed = !collapsed"
                    class="nav-link w-full text-slate-400 hover:text-white hover:bg-white/[.07]"
                    :class="collapsed ? 'justify-center px-0' : 'gap-[11px]'">
                <svg :class="collapsed ? 'rotate-180' : ''" class="w-[18px] h-[18px] transition-transform duration-200 flex-shrink-0"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M18 19l-7-7 7-7"/>
                </svg>
                <span class="sidebar-label text-[13.5px]" :class="collapsed ? 'opacity-0 w-0 overflow-hidden' : 'opacity-100'">Collapse</span>
            </button>
        </div>
    </aside>

    {{-- ── Mobile sidebar ── --}}
    <div x-show="mobileOpen" x-cloak class="lg:hidden fixed inset-0 z-50 flex">
        <div @click="mobileOpen = false" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <aside class="relative w-[230px] bg-[#0f172a] flex flex-col h-full z-10">
            {{-- same nav, always expanded on mobile --}}
            <div class="flex items-center gap-3 px-4 py-5 border-b border-white/[.06]">
                <div class="w-9 h-9 rounded-xl bg-green-500 flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-extrabold text-sm">7x</span>
                </div>
                <div>
                    <p class="font-bold text-white text-sm">7x Basket</p>
                    <p class="text-[11px] text-slate-400">Admin Panel</p>
                </div>
            </div>
            <nav class="flex-1 overflow-y-auto px-2 py-3 space-y-0.5">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75H15.75a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H3.75A.75.75 0 013 21V9.75z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    Blogs
                </a>
                <a href="{{ route('admin.seo.index') }}" class="nav-link {{ request()->routeIs('admin.seo*') ? 'active' : '' }}">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0015.803 15.803z"/></svg>
                    SEO Manager
                </a>
                <a href="{{ route('admin.applications.index') }}" class="nav-link {{ request()->routeIs('admin.applications*') ? 'active' : '' }}">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/></svg>
                    Applications
                </a>
                <a href="{{ route('admin.visitors.index') }}" class="nav-link {{ request()->routeIs('admin.visitors*') ? 'active' : '' }}">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                    Visitors
                </a>
                <a href="{{ route('admin.blocked-ips.index') }}" class="nav-link {{ request()->routeIs('admin.blocked-ips*') ? 'active' : '' }}">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                    Blocked IPs
                </a>
            </nav>
            <div class="border-t border-white/[.06] px-2 py-3">
                <p class="text-[11px] text-slate-500 px-3 py-2 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
        </aside>
    </div>

    {{-- ════════════════════════════════
         MAIN CONTENT
    ════════════════════════════════ --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        {{-- Top bar --}}
        <header class="flex items-center justify-between bg-white border-b border-gray-100 px-5 py-0 flex-shrink-0 shadow-sm h-14">
            <div class="flex items-center gap-3">
                {{-- Mobile hamburger --}}
                <button @click="mobileOpen = true"
                        class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div>
                    <h1 class="text-[15px] font-semibold text-gray-900 leading-tight">@yield('title', 'Dashboard')</h1>
                    <p class="text-[11px] text-gray-400 hidden sm:block">@yield('subtitle', 'Welcome back')</p>
                </div>
            </div>

            <div class="flex items-center gap-2">
                {{-- View Site --}}
                <a href="{{ route('home') }}" target="_blank"
                   class="hidden sm:flex items-center gap-1.5 text-xs font-medium text-gray-500
                          hover:text-green-600 bg-gray-50 hover:bg-green-50 border border-gray-200
                          hover:border-green-300 px-3 py-1.5 rounded-lg transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    View Site
                </a>

                {{-- User dropdown --}}
                <div x-data="{ userMenu: false }" class="relative">
                    <button @click="userMenu = !userMenu"
                            class="flex items-center gap-2.5 pl-2 pr-3 py-1.5 rounded-xl hover:bg-gray-50
                                   border border-transparent hover:border-gray-200 transition-all">
                        <div class="w-7 h-7 rounded-full bg-green-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="hidden sm:block text-left">
                            <p class="text-xs font-semibold text-gray-800 leading-tight">{{ auth()->user()->name ?? 'Admin' }}</p>
                            <p class="text-[10px] text-gray-400 leading-tight">Administrator</p>
                        </div>
                        <svg class="w-3.5 h-3.5 text-gray-400 hidden sm:block" :class="userMenu ? 'rotate-180' : ''"
                             style="transition: transform .2s"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Dropdown --}}
                    <div x-show="userMenu" x-cloak @click.outside="userMenu = false"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl
                                border border-gray-100 py-1.5 z-50 origin-top-right">

                        {{-- User info header --}}
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-400 mt-0.5 truncate">{{ auth()->user()->email ?? '' }}</p>
                        </div>

                        <div class="border-t border-gray-100 py-1.5">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="flex items-center gap-3 w-full px-4 py-2 text-sm text-red-500
                                               hover:bg-red-50 hover:text-red-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-cloak
             x-init="setTimeout(() => show = false, 4000)"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="mx-5 mt-4 flex items-center gap-3 bg-green-50 border border-green-200
                    text-green-800 px-4 py-3 rounded-xl text-sm font-medium shadow-sm">
            <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div x-data="{ show: true }" x-show="show" x-cloak
             x-init="setTimeout(() => show = false, 4000)"
             class="mx-5 mt-4 flex items-center gap-3 bg-red-50 border border-red-200
                    text-red-800 px-4 py-3 rounded-xl text-sm font-medium shadow-sm">
            <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            {{ session('error') }}
        </div>
        @endif

        <main class="flex-1 overflow-y-auto p-5">
            @yield('content')
        </main>
    </div>

</div>
</body>
</html>
