<?= $this->extend('trackwise/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="tw-card" style="max-width:380px;text-align:left;">
    <h1 class="tw-card-title-left">Forgot Your Password</h1>

    <form action="<?= base_url('trackwise/auth/resetLink') ?>" method="post">
        <?= csrf_field() ?>
        <div class="tw-form-group">
            <div class="tw-input-icon-wrap">
                <span class="tw-input-icon">&#9993;</span>
                <input type="email" name="email" class="tw-input" placeholder="jlgods1@gmail.com" required>
            </div>
        </div>
        <button type="submit" class="tw-btn tw-btn-primary">Sent Reset Link</button>
    </form>

    <p style="text-align:center;margin-top:20px;">
        <a href="<?= base_url('trackwise/auth/login') ?>" class="tw-link">&larr; Back to Login</a>
    </p>
</div>
<?= $this->endSection() ?>
