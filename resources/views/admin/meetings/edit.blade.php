@extends('layouts.admin')

@section('header', 'Edit Meeting')

@section('content')
<div class="max-w-2xl">
    <div class="mb-8">
        <a href="{{ route('admin.meetings.index') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-sm">
            <span>← Back to List</span>
        </a>
    </div>

    <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700">
        <form action="{{ route('admin.meetings.update', $meeting) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-slate-400 mb-2">Meeting Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $meeting->name) }}" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                @error('name') <p class="mt-2 text-rose-400 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="session_number" class="block text-sm font-medium text-slate-400 mb-2">Session Number</label>
                    <input type="text" name="session_number" id="session_number" value="{{ old('session_number', $meeting->session_number) }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                    @error('session_number') <p class="mt-2 text-rose-400 text-xs">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="date" class="block text-sm font-medium text-slate-400 mb-2">Meeting Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date', $meeting->date) }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                    @error('date') <p class="mt-2 text-rose-400 text-xs">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-slate-400 mb-2">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location', $meeting->location) }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                @error('location') <p class="mt-2 text-rose-400 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 text-right">
                <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all hover:translate-y-[-2px] hover:shadow-lg hover:shadow-indigo-500/20">
                    Update Meeting
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
