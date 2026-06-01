<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-page-header">
    <p>Your Academic Journey</p>
</div>

<div class="tw-stats-row">
    <div class="tw-stat-card tw-stat-orange">
        <span>Streak</span>
        <strong><?= esc($stats['streak']) ?></strong>
        <small>days</small>
    </div>
    <div class="tw-stat-card tw-stat-blue">
        <span>Hours</span>
        <strong><?= esc($stats['hours']) ?></strong>
        <small>this week</small>
    </div>
    <div class="tw-stat-card tw-stat-green">
        <span>Goals</span>
        <strong><?= esc($stats['goals']) ?></strong>
        <small>this week</small>
    </div>
</div>

<div class="tw-focus-card">
    <div class="tw-focus-header">
        <h3>Today's Focus</h3>
        <span>&#128218;</span>
    </div>
    <p>Complete <?= esc($stats['focusGoal']) ?> hours of study time</p>
    <div class="tw-progress-bar">
        <div class="tw-progress-fill" style="width:<?= (int) $stats['focusPct'] ?>%"></div>
    </div>
    <p class="tw-progress-text"><?= esc($stats['focusDone']) ?> / <?= esc($stats['focusGoal']) ?> hours (<?= (int) $stats['focusPct'] ?>%)</p>
</div>

<?php if (session()->getFlashdata('message')): ?>
    <div class="tw-alert tw-alert-success"><?= esc(session()->getFlashdata('message'), 'html') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="tw-alert tw-alert-error"><?= esc(session()->getFlashdata('error'), 'html') ?></div>
<?php endif; ?>

<?php if (! empty($latest)): ?>
<div class="tw-card tw-upload-result" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left" style="margin-bottom:12px;">Saved Session</h3>
    <p><strong><?= esc($latest['subject'], 'html') ?></strong> — <?= esc($latest['topic'], 'html') ?></p>
    <p class="tw-session-meta"><?= esc($model->formatDuration((int) $latest['hours'], (int) $latest['minutes']), 'html') ?></p>
    <?php if (! empty($latest['notes'])): ?>
        <p class="tw-session-notes"><?= esc($latest['notes'], 'html') ?></p>
    <?php endif; ?>
    <?php if (! empty($latest['image'])): ?>
        <img src="<?= base_url('trackwise/uploads/' . esc($latest['image'], 'url')) ?>" alt="Session attachment" class="tw-session-image">
    <?php endif; ?>
</div>
<?php endif; ?>

<div class="tw-studylog-layout">
<div class="tw-card tw-studylog-form-col">
    <h3 class="tw-card-title-left">Log Session</h3>
    <form action="<?= base_url('trackwise/studylog/save') ?>" method="post" enctype="multipart/form-data" id="studyLogForm">
        <?= csrf_field() ?>
        <input type="hidden" name="search_keep" value="<?= esc($search, 'attr') ?>">

        <div class="tw-form-group">
            <label class="tw-label">Subject:</label>
            <select name="subject" class="tw-select">
                <?php foreach ($subjects as $subject): ?>
                    <option value="<?= esc($subject, 'attr') ?>"><?= esc($subject, 'html') ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="tw-form-group">
            <label class="tw-label">Topic:</label>
            <input type="text" name="topic" class="tw-input" value="<?= esc(old('topic') ?: 'Algebra', 'attr') ?>" placeholder="Enter topic" required>
        </div>
        <div class="tw-form-group">
            <label class="tw-label">Duration:</label>
            <div class="tw-duration-row">
                <input type="number" name="hours" class="tw-input" value="<?= esc(old('hours') ?: '1', 'attr') ?>" min="0">
                <span>:</span>
                <input type="number" name="minutes" class="tw-input" value="<?= esc(old('minutes') ?: '20', 'attr') ?>" min="0" max="59">
                <span class="tw-duration-label">Hours &nbsp; Minutes</span>
            </div>
        </div>
        <div class="tw-form-group">
            <label class="tw-label">Session Photo (optional):</label>
            <div class="tw-image-picker">
                <input type="file" name="session_image" id="sessionImageInput" class="tw-input" accept="image/jpeg,image/png,image/gif,image/webp">
                <div id="imagePreview" class="tw-image-preview" aria-live="polite"></div>
            </div>
            <small style="color:#5a5a6e;">JPG, PNG, GIF, WebP — max 2MB</small>
        </div>
        <div class="tw-form-group">
            <label class="tw-label">Notes (Optional):</label>
            <textarea name="notes" class="tw-textarea" placeholder="Add any additional notes..."><?= esc(old('notes') ?? '', 'html') ?></textarea>
        </div>
        <button type="submit" class="tw-btn tw-btn-primary">&#128190; Save Log</button>
    </form>
</div>

<div class="tw-studylog-history-col">
<h2 class="tw-section-title">Sessions History</h2>

<form method="get" action="<?= base_url('trackwise/studylog') ?>" class="tw-search-form">
    <input type="text" name="search" class="tw-input" placeholder="Search subject, topic, notes..." value="<?= esc($search, 'attr') ?>">
    <button type="submit" class="tw-btn tw-btn-primary tw-btn-sm">Search</button>
</form>

<?php if ($pager !== null): ?>
<p class="tw-pager-meta">Page <?= esc((string) $pager->getCurrentPage(), 'html') ?> of <?= esc((string) $pager->getPageCount(), 'html') ?> — <?= esc((string) $total, 'html') ?> total records</p>
<?php endif; ?>

<?php if (empty($sessions)): ?>
    <div class="tw-card"><p style="color:#5a5a6e;">No sessions yet. Save your first log above.</p></div>
<?php else: ?>
    <?php foreach ($sessions as $session): ?>
    <div class="tw-session-item tw-card" style="margin-bottom:10px;">
        <div class="tw-session-top">
            <span class="tw-session-subject"><?= esc($session['subject'], 'html') ?></span>
            <span class="tw-session-meta"><?= esc(date('M j, g:i A', strtotime($session['created_at'])), 'html') ?> &bull; <?= esc($model->formatDuration((int) $session['hours'], (int) $session['minutes']), 'html') ?></span>
        </div>
        <div class="tw-session-topic"><?= esc($session['topic'], 'html') ?></div>
        <?php if (! empty($session['notes'])): ?>
            <div class="tw-session-notes"><?= esc($session['notes'], 'html') ?></div>
        <?php endif; ?>
        <?php if (! empty($session['image'])): ?>
            <img src="<?= base_url('trackwise/uploads/' . esc($session['image'], 'url')) ?>" alt="" class="tw-session-image tw-session-image-sm">
        <?php endif; ?>
    </div>
    <?php endforeach; ?>

    <?php if ($pager !== null): ?>
    <div class="tw-pager"><?= $pager->links('default', 'default_full') ?></div>
    <?php endif; ?>
<?php endif; ?>

</div>
</div>

<p style="margin-top:12px;"><a href="<?= base_url('trackwise/security') ?>" class="tw-link">Security demo (CSRF &amp; XSS)</a></p>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('trackwise/js/studylog.js') ?>"></script>
<?= $this->endSection() ?>
