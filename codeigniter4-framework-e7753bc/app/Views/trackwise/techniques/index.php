<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-page-header">
    <p>Focus timer &amp; proven study methods</p>
</div>

<div class="tw-techniques-layout">
<div>
<div class="tw-timer-card">
    <select id="timerDuration" class="tw-timer-select">
        <option value="25">25 min</option>
        <option value="20" selected>20 min</option>
        <option value="15">15 min</option>
        <option value="45">45 min</option>
    </select>
    <div class="tw-timer-circle" id="timerDisplay">20 : 00</div>
    <div class="tw-timer-buttons">
        <button type="button" id="timerStart" class="tw-btn">Start</button>
        <button type="button" id="timerReset" class="tw-btn">Reset</button>
    </div>
</div>
</div>

<div>
<?php foreach ($techniques as $i => $tech): ?>
<div class="tw-technique <?= esc($tech['colorClass']) ?> <?= $i === 3 ? 'open' : '' ?>">
    <div class="tw-technique-header">
        <span class="tw-technique-icon"><?= $tech['icon'] ?></span>
        <div>
            <h4><?= esc($tech['title']) ?></h4>
            <p><?= esc($tech['subtitle']) ?></p>
        </div>
        <span class="tw-technique-chevron">&#9660;</span>
    </div>
    <div class="tw-technique-body">
        <p><?= esc($tech['description']) ?></p>
        <button type="button" class="tw-btn tw-btn-primary tw-btn-sm" style="margin-top:12px;">Start Using This Technique</button>
    </div>
</div>
<?php endforeach; ?>

<div class="tw-card tw-tips-card" style="margin-top:16px;">
    <h3 class="tw-card-title-left" style="margin-bottom:0;">Study Tips</h3>
    <ul>
        <?php foreach ($tips as $tip): ?>
            <li><?= esc($tip) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
</div>
<?= $this->endSection() ?>
