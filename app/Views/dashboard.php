<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<article>
  <header class="dashboard-header">
    <h2>Dashboard</h2>
    <a href="/logout" class="logout-btn">Logout</a>
  </header>

  <section class="user-info">
    <h3>Welcome, <?= esc($username) ?>!</h3>
    <p><strong>Email:</strong> <?= esc($user_email ?? 'Not available') ?></p>
    <p><strong>Login Time:</strong> <?= date('Y-m-d H:i:s', $login_time) ?></p>
    <p><strong>Current Time:</strong> <?= date('Y-m-d H:i:s', $current_time) ?></p>
    <p><strong>Session Duration:</strong> <?= gmdate('H:i:s', $current_time - $login_time) ?></p>
  </section>

  <section>
    <h3>Quick Actions</h3>
    <p>This is your dashboard. You can add more features here like:</p>
    <ul>
      <li>Profile management</li>
      <li>User settings</li>
      <li>Application features</li>
      <li>Reports and analytics</li>
    </ul>
  </section>
</article>
<?= $this->endSection() ?>