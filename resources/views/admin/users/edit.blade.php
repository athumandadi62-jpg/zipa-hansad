@extends('layouts.admin')

@section('header', 'Edit User Record')

@section('content')
<div class="max-w-4xl">
    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('admin.users.index') }}" class="text-slate-400 hover:text-white transition-colors flex items-center space-x-2 text-sm">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Back to Users</span>
        </a>
        <div class="h-10 w-10 rounded-full bg-slate-700 flex items-center justify-center text-slate-400 font-bold ring-2 ring-slate-800">
            {{ substr($user->full_name, 0, 2) }}
        </div>
    </div>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 backdrop-blur-sm shadow-xl">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center">
                <span class="bg-indigo-500 h-6 w-1 rounded-full mr-3"></span>
                Account Profiles
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Full Name <span class="text-rose-500">*</span></label>
                    <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                    @error('full_name') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                    @error('username') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Email Address <span class="text-rose-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                    @error('email') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Phone Number -->
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                    @error('phone_number') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <h3 class="text-lg font-bold text-white mt-12 mb-6 flex items-center">
                <span class="bg-indigo-500 h-6 w-1 rounded-full mr-3"></span>
                Role Management
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Role Selection -->
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">System Role <span class="text-rose-500">*</span></label>
                    <select name="role" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                        <option value="staff" {{ old('role', $user->role) === 'staff' ? 'selected' : '' }}>Staff (Standard User)</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrator (System Owner)</option>
                    </select>
                    @error('role') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <h3 class="text-lg font-bold text-white mt-12 mb-2 flex items-center">
                <span class="bg-indigo-500 h-6 w-1 rounded-full mr-3"></span>
                Security Update
            </h3>
            <p class="text-slate-500 text-xs mb-6">Leave password fields empty to keep current password.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Password -->
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">New Password</label>
                    <input type="password" name="password"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all"
                        placeholder="••••••••">
                    @error('password') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all"
                        placeholder="••••••••">
                </div>
            </div>

            <div class="mt-12 flex justify-end space-x-4">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-3 rounded-xl transition-all shadow-lg shadow-indigo-500/20 font-bold">
                    Update User Account
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
