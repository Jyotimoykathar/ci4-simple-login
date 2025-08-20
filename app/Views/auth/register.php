<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<article>
  <header>
    <h2 class="text-center">Create Account</h2>
  </header>

  <?= form_open('/register') ?>
  <div class="form-group">
    <label for="name">Full Name</label>
    <input type="text"
      name="name"
      id="name"
      placeholder="Enter your full name"
      required>
  </div>

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
      placeholder="Enter password (min. 6 characters)"
      required>
  </div>

  <div class="form-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password"
      name="confirm_password"
      id="confirm_password"
      placeholder="Confirm your password"
      required>
  </div>

  <button type="submit" class="btn-primary">Create Account</button>
  <?= form_close() ?>

  <div class="text-center mt-1">
    <p>Already have an account? <a href="/login">Login here</a></p>
  </div>
</article>
<?= $this->endSection() ?>