@extends('layouts.admin')

@section('header', 'Create Participant')

@section('content')
<div class="max-w-2xl">
    <div class="mb-8">
        <a href="{{ route('admin.participants.index') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-sm">
            <span>← Back to List</span>
        </a>
    </div>

    <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700">
        <form action="{{ route('admin.participants.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-slate-400 mb-2">Participant Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all"
                    placeholder="e.g. Mhe. Dkt. Saada Mkuya Salum">
                @error('name') <p class="mt-2 text-rose-400 text-xs">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-slate-400 mb-2">Title / Office</label>
                <input type="text" name="title" id="title"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all"
                    placeholder="e.g. Waziri wa Nchi">
                @error('title') <p class="mt-2 text-rose-400 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 text-right">
                <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all hover:translate-y-[-2px] hover:shadow-lg hover:shadow-indigo-500/20">
                    Create Participant
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
