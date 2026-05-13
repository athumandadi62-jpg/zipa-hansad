<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo e($record->title ?: $record->subject); ?></title>
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
        <div class="type-badge"><?php echo e($record->type); ?></div>
        <h1>HANSAD OFFICIAL RECORD</h1>
    </div>

    <div class="meta-info">
        <table class="meta-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->title): ?>
                <tr><td class="label">Title:</td><td><strong><?php echo e($record->title); ?></strong></td></tr>
                <tr><td class="label">Subject/Heading:</td><td><?php echo e($record->subject); ?></td></tr>
            <?php else: ?>
                <tr><td class="label">Subject:</td><td><strong><?php echo e($record->subject); ?></strong></td></tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <tr><td class="label">Meeting:</td><td><?php echo e($record->meeting->name); ?></td></tr>
            <tr><td class="label">Session:</td><td><?php echo e($record->meeting->session_number); ?></td></tr>
            <tr><td class="label">Date:</td><td><?php echo e(\Carbon\Carbon::parse($record->meeting->date)->format('M d, Y')); ?></td></tr>
            <tr>
                <td class="label">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'speech'): ?> Speaker:
                    <?php elseif($record->type === 'motion'): ?> Proposer:
                    <?php else: ?> Questioner:
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td><?php echo e($record->primaryParticipant->name); ?> (<?php echo e($record->primaryParticipant->title); ?>)</td>
            </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->secondaryParticipant): ?>
            <tr>
                <td class="label">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'motion'): ?> Seconder:
                    <?php else: ?> Respondent:
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td><?php echo e($record->secondaryParticipant->name); ?> (<?php echo e($record->secondaryParticipant->title); ?>)</td>
            </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </table>
    </div>

    <div class="content-section">
        <div class="section-title">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'qa'): ?> The Question
            <?php elseif($record->type === 'motion'): ?> Motion Text
            <?php else: ?> Speech Content
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div class="content-box <?php echo e($record->type === 'qa' ? 'qa-question' : ''); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'qa'): ?>"<?php echo e($record->content); ?>"<?php else: ?><?php echo nl2br(e($record->content)); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'qa' && $record->secondary_content): ?>
    <div class="content-section">
        <div class="section-title">The Answer</div>
        <div class="content-box qa-answer">
            <?php echo e($record->secondary_content); ?>

        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="footer">
        Generated on <?php echo e(now()->format('M d, Y H:i')); ?> | Hansad Digitization System
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/records/pdf.blade.php ENDPATH**/ ?>