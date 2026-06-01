<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-page-header">
    <h1>Analytics</h1>
    <p>Study insights from your logged sessions</p>
</div>

<div class="tw-analytics-stat tw-grid-4">
    <div class="tw-stat-box tw-stat-box-blue">
        <span>Total Sessions</span>
        <strong><?= (int) $stats['sessionCount'] ?></strong>
    </div>
    <div class="tw-stat-box tw-stat-box-green">
        <span>Study Hours</span>
        <strong><?= esc((string) $stats['hours'], 'html') ?>h</strong>
    </div>
    <div class="tw-stat-box tw-stat-box-orange">
        <span>Day Streak</span>
        <strong><?= (int) $stats['streak'] ?></strong>
    </div>
    <div class="tw-stat-box tw-stat-box-purple">
        <span>Focus Progress</span>
        <strong><?= (int) $stats['focusPct'] ?>%</strong>
    </div>
</div>

<div class="tw-grid-2 tw-analytics-grid">
    <div class="tw-card">
        <h3 class="tw-card-title-left">Study Hours — Last 7 Days</h3>
        <?php if (array_sum($weekly['values']) <= 0): ?>
            <p class="tw-empty-msg">No session data yet. <a href="<?= base_url('trackwise/studylog') ?>" class="tw-link">Log a study session</a> to see your chart.</p>
        <?php else: ?>
            <div class="tw-bar-chart">
                <?php
                $max = max($weekly['values']) ?: 1;
                foreach ($weekly['labels'] as $i => $label):
                    $val = $weekly['values'][$i];
                    $h   = max(8, (int) round(($val / $max) * 100));
                ?>
                <div class="tw-bar-col">
                    <div class="tw-bar" style="height:<?= $h ?>%" title="<?= esc((string) round($val, 1), 'attr') ?>h"></div>
                    <span class="tw-bar-label"><?= esc($label, 'html') ?></span>
                    <span class="tw-bar-value"><?= esc((string) round($val, 1), 'html') ?>h</span>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="tw-card">
        <h3 class="tw-card-title-left">Subject Breakdown</h3>
        <?php if ($subjects === []): ?>
            <p class="tw-empty-msg">Log sessions with subjects to see breakdown.</p>
        <?php else: ?>
            <?php foreach ($subjects as $item): ?>
            <div class="tw-balance-item">
                <div class="tw-balance-row">
                    <span><?= esc($item['subject'], 'html') ?></span>
                    <span style="color:<?= esc($item['color'], 'attr') ?>"><?= esc((string) $item['hours'], 'html') ?>h (<?= (int) $item['pct'] ?>%)</span>
                </div>
                <div class="tw-balance-bar">
                    <div class="tw-progress-fill" style="width:<?= (int) $item['pct'] ?>%;background:<?= esc($item['color'], 'attr') ?>"></div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="tw-card">
    <h3 class="tw-card-title-left">Recent Sessions</h3>
    <?php if ($recent === []): ?>
        <p class="tw-empty-msg">No recent sessions.</p>
    <?php else: ?>
        <div class="tw-table-wrap">
            <table class="tw-table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Topic</th>
                        <th>Duration</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent as $row): ?>
                    <tr>
                        <td><?= esc($row['subject'], 'html') ?></td>
                        <td><?= esc($row['topic'], 'html') ?></td>
                        <td><?= esc($model->formatDuration((int) $row['hours'], (int) $row['minutes']), 'html') ?></td>
                        <td><?= esc(date('M j, Y g:i A', strtotime($row['created_at'])), 'html') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<div class="tw-focus-card">
    <div class="tw-focus-header"><h3>Today's Focus</h3><span>&#128218;</span></div>
    <p>Complete <?= esc((string) $stats['focusGoal'], 'html') ?> hours of study time</p>
    <div class="tw-progress-bar"><div class="tw-progress-fill" style="width:<?= (int) $stats['focusPct'] ?>%"></div></div>
    <p class="tw-progress-text"><?= esc((string) $stats['focusDone'], 'html') ?> / <?= esc((string) $stats['focusGoal'], 'html') ?> hours (<?= (int) $stats['focusPct'] ?>%)</p>
</div>
<?= $this->endSection() ?>
