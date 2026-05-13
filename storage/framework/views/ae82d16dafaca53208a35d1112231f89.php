<?php $__env->startSection('header', 'Records Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-8">
    <p class="text-slate-400">Manage all Speeches, Motions, and Q&A records.</p>
    <a href="<?php echo e(route('admin.records.create')); ?>" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition-all shadow-lg shadow-indigo-500/20 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
        New Record
    </a>
</div>

<div class="bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden shadow-xl">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-900/50 text-slate-400 text-xs uppercase tracking-widest">
                <th class="px-6 py-4 font-bold">Type</th>
                <th class="px-6 py-4 font-bold">Subject</th>
                <th class="px-6 py-4 font-bold">Meeting/Session</th>
                <th class="px-6 py-4 font-bold">Participant(s)</th>
                <th class="px-6 py-4 font-bold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-700/50">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-slate-700/30 transition-colors group">
                <td class="px-6 py-4">
                    <span class="px-2 py-1 <?php echo e($record->type === 'speech' ? 'bg-amber-500/10 text-amber-400' : ($record->type === 'motion' ? 'bg-blue-500/10 text-blue-400' : 'bg-indigo-500/10 text-indigo-400')); ?> text-[10px] font-bold rounded-full uppercase tracking-tighter">
                        <?php echo e($record->type); ?>

                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="text-white font-medium group-hover:text-indigo-400 transition-colors">
                        <?php echo e(\Illuminate\Support\Str::limit($record->title ?: $record->subject, 60)); ?>

                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->title): ?>
                        <div class="text-slate-500 text-[10px] mt-1 uppercase tracking-tighter"><?php echo e($record->subject); ?></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="text-slate-500 text-xs mt-1">#<?php echo e($record->record_number ?? 'N/A'); ?></div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-slate-300 text-sm"><?php echo e($record->meeting->name); ?></div>
                    <div class="text-slate-500 text-xs"><?php echo e($record->meeting->session_number); ?></div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-slate-300 text-sm"><?php echo e($record->primaryParticipant->name); ?></div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->secondaryParticipant): ?>
                        <div class="text-slate-500 text-xs mt-1">with <?php echo e($record->secondaryParticipant->name); ?></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <a href="<?php echo e(route('admin.records.edit', $record)); ?>" class="p-2 text-slate-400 hover:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </a>
                        <a href="<?php echo e(route('admin.records.download', $record)); ?>" class="p-2 text-slate-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                        </a>
                        <form action="<?php echo e(route('admin.records.destroy', $record)); ?>" method="POST" onsubmit="return confirm('Delete this record?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="px-6 py-12 text-center">
                    <div class="text-slate-500 mb-2">No records found.</div>
                    <a href="<?php echo e(route('admin.records.create')); ?>" class="text-indigo-400 hover:underline">Create your first record</a>
                </td>
            </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>

<div class="mt-8">
    <?php echo e($records->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/records/index.blade.php ENDPATH**/ ?>