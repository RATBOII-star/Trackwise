<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('message')): ?>
    <div class="tw-alert tw-alert-success"><?= esc(session()->getFlashdata('message'), 'html') ?></div>
<?php endif; ?>

<div class="tw-grid-2 tw-planner-grid">
    <div>
        <div class="tw-card tw-calendar-card">
            <div class="tw-calendar-top">
                <div>
                    <h3><?= esc($calendar['month'], 'html') ?></h3>
                    <span><?= esc($calendar['week'], 'html') ?></span>
                </div>
                <span>&#128197;</span>
            </div>
            <div class="tw-week-row">
                <?php foreach ($calendar['days'] as $day): ?>
                <div class="tw-day-pill <?= $day['active'] ? 'active' : '' ?>">
                    <?= esc($day['abbr'], 'html') ?>
                    <strong><?= esc((string) $day['date'], 'html') ?></strong>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="tw-progress-card">
            <div>
                <h3>Today's Progress</h3>
                <p><?= (int) $progress['completed'] ?> of <?= (int) $progress['total'] ?> tasks completed</p>
                <div class="tw-progress-bar">
                    <div class="tw-progress-fill" style="width:<?= (int) $progress['pct'] ?>%"></div>
                </div>
            </div>
            <div class="tw-progress-pct"><?= (int) $progress['pct'] ?>%</div>
        </div>
    </div>

    <div>
        <h2 class="tw-section-title">Today's Schedule</h2>
        <div class="tw-card">
            <?php foreach ($tasks as $task): ?>
            <div class="tw-task-item">
                <form method="post" action="<?= base_url('trackwise/planner/toggle/' . (int) $task['id']) ?>" class="tw-task-toggle-form">
                    <?= csrf_field() ?>
                    <button type="submit" class="tw-task-check <?= ! empty($task['done']) ? 'done' : '' ?>" title="Toggle complete">
                        <?= ! empty($task['done']) ? '&#10003;' : '' ?>
                    </button>
                </form>
                <div class="tw-task-info">
                    <h4><?= esc($task['title'], 'html') ?></h4>
                    <div class="tw-task-meta">
                        <span><?= esc($task['category'], 'html') ?></span>
                        <span>&#128339; <?= esc($task['time'], 'html') ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="tw-deadline-alert">
            <span>&#128197;</span>
            <div>
                <strong>Upcoming Deadline</strong>
                <p style="font-size:0.85rem;margin-top:4px;"><?= esc($deadline['title'], 'html') ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
