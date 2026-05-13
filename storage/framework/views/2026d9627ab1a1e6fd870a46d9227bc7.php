<?php $__env->startSection('header', 'User Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-8 flex justify-between items-center">
    <div class="flex items-center space-x-4">
        <h3 class="text-xl font-bold text-white">System Users</h3>
        <span class="px-3 py-1 bg-slate-800 text-slate-400 text-xs rounded-full border border-slate-700"> Total: <?php echo e($users->total()); ?> </span>
    </div>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl transition-all shadow-lg shadow-indigo-500/20">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        <span class="font-semibold">Add New User</span>
    </a>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl flex items-center space-x-3">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span><?php echo e(session('success')); ?></span>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div class="bg-slate-800/50 rounded-2xl border border-slate-700 overflow-hidden backdrop-blur-sm">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-800/50">
            <tr>
                <th class="px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">User Info</th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Role</th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Username</th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-700/50">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-slate-700/30 transition-colors group">
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 rounded-full bg-slate-700 flex items-center justify-center text-slate-400 font-bold uppercase ring-2 ring-slate-800">
                            <?php echo e(substr($user->full_name, 0, 2)); ?>

                        </div>
                        <div>
                            <p class="text-white font-medium"><?php echo e($user->full_name); ?></p>
                            <p class="text-slate-500 text-xs"><?php echo e($user->email); ?></p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-bold rounded-full <?php echo e($user->role === 'admin' ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20' : 'bg-slate-700 text-slate-400 border border-slate-600'); ?>">
                        <?php echo e(ucfirst($user->role)); ?>

                    </span>
                </td>
                <td class="px-6 py-4 text-slate-300 text-sm font-mono">
                    <?php echo e($user->username ?? 'N/A'); ?>

                </td>
                <td class="px-6 py-4">
                    <p class="text-slate-400 text-sm"><?php echo e($user->phone_number ?? 'No Phone'); ?></p>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end space-x-2 transition-all">
                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="p-2 text-slate-400 hover:text-white hover:bg-slate-700 rounded-lg transition-all">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->id !== auth()->id()): ?>
                        <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" onsubmit="return confirm('Silencer? This action cannot be undone.');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 hover:bg-rose-400/10 rounded-lg transition-all">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-slate-500 italic">
                    No users found in the system.
                </td>
            </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->hasPages()): ?>
    <div class="px-6 py-4 bg-slate-800/30 border-t border-slate-700">
        <?php echo e($users->links()); ?>

    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/users/index.blade.php ENDPATH**/ ?>