<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Hansad Q&A') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#6366f1',
                            secondary: '#0f172a',
                        },
                        fontFamily: {
                            sans: ['Outfit', 'sans-serif'],
                        },
                    }
                }
            }
        </script>

        <style>
            .glass {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .sidebar-link-active {
                background: linear-gradient(to right, rgba(99, 102, 241, 0.1), transparent);
                border-left: 4px solid #6366f1;
            }
        </style>

        @livewireStyles
    </head>
    <body class="bg-[#0f172a] text-slate-200 antialiased">
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            <aside class="w-64 bg-[#1e293b] border-r border-slate-800 flex flex-col">
                <div class="p-6">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">HANSAD</h2>
                </div>
                
                <nav class="flex-1 px-4 space-y-2 mt-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-xl transition-all {{ request()->routeIs('dashboard') || request()->routeIs('*.dashboard') ? 'sidebar-link-active text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('search.index') }}" class="flex items-center space-x-3 p-3 rounded-xl transition-all {{ request()->routeIs('search.index') ? 'sidebar-link-active text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <span>Global Search</span>
                    </a>
                    
                    @if(auth()->user()->role === 'admin')
                    <div class="pt-4 pb-2 px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Management</div>
                    
                    <a href="{{ route('admin.meetings.index') }}" class="flex items-center space-x-3 p-3 rounded-xl transition-all {{ request()->routeIs('admin.meetings.*') ? 'sidebar-link-active text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <span>Meetings</span>
                    </a>
                    <a href="{{ route('admin.participants.index') }}" class="flex items-center space-x-3 p-3 rounded-xl transition-all {{ request()->routeIs('admin.participants.*') ? 'sidebar-link-active text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <span>Participants</span>
                    </a>
                    <a href="{{ route('admin.records.index') }}" class="flex items-center space-x-3 p-3 rounded-xl transition-all {{ request()->routeIs('admin.records.*') ? 'sidebar-link-active text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <span>Hansad Records</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 p-3 rounded-xl transition-all {{ request()->routeIs('admin.users.*') ? 'sidebar-link-active text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        <span>User Management</span>
                    </a>
                    @endif
                </nav>

                <div class="p-4 border-t border-slate-800">
                    <div class="flex items-center space-x-3 px-3 py-2">
                        <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center font-bold text-xs">
                            {{ substr(auth()->user()->full_name ?? 'U', 0, 1) }}
                        </div>
                        <div class="flex-1 overflow-hidden">
                            <p class="text-sm font-medium truncate">{{ auth()->user()->full_name ?? 'User' }}</p>
                            <p class="text-xs text-slate-500 truncate">{{ auth()->user()->role ?? 'Staff' }}</p>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 flex flex-col overflow-hidden">
                <header class="h-16 border-b border-slate-800 bg-[#0f172a]/50 backdrop-blur-md flex items-center justify-between px-8">
                    <h1 class="text-lg font-semibold text-white">@yield('header', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-slate-400 hover:text-white transition-colors">Logout</button>
                        </form>
                    </div>
                </header>

                <div class="flex-1 overflow-y-auto p-8">
                    @yield('content')
                </div>
            </main>
        </div>

        @livewireScripts
    </body>
</html>
