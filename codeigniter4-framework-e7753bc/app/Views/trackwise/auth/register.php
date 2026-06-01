<?= $this->extend('trackwise/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="tw-card" style="max-width:380px;text-align:left;">
    <h1 class="tw-card-title-left">Register</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="tw-alert tw-alert-error"><?= esc(session()->getFlashdata('error'), 'html') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('trackwise/auth/store') ?>" method="post">
        <?= csrf_field() ?>
        <div class="tw-form-group">
            <input type="text" name="username" class="tw-input" placeholder="Username" value="<?= esc(old('username') ?? '', 'attr') ?>" required>
        </div>
        <div class="tw-form-group">
            <input type="email" name="email" class="tw-input" placeholder="Email" value="<?= esc(old('email') ?? '', 'attr') ?>" required>
        </div>
        <div class="tw-form-group">
            <input type="password" name="password" class="tw-input" placeholder="Password" required>
        </div>
        <div class="tw-form-group">
            <input type="password" name="confirm_password" class="tw-input" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="tw-btn tw-btn-primary">Register</button>
    </form>

    <div class="tw-divider">or</div>

    <button type="button" class="tw-btn tw-btn-outline" style="margin-bottom:10px;">
        <span class="tw-social-icon tw-social-g">G</span> Continue With Google
    </button>
    <button type="button" class="tw-btn tw-btn-outline">
        <span class="tw-social-icon tw-social-f">f</span> Continue With Facebook
    </button>

    <label class="tw-checkbox-row">
        <input type="checkbox" required>
        <span>I Agree to Terms and Services &amp; privacy and policy</span>
    </label>

    <p style="text-align:center;margin-top:16px;">
        <a href="<?= base_url('trackwise/auth/login') ?>" class="tw-link">Already have an account? Log In</a>
    </p>
</div>
<?= $this->endSection() ?>
