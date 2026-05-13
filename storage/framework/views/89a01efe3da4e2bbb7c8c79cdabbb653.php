<?php $__env->startSection('header', 'Participants Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-8">
    <h2 class="text-xl font-semibold text-white">All Participants</h2>
    <a href="<?php echo e(route('admin.participants.create')); ?>" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors flex items-center gap-2">
        <span>+ New Participant</span>
    </a>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
<div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div class="bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-900/50 border-b border-slate-700">
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Name</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400">Title / Office</th>
                <th class="px-6 py-4 text-sm font-semibold text-slate-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-700">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-slate-700/30 transition-colors">
                <td class="px-6 py-4 font-medium text-white"><?php echo e($participant->name); ?></td>
                <td class="px-6 py-4 text-slate-300"><?php echo e($participant->title ?? 'N/A'); ?></td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-3">
                        <a href="<?php echo e(route('admin.participants.edit', $participant)); ?>" class="text-indigo-400 hover:text-indigo-300 transition-colors text-sm font-medium">Edit</a>
                        <form action="<?php echo e(route('admin.participants.destroy', $participant)); ?>" method="POST" onsubmit="return confirm('Delete this participant?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-rose-400 hover:text-rose-300 transition-colors text-sm font-medium">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="px-6 py-12 text-center text-slate-500">
                    No participants found.
                </td>
            </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>

<div class="mt-6">
    <?php echo e($participants->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/participants/index.blade.php ENDPATH**/ ?>