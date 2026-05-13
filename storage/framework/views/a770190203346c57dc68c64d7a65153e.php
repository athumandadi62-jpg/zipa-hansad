<?php $__env->startSection('header', 'Record Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl">
    <div class="mb-8 flex justify-between items-center">
        <a href="<?php echo e(route('admin.records.index')); ?>" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-sm">
            <span>← Back to Records</span>
        </a>
        <div class="flex gap-3">
            <a href="<?php echo e(route('admin.records.download', $record)); ?>" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-semibold transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" /></svg>
                Download PDF
            </a>
            <a href="<?php echo e(route('admin.records.edit', $record)); ?>" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-semibold transition-colors">
                Edit Record
            </a>
        </div>
    </div>

    <div class="bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden shadow-2xl">
        <!-- Header Section -->
        <div class="p-8 border-b border-slate-700 bg-slate-900/30">
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span class="px-3 py-1 <?php echo e($record->type === 'speech' ? 'bg-amber-500/10 text-amber-400' : ($record->type === 'motion' ? 'bg-blue-500/10 text-blue-400' : 'bg-indigo-500/10 text-indigo-400')); ?> text-xs font-bold rounded-full uppercase tracking-widest">
                    <?php echo e($record->type); ?>

                </span>
                <span class="px-3 py-1 bg-slate-700 text-slate-300 text-xs font-medium rounded-full">
                    <?php echo e($record->meeting->session_number); ?>

                </span>
                <span class="text-sm text-slate-500">
                    <?php echo e(\Carbon\Carbon::parse($record->meeting->date)->format('F d, Y')); ?>

                </span>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2"><?php echo e($record->title ?: $record->subject); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->title): ?>
                <h2 class="text-xl font-medium text-indigo-300 mb-2 uppercase tracking-wide"><?php echo e($record->subject); ?></h2>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <p class="text-slate-400">Record #<?php echo e($record->record_number ?? 'N/A'); ?> | <?php echo e($record->meeting->name); ?></p>
        </div>

        <!-- Participants Section -->
        <div class="grid grid-cols-1 <?php echo e($record->secondaryParticipant ? 'md:grid-cols-2' : ''); ?> divide-y md:divide-y-0 md:divide-x divide-slate-700">
            <div class="p-8">
                <p class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'speech'): ?> Speaker
                    <?php elseif($record->type === 'motion'): ?> Proposer
                    <?php else: ?> Questioner <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <h4 class="text-lg font-bold text-white"><?php echo e($record->primaryParticipant->name); ?></h4>
                <p class="text-slate-400 text-sm"><?php echo e($record->primaryParticipant->title); ?></p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->secondaryParticipant): ?>
            <div class="p-8">
                <p class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'motion'): ?> Seconder / Supporter
                    <?php else: ?> Respondent <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <h4 class="text-lg font-bold text-white"><?php echo e($record->secondaryParticipant->name); ?></h4>
                <p class="text-slate-400 text-sm"><?php echo e($record->secondaryParticipant->title); ?></p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Content Section -->
        <div class="p-8 space-y-12">
            <div>
                <h4 class="text-sm font-bold text-indigo-300 mb-4 border-l-4 border-indigo-500 pl-4 uppercase tracking-wider">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'qa'): ?> The Question
                    <?php elseif($record->type === 'motion'): ?> The Motion
                    <?php else: ?> Speech Body <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </h4>
                <div class="prose prose-invert max-w-none text-slate-200 leading-relaxed text-lg whitespace-pre-wrap">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'qa'): ?>"<?php echo e($record->content); ?>"<?php else: ?><?php echo e($record->content); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->type === 'qa' && $record->secondary_content): ?>
            <div>
                <h4 class="text-sm font-bold text-emerald-300 mb-4 border-l-4 border-emerald-500 pl-4 uppercase tracking-wider">The Answer</h4>
                <div class="prose prose-invert max-w-none text-slate-200 leading-relaxed text-lg">
                    <?php echo e($record->secondary_content); ?>

                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->tags): ?>
            <div class="pt-8 border-t border-slate-700/50">
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = explode(',', $record->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="px-3 py-1 bg-slate-700/50 text-slate-400 text-xs rounded-lg hover:bg-slate-700 transition-colors cursor-pointer">
                            #<?php echo e(trim($tag)); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/records/show.blade.php ENDPATH**/ ?>