<?php
$active   = $activeNav ?? 'home';
$username = esc(session()->get('username') ?? 'User', 'html');
$initials = strtoupper(substr(session()->get('username') ?? 'U', 0, 2));
?>
<aside class="tw-sidebar">
    <div class="tw-sidebar-brand">
        <div class="tw-sidebar-logo">&#128218;</div>
        <span>TRACKWISE</span>
    </div>
    <nav class="tw-sidebar-nav">
        <a href="<?= base_url('trackwise/dashboard') ?>" class="<?= $active === 'home' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#127968;</span> Dashboard
        </a>
        <a href="<?= base_url('trackwise/studylog') ?>" class="<?= $active === 'studylog' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#128214;</span> Study Log
        </a>
        <a href="<?= base_url('trackwise/techniques') ?>" class="<?= $active === 'techniques' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#9201;</span> Techniques
        </a>
        <a href="<?= base_url('trackwise/planner') ?>" class="<?= $active === 'planner' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#128197;</span> Planner
        </a>
        <a href="<?= base_url('trackwise/analytics') ?>" class="<?= $active === 'analytics' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#128200;</span> Analytics
        </a>
        <a href="<?= base_url('trackwise/goals') ?>" class="<?= $active === 'goals' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#127919;</span> Goals
        </a>
        <a href="<?= base_url('trackwise/notifications') ?>" class="<?= $active === 'notifications' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#128276;</span> Notifications
        </a>
        <a href="<?= base_url('trackwise/profile') ?>" class="<?= $active === 'profile' ? 'active' : '' ?>">
            <span class="tw-nav-ico">&#128100;</span> Profile
        </a>
    </nav>
    <div class="tw-sidebar-footer">
        <div class="tw-sidebar-user">
            <div class="tw-sidebar-avatar"><?= $initials ?></div>
            <span><?= $username ?></span>
        </div>
        <a href="<?= base_url('trackwise/auth/logout') ?>" class="tw-sidebar-logout">Log Out</a>
    </div>
</aside>
