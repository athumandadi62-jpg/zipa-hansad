@extends('layouts.admin')

@section('header', 'Record Details')

@section('content')
<div class="max-w-4xl">
    <div class="mb-8 flex justify-between items-center">
        <a href="{{ route('admin.records.index') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-sm">
            <span>← Back to Records</span>
        </a>
        <div class="flex gap-3">
            <a href="{{ route('admin.records.download', $record) }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-semibold transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" /></svg>
                Download PDF
            </a>
            <a href="{{ route('admin.records.edit', $record) }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-semibold transition-colors">
                Edit Record
            </a>
        </div>
    </div>

    <div class="bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden shadow-2xl">
        <!-- Header Section -->
        <div class="p-8 border-b border-slate-700 bg-slate-900/30">
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span class="px-3 py-1 {{ $record->type === 'speech' ? 'bg-amber-500/10 text-amber-400' : ($record->type === 'motion' ? 'bg-blue-500/10 text-blue-400' : 'bg-indigo-500/10 text-indigo-400') }} text-xs font-bold rounded-full uppercase tracking-widest">
                    {{ $record->type }}
                </span>
                <span class="px-3 py-1 bg-slate-700 text-slate-300 text-xs font-medium rounded-full">
                    {{ $record->meeting->session_number }}
                </span>
                <span class="text-sm text-slate-500">
                    {{ \Carbon\Carbon::parse($record->meeting->date)->format('F d, Y') }}
                </span>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">{{ $record->title ?: $record->subject }}</h1>
            @if($record->title)
                <h2 class="text-xl font-medium text-indigo-300 mb-2 uppercase tracking-wide">{{ $record->subject }}</h2>
            @endif
            <p class="text-slate-400">Record #{{ $record->record_number ?? 'N/A' }} | {{ $record->meeting->name }}</p>
        </div>

        <!-- Participants Section -->
        <div class="grid grid-cols-1 {{ $record->secondaryParticipant ? 'md:grid-cols-2' : '' }} divide-y md:divide-y-0 md:divide-x divide-slate-700">
            <div class="p-8">
                <p class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-3">
                    @if($record->type === 'speech') Speaker
                    @elseif($record->type === 'motion') Proposer
                    @else Questioner @endif
                </p>
                <h4 class="text-lg font-bold text-white">{{ $record->primaryParticipant->name }}</h4>
                <p class="text-slate-400 text-sm">{{ $record->primaryParticipant->title }}</p>
            </div>
            @if($record->secondaryParticipant)
            <div class="p-8">
                <p class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-3">
                    @if($record->type === 'motion') Seconder / Supporter
                    @else Respondent @endif
                </p>
                <h4 class="text-lg font-bold text-white">{{ $record->secondaryParticipant->name }}</h4>
                <p class="text-slate-400 text-sm">{{ $record->secondaryParticipant->title }}</p>
            </div>
            @endif
        </div>

        <!-- Content Section -->
        <div class="p-8 space-y-12">
            <div>
                <h4 class="text-sm font-bold text-indigo-300 mb-4 border-l-4 border-indigo-500 pl-4 uppercase tracking-wider">
                    @if($record->type === 'qa') The Question
                    @elseif($record->type === 'motion') The Motion
                    @else Speech Body @endif
                </h4>
                <div class="prose prose-invert max-w-none text-slate-200 leading-relaxed text-lg whitespace-pre-wrap">
                    @if($record->type === 'qa')"{{ $record->content }}"@else{{ $record->content }}@endif
                </div>
            </div>

            @if($record->type === 'qa' && $record->secondary_content)
            <div>
                <h4 class="text-sm font-bold text-emerald-300 mb-4 border-l-4 border-emerald-500 pl-4 uppercase tracking-wider">The Answer</h4>
                <div class="prose prose-invert max-w-none text-slate-200 leading-relaxed text-lg">
                    {{ $record->secondary_content }}
                </div>
            </div>
            @endif

            @if($record->tags)
            <div class="pt-8 border-t border-slate-700/50">
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $record->tags) as $tag)
                        <span class="px-3 py-1 bg-slate-700/50 text-slate-400 text-xs rounded-lg hover:bg-slate-700 transition-colors cursor-pointer">
                            #{{ trim($tag) }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
