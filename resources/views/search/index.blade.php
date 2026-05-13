@extends('layouts.admin')

@section('header', 'Global Search Engine')

@section('content')
<div class="mb-12">
    <form action="{{ route('search.index') }}" method="GET" class="max-w-4xl mx-auto space-y-6">
        <!-- Search Bar -->
        <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-6 w-6 text-slate-500 group-focus-within:text-indigo-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" name="q" value="{{ request('q') }}" 
                placeholder="Search by keyword, topic, or participant name..." 
                class="w-full bg-slate-800/80 border-2 border-slate-700 rounded-2xl pl-12 pr-4 py-5 text-lg text-white placeholder-slate-500 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all shadow-xl">
            <button type="submit" class="absolute right-3 top-3 bottom-3 px-8 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/20">
                Search
            </button>
        </div>

        <!-- Advanced Filters -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <select name="meeting_id" class="bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none">
                <option value="">All Meetings</option>
                @foreach($meetings as $meeting)
                    <option value="{{ $meeting->id }}" {{ request('meeting_id') == $meeting->id ? 'selected' : '' }}>
                        {{ $meeting->name }} ({{ $meeting->session_number }})
                    </option>
                @endforeach
            </select>

            <input type="date" name="date_from" value="{{ request('date_from') }}" 
                class="bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none"
                placeholder="Date From">

            <input type="date" name="date_to" value="{{ request('date_to') }}" 
                class="bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none"
                placeholder="Date To">
        </div>
    </form>
</div>

<!-- Results Area -->
<div class="space-y-6 max-w-5xl mx-auto">
    @if(request()->has('q') || request()->has('meeting_id'))
        <div class="flex items-center justify-between mb-4 border-b border-slate-800 pb-2">
            <p class="text-slate-400">Found <span class="text-white font-semibold">{{ $results->total() }}</span> records matching your criteria.</p>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6">
        @forelse($results as $record)
            <div class="bg-slate-800/40 border border-slate-700 rounded-2xl p-6 hover:bg-slate-800/60 transition-all group overflow-hidden relative">
                <div class="absolute left-0 top-0 bottom-0 w-1 {{ $record->type === 'speech' ? 'bg-amber-500' : ($record->type === 'motion' ? 'bg-blue-500' : 'bg-indigo-500') }} opacity-0 group-hover:opacity-100 transition-opacity"></div>
                
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-indigo-500/10 text-indigo-400 text-xs font-bold rounded-full uppercase">
                                {{ $record->meeting->name }}
                            </span>
                            <span class="px-3 py-1 bg-slate-700 text-slate-300 text-xs font-medium rounded-full">
                                {{ $record->meeting->session_number }}
                            </span>
                            <span class="text-xs text-slate-500">
                                {{ \Carbon\Carbon::parse($record->meeting->date)->format('M d, Y') }}
                            </span>
                            <span class="ml-auto px-2 py-0.5 {{ $record->type === 'speech' ? 'bg-amber-500/10 text-amber-400' : ($record->type === 'motion' ? 'bg-blue-500/10 text-blue-400' : 'bg-indigo-500/10 text-indigo-400') }} text-[10px] font-bold rounded-full uppercase">
                                {{ $record->type }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-300 transition-colors">{{ $record->subject }}</h3>
                        <div class="flex flex-col space-y-4 mb-4">
                            <div class="bg-slate-900/40 p-4 rounded-xl border border-slate-700/50">
                                <p class="text-xs font-bold text-indigo-400 mb-1 uppercase tracking-wider">
                                    @if($record->type === 'speech') Speech by {{ $record->primaryParticipant->name }}
                                    @elseif($record->type === 'motion') Motion by {{ $record->primaryParticipant->name }}
                                    @else Question by {{ $record->primaryParticipant->name }} @endif
                                </p>
                                <p class="text-slate-300 leading-relaxed italic line-clamp-3">"{{ $record->content }}"</p>
                            </div>
                            @if($record->type === 'qa' && $record->secondary_content)
                            <div class="bg-emerald-500/5 p-4 rounded-xl border border-emerald-500/10">
                                <p class="text-xs font-bold text-emerald-400 mb-1 uppercase tracking-wider">Answer from {{ $record->secondaryParticipant->name }}:</p>
                                <p class="text-slate-300 leading-relaxed line-clamp-3">{{ $record->secondary_content }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.records.show', $record) }}" class="text-sm font-semibold text-indigo-400 hover:text-indigo-300 flex items-center gap-1">
                                View Full Details 
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </a>
                            <a href="{{ route('admin.records.download', $record) }}" class="text-sm font-semibold text-emerald-400 hover:text-emerald-300 flex items-center gap-1">
                                Download PDF
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            @if(request()->has('q'))
            <div class="py-20 text-center">
                <svg class="mx-auto h-12 w-12 text-slate-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-medium text-white mb-1">No results found</h3>
                <p class="text-slate-500">Try adjusting your search terms or filters.</p>
            </div>
            @endif
        @endforelse
    </div>

    <div class="mt-8">
        {{ $results->links() }}
    </div>
</div>
@endsection
