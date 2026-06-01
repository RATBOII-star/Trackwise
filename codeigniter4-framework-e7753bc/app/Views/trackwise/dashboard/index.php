<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-greeting tw-greeting-desktop">
    <h2>Hello <?= esc($username, 'html') ?>!</h2>
    <p>Ready to study today</p>
</div>

<div class="tw-stats-row tw-dashboard-stats">
    <div class="tw-stat-card tw-stat-orange">
        <span>Streak</span>
        <strong><?= (int) $stats['streak'] ?></strong>
        <small>days</small>
    </div>
    <div class="tw-stat-card tw-stat-blue">
        <span>Hours Logged</span>
        <strong><?= esc((string) $stats['hours'], 'html') ?></strong>
        <small>total</small>
    </div>
    <div class="tw-stat-card tw-stat-green">
        <span>Sessions</span>
        <strong><?= (int) ($stats['sessionCount'] ?? 0) ?></strong>
        <small>logged</small>
    </div>
    <div class="tw-stat-card tw-stat-purple">
        <span>Focus</span>
        <strong><?= (int) $stats['focusPct'] ?>%</strong>
        <small>today</small>
    </div>
</div>

<div class="tw-nav-cards tw-nav-cards-desktop">
    <a href="<?= base_url('trackwise/studylog') ?>" class="tw-nav-card tw-nav-card-green">
        <span class="tw-nav-icon">&#128214;</span>
        <div>
            <strong>Study Log</strong>
            <p>Log sessions &amp; upload photos</p>
        </div>
    </a>
    <a href="<?= base_url('trackwise/techniques') ?>" class="tw-nav-card tw-nav-card-blue">
        <span class="tw-nav-icon">&#9201;</span>
        <div>
            <strong>Techniques</strong>
            <p>Focus timer &amp; study methods</p>
        </div>
    </a>
    <a href="<?= base_url('trackwise/planner') ?>" class="tw-nav-card tw-nav-card-yellow">
        <span class="tw-nav-icon">&#128197;</span>
        <div>
            <strong>Planner</strong>
            <p>Today's tasks &amp; schedule</p>
        </div>
    </a>
    <a href="<?= base_url('trackwise/analytics') ?>" class="tw-nav-card tw-nav-card-purple">
        <span class="tw-nav-icon">&#128200;</span>
        <div>
            <strong>Analytics</strong>
            <p>Charts &amp; subject breakdown</p>
        </div>
    </a>
    <a href="<?= base_url('trackwise/goals') ?>" class="tw-nav-card tw-nav-card-orange">
        <span class="tw-nav-icon">&#127919;</span>
        <div>
            <strong>Goals</strong>
            <p>Track your progress</p>
        </div>
    </a>
    <a href="<?= base_url('trackwise/notifications') ?>" class="tw-nav-card tw-nav-card-teal">
        <span class="tw-nav-icon">&#128276;</span>
        <div>
            <strong>Notifications</strong>
            <p>Alerts &amp; study balance</p>
        </div>
    </a>
</div>
<?= $this->endSection() ?>
