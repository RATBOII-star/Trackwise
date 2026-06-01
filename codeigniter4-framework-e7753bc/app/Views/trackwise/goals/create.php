<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-card" style="max-width:560px;">
    <h2 class="tw-card-title-left">Create New Goal</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="tw-alert tw-alert-error"><?= esc(session()->getFlashdata('error'), 'html') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('trackwise/goals/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="tw-form-group">
            <label class="tw-label">Goal Title</label>
            <input type="text" name="title" class="tw-input" placeholder="e.g. Complete 50 Study Hours" value="<?= esc(old('title') ?? '', 'attr') ?>" required>
        </div>

        <div class="tw-form-group">
            <label class="tw-label">Category</label>
            <select name="category" class="tw-select" required>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= esc($cat, 'attr') ?>" <?= old('category') === $cat ? 'selected' : '' ?>><?= esc($cat, 'html') ?></option>
                <?php endforeach; ?>
            </select>
            <small style="color:#5a5a6e;display:block;margin-top:6px;">
                Time &amp; Sessions progress updates automatically from Study Log data.
            </small>
        </div>

        <div class="tw-form-group">
            <label class="tw-label">Target</label>
            <input type="number" name="target_value" class="tw-input" step="0.1" min="0.1" placeholder="e.g. 50" value="<?= esc(old('target_value') ?? '', 'attr') ?>" required>
        </div>

        <div class="tw-form-group">
            <label class="tw-label">Due Date (optional)</label>
            <input type="date" name="due_date" class="tw-input" value="<?= esc(old('due_date') ?? '', 'attr') ?>">
        </div>

        <button type="submit" class="tw-btn tw-btn-primary">Save Goal</button>
        <a href="<?= base_url('trackwise/goals') ?>" class="tw-link" style="display:inline-block;margin-left:16px;">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>
