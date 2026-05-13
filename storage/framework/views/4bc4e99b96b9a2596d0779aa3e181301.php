<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo e($question->subject); ?></title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #4f46e5;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #4f46e5;
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }
        .meta-info {
            background-color: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .meta-grid {
            width: 100%;
            border-collapse: collapse;
        }
        .meta-grid td {
            padding: 5px 0;
            vertical-align: top;
        }
        .label {
            font-weight: bold;
            color: #64748b;
            width: 150px;
        }
        .content-section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #4f46e5;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            border-left: 4px solid #4f46e5;
            padding-left: 10px;
        }
        .question-box {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 15px;
            border-radius: 8px;
            font-style: italic;
        }
        .answer-box {
            background-color: #ecfdf5;
            border: 1px solid #bbf7d0;
            padding: 15px;
            border-radius: 8px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>HANSAD Q&A RECORD</h1>
    </div>

    <div class="meta-info">
        <table class="meta-grid">
            <tr>
                <td class="label">Subject:</td>
                <td><strong><?php echo e($question->subject); ?></strong></td>
            </tr>
            <tr>
                <td class="label">Meeting:</td>
                <td><?php echo e($question->meeting->name); ?></td>
            </tr>
            <tr>
                <td class="label">Session:</td>
                <td><?php echo e($question->meeting->session_number); ?></td>
            </tr>
            <tr>
                <td class="label">Date:</td>
                <td><?php echo e(\Carbon\Carbon::parse($question->meeting->date)->format('M d, Y')); ?></td>
            </tr>
            <tr>
                <td class="label">Questioner:</td>
                <td><?php echo e($question->questioner->name); ?></td>
            </tr>
            <tr>
                <td class="label">Respondent:</td>
                <td><?php echo e($question->respondent->name); ?></td>
            </tr>
        </table>
    </div>

    <div class="content-section">
        <div class="section-title">Question</div>
        <div class="question-box">
            "<?php echo e($question->question_text); ?>"
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($question->answer_text): ?>
    <div class="content-section">
        <div class="section-title">Answer</div>
        <div class="answer-box">
            <?php echo e($question->answer_text); ?>

        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="footer">
        Generated on <?php echo e(now()->format('M d, Y H:i')); ?> | Hansad Reporting System
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/questions/pdf.blade.php ENDPATH**/ ?>