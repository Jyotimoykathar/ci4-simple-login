<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<main class="main">
  <h1>🔐 Simple Login</h1>
  <!-- Login Form -->
  <form method="post" action="/login">
    <div>
      <label>Username:</label>
      <input type="text" name="username" autocomplete="off" required>
    </div>
    <div>
      <label>Password:</label>
      <input type="password" name="password" required>
    </div>
    <div>
      <button type="submit">Login</button>
    </div>
  </form>
</main>

<?= $this->endSection() ?>