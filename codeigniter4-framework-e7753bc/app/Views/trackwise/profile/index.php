<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-profile-grid">
<div>
<div class="tw-profile-card">
    <div class="tw-profile-top">
        <div class="tw-avatar">&#128100;</div>
        <div>
            <h2><?= esc($profile['name']) ?></h2>
            <p style="opacity:0.85;font-size:0.9rem;"><?= esc($profile['role']) ?></p>
        </div>
    </div>
    <div class="tw-profile-stats">
        <div><strong><?= $profile['streak'] ?></strong><span>Day Streak</span></div>
        <div><strong><?= $profile['sessions'] ?></strong><span>Sessions</span></div>
        <div><strong><?= esc($profile['hoursWeek']) ?></strong><span>This Week</span></div>
    </div>
</div>

<div class="tw-card" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left" style="margin-bottom:0;">Study Statistics</h3>
    <div class="tw-stat-grid">
        <div class="tw-stat-box tw-stat-box-blue">Total Hours<strong><?= esc($profile['totalHours']) ?></strong></div>
        <div class="tw-stat-box tw-stat-box-purple">Full Sessions<strong><?= $profile['fullSessions'] ?></strong></div>
        <div class="tw-stat-box tw-stat-box-green">Goals Met<strong><?= $profile['goalsMet'] ?></strong></div>
        <div class="tw-stat-box tw-stat-box-orange">Best Streak<strong><?= esc($profile['bestStreak']) ?></strong></div>
    </div>
</div>

<div class="tw-card" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left" style="margin-bottom:0;">Account Information</h3>
    <div class="tw-info-row"><span>&#128100;</span> Name: <?= esc($profile['name']) ?></div>
    <div class="tw-info-row"><span>&#9993;</span> Email: <?= esc($profile['email']) ?></div>
    <div class="tw-info-row"><span>&#128197;</span> Member Since: <?= esc($profile['memberSince']) ?></div>
</div>
</div>

<div>
<div class="tw-card" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left" style="margin-bottom:0;">Achievements</h3>
    <div class="tw-badge-grid">
        <?php foreach ($achievements as $badge): ?>
        <div class="tw-badge" style="background:<?= esc($badge['color']) ?>">
            <span class="tw-badge-icon">&#127941;</span>
            <?= esc($badge['label']) ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="tw-card" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left" style="margin-bottom:0;">Preferences</h3>
    <?php foreach ($preferences as $pref): ?>
    <div class="tw-toggle-row">
        <span>&#128276; <?= esc($pref['label']) ?></span>
        <div class="tw-toggle"></div>
    </div>
    <?php endforeach; ?>
</div>

<div class="tw-card" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left" style="margin-bottom:0;">Settings</h3>
    <div class="tw-settings-row"><span>&#128274; Privacy &amp; Security</span><span>&rsaquo;</span></div>
    <div class="tw-settings-row"><span>&#9881; App Preferences</span><span>&rsaquo;</span></div>
</div>

<a href="<?= base_url('trackwise/auth/logout') ?>" class="tw-btn tw-btn-primary">Log Out</a>
</div>
</div>
<?= $this->endSection() ?>
