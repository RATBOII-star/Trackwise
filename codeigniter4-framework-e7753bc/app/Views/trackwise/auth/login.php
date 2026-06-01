<?= $this->extend('trackwise/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="tw-card" style="max-width:380px;text-align:left;">
    <h1 class="tw-card-title-left">Log In</h1>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="tw-alert tw-alert-success"><?= esc(session()->getFlashdata('message'), 'html') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="tw-alert tw-alert-error"><?= esc(session()->getFlashdata('error'), 'html') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('trackwise/auth/loginProcess') ?>" method="post">
        <?= csrf_field() ?>
        <div class="tw-form-group">
            <input type="text" name="username" class="tw-input" placeholder="Username" required>
        </div>
        <div class="tw-form-group">
            <input type="password" name="password" class="tw-input" placeholder="Password" required>
        </div>
        <div style="text-align:right;margin-bottom:16px;">
            <a href="<?= base_url('trackwise/auth/forgot-password') ?>" class="tw-link">Forgot Password ?</a>
        </div>
        <button type="submit" class="tw-btn tw-btn-primary">LOG IN</button>
    </form>

    <div class="tw-divider">or</div>

    <button type="button" class="tw-btn tw-btn-outline" style="margin-bottom:10px;">
        <span class="tw-social-icon tw-social-g">G</span> Continue With Google
    </button>
    <button type="button" class="tw-btn tw-btn-outline">
        <span class="tw-social-icon tw-social-f">f</span> Continue With Facebook
    </button>

    <p style="text-align:center;margin-top:16px;">
        <a href="<?= base_url('trackwise/auth/register') ?>" class="tw-link">Don't have an account? Register</a>
    </p>
</div>
<?= $this->endSection() ?>
