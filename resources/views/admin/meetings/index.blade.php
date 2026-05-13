@extends('layouts.admin')

@section('header', 'Meetings Management')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-xl font-semibold text-white">All Meetings</h2>
    <a href="{{ route('admin.meetings.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors flex items-center gap-2">
        <span>+ New Meeting</span>
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl">
    {{ session('success') }}
</div>
@endif

<div class="bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-900/50 border-b border-slate-700">
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Meeting Name</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Session</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Date</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Location</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-700">
            @forelse($meetings as $meeting)
            <tr class="hover:bg-slate-700/30 transition-colors">
                <td class="px-6 py-4 font-medium text-white">{{ $meeting->name }}</td>
                <td class="px-6 py-4 text-slate-300">{{ $meeting->session_number ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-slate-300">{{ \Carbon\Carbon::parse($meeting->date)->format('M d, Y') }}</td>
                <td class="px-6 py-4 text-slate-300">{{ $meeting->location ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('admin.meetings.edit', $meeting) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors text-sm font-medium">Edit</a>
                        <form action="{{ route('admin.meetings.destroy', $meeting) }}" method="POST" onsubmit="return confirm('Delete this meeting?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-400 hover:text-rose-300 transition-colors text-sm font-medium">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                    No meetings found. Create your first meeting to get started.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $meetings->links() }}
</div>
@endsection
