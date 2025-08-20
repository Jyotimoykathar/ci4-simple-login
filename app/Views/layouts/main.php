<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'My App' ?></title>

  <!-- Water.css for minimal base styling -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

  <!-- Custom CSS for additional styling -->
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
  <!-- Header with navigation -->
  <header>
    <nav>
      <h1><a href="/">My App</a></h1>
      <?php if (session()->get('logged_in')): ?>
        <ul>
          <li><a href="/dashboard">Dashboard</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      <?php else: ?>
        <ul>
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li>
        </ul>
      <?php endif; ?>
    </nav>
  </header>

  <!-- Main content area -->
  <main class="<?= isset($pageType) && $pageType === 'dashboard' ? 'dashboard-container' : 'auth-container' ?>">
    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-error">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('message')): ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-error">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
          <div><?= $error ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- Page Content -->
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; <?= date('Y') ?> My App. Built with CodeIgniter 4 & Water.css</p>
  </footer>
</body>

</html>