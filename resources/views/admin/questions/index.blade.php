@extends('layouts.admin')

@section('header', 'Questions Repository')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-xl font-semibold text-white">All Questions</h2>
    <a href="{{ route('admin.questions.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors flex items-center gap-2">
        <span>+ New Question</span>
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
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">#</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Subject</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Meeting</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Questioner</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-700">
            @forelse($questions as $question)
            <tr class="hover:bg-slate-700/30 transition-colors">
                <td class="px-6 py-4 text-slate-300">{{ $question->question_number ?? '-' }}</td>
                <td class="px-6 py-4 font-medium text-white">{{ $question->subject }}</td>
                <td class="px-6 py-4 text-slate-300 text-sm">
                    {{ $question->meeting->name }}<br>
                    <span class="text-xs text-slate-500">{{ $question->meeting->session_number }}</span>
                </td>
                <td class="px-6 py-4 text-slate-300 text-sm">
                    {{ $question->questioner->name }}
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('admin.questions.edit', $question) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors text-sm font-medium">Edit</a>
                        <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Delete this record?');">
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
                    No questions recorded yet.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $questions->links() }}
</div>
@endsection
