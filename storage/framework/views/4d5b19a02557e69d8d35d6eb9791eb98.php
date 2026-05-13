<?php $__env->startSection('header', 'Staff Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-12 text-center max-w-2xl mx-auto">
    <h3 class="text-3xl font-bold text-white mb-4">Mfumo wa HANSAD</h3>
    <p class="text-slate-400">Welcome back, <?php echo e(auth()->user()->full_name); ?>. Access legislative records and search for information across the HANSAD repository.</p>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextMeeting): ?>
<div class="mb-12 max-w-4xl mx-auto">
    <div class="bg-gradient-to-r from-indigo-900/40 to-slate-800/40 border border-indigo-500/30 rounded-3xl p-8 backdrop-blur-sm relative overflow-hidden group">
        <!-- Decorative element -->
        <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-indigo-500/10 rounded-full blur-3xl group-hover:bg-indigo-500/20 transition-colors"></div>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative">
            <div class="flex-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-bold uppercase tracking-wider mb-4">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    Next Scheduled Meeting
                </div>
                <h2 class="text-2xl font-bold text-white mb-2"><?php echo e($nextMeeting->name); ?></h2>
                <div class="flex flex-wrap items-center gap-y-2 gap-x-6 text-slate-400 text-sm">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <?php echo e(\Carbon\Carbon::parse($nextMeeting->date)->format('F d, Y')); ?>

                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <?php echo e($nextMeeting->location ?? 'To be announced'); ?>

                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Session #<?php echo e($nextMeeting->session_number); ?>

                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <a href="<?php echo e(route('search.index', ['meeting_id' => $nextMeeting->id])); ?>" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl font-bold transition-all hover:scale-105 active:scale-95 shadow-lg shadow-indigo-600/25">
                    Search Records
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
    <!-- Search Action -->
    <a href="<?php echo e(route('search.index')); ?>" class="group bg-slate-800/50 p-8 rounded-3xl border border-slate-700 hover:border-indigo-500 transition-all hover:translate-y-[-4px]">
        <div class="w-14 h-14 bg-indigo-500/20 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-500 transition-colors">
            <svg class="h-8 w-8 text-indigo-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <h4 class="text-xl font-bold text-white mb-2">Global Search</h4>
        <p class="text-slate-400 text-sm">Find questions, answers, and meeting details using advanced keyword search and filters.</p>
    </a>

    <!-- Records Access -->
    <a href="<?php echo e(route('search.index')); ?>" class="group bg-slate-800/50 p-8 rounded-3xl border border-slate-700 hover:border-emerald-500 transition-all hover:translate-y-[-4px]">
        <div class="w-14 h-14 bg-emerald-500/20 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-500 transition-colors">
            <svg class="h-8 w-8 text-emerald-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
        <h4 class="text-xl font-bold text-white mb-2">Legislative Records</h4>
        <p class="text-slate-400 text-sm">Access the full repository of Speeches, Motions, and Q&A sessions.</p>
    </a>
</div>

<div class="mt-12 bg-indigo-600/10 border border-indigo-500/20 p-6 rounded-2xl max-w-4xl mx-auto flex items-center gap-6">
    <div class="flex-1">
        <h5 class="text-white font-bold">Need Help?</h5>
        <p class="text-slate-400 text-sm">Consult the system manual or contact the administrator for assistance with data retrieval.</p>
    </div>
    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">View Manual</button>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/staff/dashboard.blade.php ENDPATH**/ ?>