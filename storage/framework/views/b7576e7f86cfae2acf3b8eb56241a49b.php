<?php $__env->startSection('header', 'New Record'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl">
    <div class="mb-8">
        <a href="<?php echo e(route('admin.records.index')); ?>" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-sm">
            <span>← Back to Records</span>
        </a>
    </div>

    <form action="<?php echo e(route('admin.records.store')); ?>" method="POST" class="space-y-8 bg-slate-800/50 p-8 rounded-2xl border border-slate-700 shadow-2xl">
        <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Record Type Selection -->
            <div class="space-y-2">
                <label for="type" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Entry Type</label>
                <select name="type" id="type" onchange="toggleFields()" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    <option value="qa" <?php echo e(old('type') == 'qa' ? 'selected' : ''); ?>>Question & Answer</option>
                    <option value="speech" <?php echo e(old('type') == 'speech' ? 'selected' : ''); ?>>Speech (Hotuba)</option>
                    <option value="motion" <?php echo e(old('type') == 'motion' ? 'selected' : ''); ?>>Motion (Hoja)</option>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Meeting Selection -->
            <div class="space-y-2">
                <label for="meeting_id" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Meeting / Sitting</label>
                <select name="meeting_id" id="meeting_id" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($meeting->id); ?>" <?php echo e(old('meeting_id') == $meeting->id ? 'selected' : ''); ?>>
                            <?php echo e($meeting->name); ?> (<?php echo e($meeting->session_number); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['meeting_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        
        <!-- Record Title -->
        <div class="space-y-2">
            <label for="title" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Title or Heading</label>
            <input type="text" name="title" value="<?php echo e(old('title')); ?>" placeholder="Enter a descriptive title or heading..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Primary Participant -->
            <div class="space-y-2">
                <label for="primary_participant_id" id="primary_label" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Questioner</label>
                <select name="primary_participant_id" id="primary_participant_id" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($participant->id); ?>" <?php echo e(old('primary_participant_id') == $participant->id ? 'selected' : ''); ?>>
                            <?php echo e($participant->name); ?> (<?php echo e($participant->title); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>

            <!-- Secondary Participant -->
            <div class="space-y-2" id="secondary_participant_div">
                <label for="secondary_participant_id" id="secondary_label" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Respondent</label>
                <select name="secondary_participant_id" id="secondary_participant_id" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    <option value="">-- Select --</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($participant->id); ?>" <?php echo e(old('secondary_participant_id') == $participant->id ? 'selected' : ''); ?>>
                            <?php echo e($participant->name); ?> (<?php echo e($participant->title); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>
        </div>

        <!-- Subject -->
        <div class="space-y-2">
            <label for="subject" id="subject_label" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Record Subject / Topic</label>
            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="Enter the main subject of the record..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Content -->
        <div class="space-y-2">
            <label for="content" id="content_label" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Question Text</label>
            <textarea name="content" id="content" rows="6" placeholder="Paste the content here..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all"><?php echo e(old('content')); ?></textarea>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Secondary Content -->
        <div class="space-y-2" id="secondary_content_div">
            <label for="secondary_content" class="text-sm font-bold text-emerald-400 uppercase tracking-widest">Answer Text (Official Response)</label>
            <textarea name="secondary_content" id="secondary_content" rows="6" placeholder="Paste the official response here..." class="w-full bg-slate-900 border border-emerald-900/30 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 outline-none transition-all"><?php echo e(old('secondary_content')); ?></textarea>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['secondary_content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2" id="record_number_div">
                <label for="record_number" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Reference Number</label>
                <input type="text" name="record_number" value="<?php echo e(old('record_number')); ?>" placeholder="e.g. Q.123 or M.01" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
            </div>
            <div class="space-y-2" id="tags_div">
                <label for="tags" class="text-sm font-bold text-slate-400 uppercase tracking-widest">Keywords / Tags</label>
                <input type="text" name="tags" value="<?php echo e(old('tags')); ?>" placeholder="Separated by commas" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
            </div>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-xl shadow-indigo-500/20 active:scale-[0.98]">
                Create Record Entry
            </button>
        </div>
    </form>
</div>

<script>
function toggleFields() {
    const type = document.getElementById('type').value;
    const secondaryParticipantDiv = document.getElementById('secondary_participant_div');
    const secondaryContentDiv = document.getElementById('secondary_content_div');
    const primaryLabel = document.getElementById('primary_label');
    const secondaryLabel = document.getElementById('secondary_label');
    const subjectLabel = document.getElementById('subject_label');
    const contentLabel = document.getElementById('content_label');
    const recordNumberDiv = document.getElementById('record_number_div');
    const tagsDiv = document.getElementById('tags_div');

    if (type === 'speech') {
        secondaryParticipantDiv.classList.add('hidden');
        secondaryContentDiv.classList.add('hidden');
        recordNumberDiv.classList.remove('hidden');
        tagsDiv.classList.remove('hidden');
        primaryLabel.innerText = 'Speaker';
        subjectLabel.innerText = 'Record Subject / Topic';
        contentLabel.innerText = 'Speech Body';
    } else if (type === 'motion') {
        secondaryParticipantDiv.classList.add('hidden');
        secondaryContentDiv.classList.add('hidden');
        recordNumberDiv.classList.add('hidden');
        tagsDiv.classList.add('hidden');
        primaryLabel.innerText = 'Proposer';
        subjectLabel.innerText = 'Salutations';
        contentLabel.innerText = 'Motion Text';
    } else {
        // QA
        secondaryParticipantDiv.classList.remove('hidden');
        secondaryContentDiv.classList.remove('hidden');
        recordNumberDiv.classList.remove('hidden');
        tagsDiv.classList.remove('hidden');
        primaryLabel.innerText = 'Questioner';
        secondaryLabel.innerText = 'Respondent';
        subjectLabel.innerText = 'Record Subject / Topic';
        contentLabel.innerText = 'Question Text';
    }
}

// Initialize on load
document.addEventListener('DOMContentLoaded', toggleFields);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zipa-hansad\resources\views/admin/records/create.blade.php ENDPATH**/ ?>