@extends('layouts.admin')

@section('header', 'System Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Stats Cards -->
    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700">
        <p class="text-slate-400 text-sm font-medium">Total Meetings</p>
        <h3 class="text-3xl font-bold mt-2">{{ $totalMeetings }}</h3>
        <p class="text-xs text-indigo-400 mt-2">Active Sessions</p>
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700">
        <p class="text-slate-400 text-sm font-medium">Participants</p>
        <h3 class="text-3xl font-bold mt-2">{{ $totalParticipants }}</h3>
        <p class="text-xs text-purple-400 mt-2">Verified Representatives</p>
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700">
        <p class="text-slate-400 text-sm font-medium">Q&A Repository</p>
        <h3 class="text-3xl font-bold mt-2">{{ $totalRecords }}</h3>
        <p class="text-xs text-emerald-400 mt-2">Transcribed records</p>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700 min-h-[300px]">
        <h3 class="font-semibold text-white mb-4">Recent Records</h3>
        @if($recentRecords->count() > 0)
            <div class="space-y-4">
                @foreach($recentRecords as $record)
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-slate-700/50 transition-colors">
                        <div>
                            <p class="text-sm font-medium text-white">{{ $record->subject }}</p>
                            <p class="text-xs text-slate-400">{{ $record->primaryParticipant->name ?? 'Unknown' }} • {{ $record->type }}</p>
                        </div>
                        <a href="{{ route('admin.records.show', $record) }}" class="text-xs text-indigo-400 hover:text-indigo-300">View</a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-48 text-slate-500">
                <p>No records found in the system yet.</p>
            </div>
        @endif
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700 min-h-[300px]">
        <h3 class="font-semibold text-white mb-4">Upcoming Meetings</h3>
        @if($upcomingMeetings->count() > 0)
            <div class="space-y-4">
                @foreach($upcomingMeetings as $meeting)
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-slate-700/50 transition-colors">
                        <div>
                            <p class="text-sm font-medium text-white">{{ $meeting->name }}</p>
                            <p class="text-xs text-slate-400">{{ $meeting->date ? date('M d, Y', strtotime($meeting->date)) : 'N/A' }} • {{ $meeting->session_number }}</p>
                        </div>
                        <a href="{{ route('admin.meetings.show', $meeting) }}" class="text-xs text-indigo-400 hover:text-indigo-300">Details</a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-48 text-slate-500">
                <p>No scheduled meetings.</p>
            </div>
        @endif
    </div>
</div>
@endsection
