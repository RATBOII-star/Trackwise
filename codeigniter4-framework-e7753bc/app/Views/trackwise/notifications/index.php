<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-page-header">
    <h1>Notifications</h1>
</div>

<div class="tw-notif-featured">
    <h3>&#129504; Subject Fatigue Detector</h3>
    <p>The app monitors your study patterns and alerts you when you're at risk of burnout from over-studying a subject.</p>
    <p class="tw-notif-tip">&#128161; Tip: Mix subjects throughout the day and take regular breaks for optimal retention.</p>
</div>

<?php foreach ($notifications as $notif): ?>
<?php
    $bgClass = match ($notif['type']) {
        'achievement' => 'tw-notif-yellow',
        'streak'      => 'tw-notif-pink',
        'reminder'    => 'tw-notif-blue',
        default       => '',
    };
    $icon = match ($notif['type']) {
        'achievement' => '&#127942;',
        'streak'      => '&#128293;',
        'reminder'    => '&#128339;',
        default       => '&#129504;',
    };
?>
<div class="tw-card tw-notif-card <?= $bgClass ?>">
    <h3><?= $icon ?> <?= esc($notif['title']) ?></h3>
    <p><?= esc($notif['message']) ?></p>
    <div class="tw-notif-time"><?= esc($notif['time']) ?></div>
    <?php if ($notif['type'] === 'warning'): ?>
    <div class="tw-notif-actions">
        <a href="#" class="tw-link">Mark as Read</a>
        <button type="button" class="tw-btn tw-btn-primary tw-btn-sm">Take a Break</button>
    </div>
    <?php endif; ?>
</div>
<?php endforeach; ?>

<div class="tw-card">
    <h3 class="tw-card-title-left" style="margin-bottom:12px;">Today's Study Balance</h3>
    <?php foreach ($balance as $item): ?>
    <div class="tw-balance-item">
        <div class="tw-balance-row">
            <span><?= esc($item['subject']) ?></span>
            <span style="color:<?= esc($item['color']) ?>"><?= esc($item['total']) ?> total</span>
        </div>
        <div class="tw-balance-bar">
            <div class="tw-progress-fill" style="width:<?= $item['pct'] ?>%;background:<?= esc($item['color']) ?>"></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>
