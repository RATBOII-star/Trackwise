<?php $active = $activeNav ?? 'home'; ?>
<nav class="tw-bottom-nav">
    <a href="<?= base_url('trackwise/dashboard') ?>" class="<?= $active === 'home' ? 'active' : '' ?>" title="Home">&#127968;</a>
    <a href="<?= base_url('trackwise/notifications') ?>" class="<?= $active === 'notifications' ? 'active' : '' ?>" title="Notifications">&#128276;</a>
    <a href="<?= base_url('trackwise/profile') ?>" class="<?= $active === 'profile' ? 'active' : '' ?>" title="Profile">&#128100;</a>
    <a href="<?= base_url('trackwise/analytics') ?>" class="<?= $active === 'analytics' ? 'active' : '' ?>" title="Analytics">&#128200;</a>
</nav>
