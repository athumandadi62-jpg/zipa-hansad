<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $record->title ?: $record->subject }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; line-height: 1.6; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #4f46e5; padding-bottom: 10px; margin-bottom: 30px; }
        .header h1 { color: #4f46e5; margin: 0; font-size: 24px; text-transform: uppercase; }
        .type-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 10px; font-weight: bold; text-transform: uppercase; background: #e0e7ff; color: #4338ca; margin-bottom: 10px; }
        .meta-info { background-color: #f8fafc; padding: 15px; border-radius: 8px; margin-bottom: 30px; }
        .meta-grid { width: 100%; border-collapse: collapse; }
        .meta-grid td { padding: 5px 0; vertical-align: top; }
        .label { font-weight: bold; color: #64748b; width: 150px; }
        .content-section { margin-bottom: 30px; }
        .section-title { font-size: 14px; font-weight: bold; color: #4f46e5; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; border-left: 4px solid #4f46e5; padding-left: 10px; }
        .content-box { background-color: #f1f5f9; border: 1px solid #e2e8f0; padding: 15px; border-radius: 8px; }
        .qa-question { background-color: #eff6ff; border: 1px solid #bfdbfe; font-style: italic; }
        .qa-answer { background-color: #ecfdf5; border: 1px solid #bbf7d0; margin-top: 15px; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="type-badge">{{ $record->type }}</div>
        <h1>HANSAD OFFICIAL RECORD</h1>
    </div>

    <div class="meta-info">
        <table class="meta-grid">
            @if($record->title)
                <tr><td class="label">Title:</td><td><strong>{{ $record->title }}</strong></td></tr>
                <tr><td class="label">Subject/Heading:</td><td>{{ $record->subject }}</td></tr>
            @else
                <tr><td class="label">Subject:</td><td><strong>{{ $record->subject }}</strong></td></tr>
            @endif
            <tr><td class="label">Meeting:</td><td>{{ $record->meeting->name }}</td></tr>
            <tr><td class="label">Session:</td><td>{{ $record->meeting->session_number }}</td></tr>
            <tr><td class="label">Date:</td><td>{{ \Carbon\Carbon::parse($record->meeting->date)->format('M d, Y') }}</td></tr>
            <tr>
                <td class="label">
                    @if($record->type === 'speech') Speaker:
                    @elseif($record->type === 'motion') Proposer:
                    @else Questioner:
                    @endif
                </td>
                <td>{{ $record->primaryParticipant->name }} ({{ $record->primaryParticipant->title }})</td>
            </tr>
            @if($record->secondaryParticipant)
            <tr>
                <td class="label">
                    @if($record->type === 'motion') Seconder:
                    @else Respondent:
                    @endif
                </td>
                <td>{{ $record->secondaryParticipant->name }} ({{ $record->secondaryParticipant->title }})</td>
            </tr>
            @endif
        </table>
    </div>

    <div class="content-section">
        <div class="section-title">
            @if($record->type === 'qa') The Question
            @elseif($record->type === 'motion') Motion Text
            @else Speech Content
            @endif
        </div>
        <div class="content-box {{ $record->type === 'qa' ? 'qa-question' : '' }}">
            @if($record->type === 'qa')"{{ $record->content }}"@else{!! nl2br(e($record->content)) !!}@endif
        </div>
    </div>

    @if($record->type === 'qa' && $record->secondary_content)
    <div class="content-section">
        <div class="section-title">The Answer</div>
        <div class="content-box qa-answer">
            {{ $record->secondary_content }}
        </div>
    </div>
    @endif

    <div class="footer">
        Generated on {{ now()->format('M d, Y H:i') }} | Hansad Digitization System
    </div>
</body>
</html>
