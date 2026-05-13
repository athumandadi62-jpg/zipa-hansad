<?php $__env->startSection('header', 'New Question Record'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl">
    <div class="mb-8">
        <a href="<?php echo e(route('admin.questions.index')); ?>" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-sm">
            <span>← Back to Repository</span>
        </a>
    </div>

    <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700">
        <form action="<?php echo e(route('admin.questions.store')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="meeting_id" class="block text-sm font-medium text-slate-400 mb-2">Legislative Meeting</label>
                    <select name="meeting_id" id="meeting_id" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                        <option value="">Select Meeting</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($meeting->id); ?>"><?php echo e($meeting->name); ?> (<?php echo e($meeting->session_number); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>

                <div>
                    <label for="question_number" class="block text-sm font-medium text-slate-400 mb-2">Question Number (e.g. Nam. 72)</label>
                    <input type="text" name="question_number" id="question_number"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                        placeholder="Nam. 72">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="questioner_id" class="block text-sm font-medium text-slate-400 mb-2">Questioner (Delegate)</label>
                    <select name="questioner_id" id="questioner_id" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                        <option value="">Select Questioner</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($participant->id); ?>"><?php echo e($participant->name); ?> (<?php echo e($participant->title); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>

                <div>
                    <label for="respondent_id" class="block text-sm font-medium text-slate-400 mb-2">Respondent (Waziri/Official)</label>
                    <select name="respondent_id" id="respondent_id" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                        <option value="">Select Respondent</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($participant->id); ?>"><?php echo e($participant->name); ?> (<?php echo e($participant->title); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="subject" class="block text-sm font-medium text-slate-400 mb-2">Subject / Topic</label>
                <input type="text" name="subject" id="subject" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                    placeholder="e.g. Ajira Kupitia Uwekezaji">
            </div>

            <div>
                <label for="question_text" class="block text-sm font-medium text-slate-400 mb-2">The Question</label>
                <textarea name="question_text" id="question_text" rows="5" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                    placeholder="Full text of the question..."></textarea>
            </div>

            <div>
                <label for="answer_text" class="block text-sm font-medium text-slate-400 mb-2">The Answer</label>
                <textarea name="answer_text" id="answer_text" rows="5"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                    placeholder="Full text of the answer..."></textarea>
            </div>

            <div class="pt-4 text-right">
                <button type="submit" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg hover:shadow-indigo-500/20 transition-all hover:translate-y-[-2px]">
                    Save Record
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/questions/create.blade.php ENDPATH**/ ?>