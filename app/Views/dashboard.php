<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<main>
  <h2>Welcome, <?= esc($username) ?>! 🎉</h2>
  <p>You are successfully logged in!</p>
  <details>
    <h3>📊 Session Info:</h3>
    <p><strong>Username:</strong> <?= esc($username) ?></p>
    <p><strong>Login Status:</strong> ✅ Logged In</p>
    <p><strong>Current Time:</strong> <?= date('Y-m-d H:i:s') ?></p>
  </details>
</main>
<?= $this->endSection() ?>