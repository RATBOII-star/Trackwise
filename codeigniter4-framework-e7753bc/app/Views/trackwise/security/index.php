<?= $this->extend('trackwise/layouts/app') ?>

<?= $this->section('content') ?>
<div class="tw-page-header">
    <h1>Security Demo</h1>
    <p>CSRF &amp; XSS protection (Week requirements)</p>
</div>

<div class="tw-card" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left">CSRF Protection</h3>
    <p style="font-size:0.9rem;color:#5a5a6e;margin-bottom:12px;">
        All POST forms include <code><?= esc('<?= csrf_field() ?>', 'html') ?></code>.
        Without a valid token, CodeIgniter returns <strong>403 Forbidden</strong>.
    </p>
    <form action="<?= base_url('trackwise/security/csrf-demo') ?>" method="post" style="margin-bottom:12px;">
        <?= csrf_field() ?>
        <button type="submit" class="tw-btn tw-btn-primary tw-btn-sm">POST with CSRF (works)</button>
    </form>
    <form action="<?= base_url('trackwise/security/csrf-demo') ?>" method="post" id="csrfBadForm">
        <button type="submit" class="tw-btn tw-btn-outline tw-btn-sm">POST without CSRF (403)</button>
    </form>
</div>

<div class="tw-card" style="margin-bottom:16px;">
    <h3 class="tw-card-title-left">XSS Prevention</h3>
    <p style="font-size:0.9rem;color:#5a5a6e;margin-bottom:12px;">
        Try typing <code>&lt;script&gt;alert(1)&lt;/script&gt;</code> below. Output uses <code>esc($var, 'html')</code>.
    </p>
    <form action="<?= base_url('trackwise/security/xss-test') ?>" method="post">
        <?= csrf_field() ?>
        <div class="tw-form-group">
            <input type="text" name="comment" class="tw-input" placeholder="Enter test script here..." value="<?= esc($demoInput, 'attr') ?>">
        </div>
        <button type="submit" class="tw-btn tw-btn-primary tw-btn-sm">Test XSS</button>
    </form>

    <?php if ($raw !== ''): ?>
    <div class="tw-xss-demo" style="margin-top:16px;">
        <p class="tw-label">Before (unsafe — not used in app):</p>
        <pre class="tw-code-block"><?= esc($raw, 'html') ?></pre>
        <p class="tw-label">After (escaped with esc()):</p>
        <div class="tw-card" style="background:#f5f5f5;"><?= esc($escaped, 'html') ?></div>
    </div>
    <?php endif; ?>
</div>

<p><a href="<?= base_url('trackwise/studylog') ?>" class="tw-link">&larr; Back to Study Log</a></p>
<?= $this->endSection() ?>
