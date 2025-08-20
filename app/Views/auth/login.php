<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<article>
  <header>
    <h2 class="text-center">Welcome Back</h2>
  </header>

  <?= form_open('/login') ?>
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email"
      name="email"
      id="email"
      placeholder="Enter your email"
      required>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password"
      name="password"
      id="password"
      placeholder="Enter your password"
      required>
  </div>

  <button type="submit" class="btn-primary">Login</button>
  <?= form_close() ?>

  <div class="text-center mt-1">
    <p>Don't have an account? <a href="/register">Register here</a></p>
  </div>
</article>
<?= $this->endSection() ?>