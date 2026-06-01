<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'TRACKWISE') ?></title>
    <link rel="stylesheet" href="<?= base_url('trackwise/css/trackwise.css') ?>">
</head>
<body class="tw-sky-bg">
    <?= view('trackwise/partials/clouds') ?>
    <div class="tw-container-auth tw-auth-desktop">
        <?= view('trackwise/partials/logo') ?>
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
