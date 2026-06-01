<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'TRACKWISE') ?></title>
    <link rel="stylesheet" href="<?= base_url('trackwise/css/trackwise.css') ?>">
</head>
<body>
    <div class="tw-sky-bg">
        <?= view('trackwise/partials/clouds') ?>
        <div class="tw-app-shell">
            <?= view('trackwise/partials/sidebar', ['activeNav' => $activeNav ?? 'home']) ?>
            <div class="tw-main">
                <header class="tw-topbar">
                    <h1 class="tw-topbar-title"><?= esc($pageTitle ?? 'TRACKWISE', 'html') ?></h1>
                    <div class="tw-topbar-actions">
                        <span class="tw-topbar-user"><?= esc(session()->get('username') ?? '', 'html') ?></span>
                        <a href="<?= base_url('trackwise/auth/logout') ?>" class="tw-link">Log Out</a>
                    </div>
                </header>
                <div class="tw-container">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
        <?= view('trackwise/partials/bottom_nav', ['activeNav' => $activeNav ?? 'home']) ?>
    </div>
    <?php if (! empty($loadTimerJs)): ?>
    <script src="<?= base_url('trackwise/js/timer.js') ?>"></script>
    <?php endif; ?>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
