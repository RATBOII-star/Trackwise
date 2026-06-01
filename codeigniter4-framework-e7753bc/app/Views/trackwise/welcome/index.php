<?= $this->extend('trackwise/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="tw-card-auth">
    <h1 class="tw-card-title">Welcome</h1>
    <p class="tw-card-desc">
        Log in your study sessions, use a focus timer, plan tasks, and track your progress — all in one simple app.
    </p>
    <a href="<?= base_url('trackwise/auth/register') ?>" class="tw-btn tw-btn-primary">Create Account</a>
    <p style="margin-top:16px;">
        <a href="<?= base_url('trackwise/auth/login') ?>" class="tw-link">Already have an account? Log In</a>
    </p>
</div>
<div class="tw-footer-text">
    <p>Good Luck!</p>
    <p>Enjoy your journey here</p>
</div>
<?= $this->endSection() ?>
