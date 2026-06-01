<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('message')): ?>
    <div class="tw-alert tw-alert-success"><?= esc(session()->getFlashdata('message'), 'html') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="tw-alert tw-alert-error"><?= esc(session()->getFlashdata('error'), 'html') ?></div>
<?php endif; ?>

<div class="tw-goals-summary">
    <div class="tw-goals-summary-top">
        <span style="font-size:1.5rem;">&#127919;</span>
        <div>
            <strong>Your Goals</strong>
            <p style="font-size:0.85rem;opacity:0.9;"><?= (int) $summary['completed'] ?> of <?= (int) $summary['total'] ?> completed</p>
        </div>
    </div>
    <div class="tw-progress-bar">
        <div class="tw-progress-fill" style="width:<?= (int) $summary['pct'] ?>%"></div>
    </div>
    <p class="tw-progress-text" style="text-align:center;margin-top:8px;"><?= (int) $summary['pct'] ?>% Overall Progress</p>
</div>

<a href="<?= base_url('trackwise/goals/create') ?>" class="tw-btn tw-btn-gradient" style="margin-bottom:20px;display:inline-block;text-align:center;">+ Create New Goal</a>

<h2 class="tw-section-title">Active Goals</h2>

<?php if ($goals === []): ?>
    <div class="tw-card">
        <p style="color:#5a5a6e;">No goals yet. Click <strong>Create New Goal</strong> above.</p>
        <p style="font-size:0.85rem;color:#999;margin-top:8px;">
            Tip: <em>Time</em> and <em>Sessions</em> goals auto-update from your Study Log entries in the database.
        </p>
    </div>
<?php else: ?>
    <?php foreach ($goals as $goal): ?>
    <div class="tw-card tw-goal-card">
        <div class="tw-goal-title"><?= esc($goal['title'], 'html') ?></div>
        <div class="tw-goal-meta">
            <span>&#128197; <?= esc($goal['date'], 'html') ?></span>
            <span>&bull;</span>
            <span><?= esc($goal['category'], 'html') ?></span>
        </div>
        <div class="tw-goal-progress-row">
            <span><?= esc((string) $goal['current'], 'html') ?> / <?= esc((string) $goal['target'], 'html') ?> <?= esc($goal['unit'], 'html') ?></span>
            <span><?= (int) $goal['pct'] ?>%</span>
        </div>
        <div class="tw-goal-bar">
            <div class="tw-goal-bar-fill" style="width:<?= (int) $goal['pct'] ?>%;background:<?= esc($goal['color'], 'attr') ?>"></div>
        </div>
        <div class="tw-goal-remaining">
            <?= esc((string) max(0, $goal['target'] - $goal['current']), 'html') ?> <?= esc($goal['unit'], 'html') ?> to go
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="tw-encourage-card">
    <span style="font-size:1.5rem;background:rgba(255,255,255,0.3);border-radius:50%;padding:8px;">&#127947;</span>
    <div>
        <strong>Keep Going!</strong>
        <p style="font-size:0.85rem;margin-top:4px;">You're making great progress. Stay consistent and you'll reach your goals in no time!</p>
    </div>
</div>

<div class="tw-card">
    <h3 class="tw-card-title-left" style="margin-bottom:0;">Recent Milestones</h3>
    <ul class="tw-milestone-list">
        <?php foreach ($milestones as $m): ?>
        <li>
            <?= esc($m['text'], 'html') ?>
            <?php if (! empty($m['time'])): ?>
                <div class="tw-milestone-time"><?= esc($m['time'], 'html') ?></div>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?= $this->endSection() ?>
