<?php $__env->startSection('header', 'Meeting Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb & Actions -->
    <div class="mb-8 flex justify-between items-center">
        <a href="<?php echo e(route('admin.meetings.index')); ?>" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-sm group">
            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Meetings
        </a>
        <div class="flex gap-3">
            <a href="<?php echo e(route('admin.meetings.edit', $meeting)); ?>" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold transition-all hover:scale-105 active:scale-95 shadow-lg shadow-indigo-600/20">
                Edit Meeting
            </a>
        </div>
    </div>

    <!-- Meeting Info Card -->
    <div class="bg-slate-800/50 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl mb-12">
        <div class="p-8 border-b border-slate-700 bg-slate-900/30">
            <div class="flex flex-wrap items-center gap-3 mb-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-bold uppercase tracking-wider">
                    Session #<?php echo e($meeting->session_number ?? 'N/A'); ?>

                </div>
                <div class="flex items-center gap-2 text-slate-400 text-sm">
                    <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <?php echo e(\Carbon\Carbon::parse($meeting->date)->format('F d, Y')); ?>

                </div>
                <div class="flex items-center gap-2 text-slate-400 text-sm ml-4">
                    <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <?php echo e($meeting->location ?? 'To be announced'); ?>

                </div>
            </div>
            <h1 class="text-3xl font-bold text-white"><?php echo e($meeting->name); ?></h1>
        </div>

        <!-- Progress/Stats Summary (Optional) -->
        <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-700">
            <div class="p-8">
                <p class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-2">Total Hansad Records</p>
                <h4 class="text-3xl font-bold text-white"><?php echo e($meeting->records_count ?? $meeting->records->count()); ?></h4>
            </div>
            <div class="p-8">
                <p class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-2">Last Updated</p>
                <h4 class="text-lg font-bold text-white"><?php echo e($meeting->updated_at->diffForHumans()); ?></h4>
            </div>
        </div>
    </div>

    <!-- Related Records Table -->
    <div class="mb-6 flex items-center justify-between">
        <h3 class="text-xl font-bold text-white">Hansad Records for this Meeting</h3>
        <a href="<?php echo e(route('admin.records.create', ['meeting_id' => $meeting->id])); ?>" class="text-indigo-400 hover:text-indigo-300 text-sm font-semibold transition-colors flex items-center gap-2">
            <span>+ Add New Record</span>
        </a>
    </div>

    <div class="bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-900/50 border-b border-slate-700">
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Subject/Title</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Participant</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $meeting->records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-slate-700/30 transition-colors">
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 <?php echo e($record->type === 'speech' ? 'bg-amber-500/10 text-amber-400' : ($record->type === 'motion' ? 'bg-blue-500/10 text-blue-400' : 'bg-indigo-500/10 text-indigo-400')); ?> text-[10px] font-bold rounded-lg uppercase tracking-widest">
                            <?php echo e($record->type); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-white truncate max-w-xs"><?php echo e($record->title ?: $record->subject); ?></div>
                        <div class="text-xs text-slate-500 truncate max-w-xs"><?php echo e($record->subject); ?></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-slate-300"><?php echo e($record->primaryParticipant->name); ?></div>
                        <div class="text-xs text-slate-500"><?php echo e($record->primaryParticipant->title); ?></div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-3">
                            <a href="<?php echo e(route('admin.records.show', $record)); ?>" class="text-indigo-400 hover:text-indigo-300 transition-colors text-xs font-bold uppercase tracking-widest">View</a>
                            <a href="<?php echo e(route('admin.records.edit', $record)); ?>" class="text-slate-400 hover:text-white transition-colors text-xs font-bold uppercase tracking-widest">Edit</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                        No records have been posted for this meeting yet.
                    </td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/meetings/show.blade.php ENDPATH**/ ?>