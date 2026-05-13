<?php $__env->startSection('header', 'System Overview'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Stats Cards -->
    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700">
        <p class="text-slate-400 text-sm font-medium">Total Meetings</p>
        <h3 class="text-3xl font-bold mt-2"><?php echo e($totalMeetings); ?></h3>
        <p class="text-xs text-indigo-400 mt-2">Active Sessions</p>
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700">
        <p class="text-slate-400 text-sm font-medium">Participants</p>
        <h3 class="text-3xl font-bold mt-2"><?php echo e($totalParticipants); ?></h3>
        <p class="text-xs text-purple-400 mt-2">Verified Representatives</p>
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700">
        <p class="text-slate-400 text-sm font-medium">Q&A Repository</p>
        <h3 class="text-3xl font-bold mt-2"><?php echo e($totalRecords); ?></h3>
        <p class="text-xs text-emerald-400 mt-2">Transcribed records</p>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700 min-h-[300px]">
        <h3 class="font-semibold text-white mb-4">Recent Records</h3>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recentRecords->count() > 0): ?>
            <div class="space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-slate-700/50 transition-colors">
                        <div>
                            <p class="text-sm font-medium text-white"><?php echo e($record->subject); ?></p>
                            <p class="text-xs text-slate-400"><?php echo e($record->primaryParticipant->name ?? 'Unknown'); ?> • <?php echo e($record->type); ?></p>
                        </div>
                        <a href="<?php echo e(route('admin.records.show', $record)); ?>" class="text-xs text-indigo-400 hover:text-indigo-300">View</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php else: ?>
            <div class="flex flex-col items-center justify-center h-48 text-slate-500">
                <p>No records found in the system yet.</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700 min-h-[300px]">
        <h3 class="font-semibold text-white mb-4">Upcoming Meetings</h3>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($upcomingMeetings->count() > 0): ?>
            <div class="space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $upcomingMeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-slate-700/50 transition-colors">
                        <div>
                            <p class="text-sm font-medium text-white"><?php echo e($meeting->name); ?></p>
                            <p class="text-xs text-slate-400"><?php echo e($meeting->date ? date('M d, Y', strtotime($meeting->date)) : 'N/A'); ?> • <?php echo e($meeting->session_number); ?></p>
                        </div>
                        <a href="<?php echo e(route('admin.meetings.show', $meeting)); ?>" class="text-xs text-indigo-400 hover:text-indigo-300">Details</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php else: ?>
            <div class="flex flex-col items-center justify-center h-48 text-slate-500">
                <p>No scheduled meetings.</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/dashboard.blade.php ENDPATH**/ ?>