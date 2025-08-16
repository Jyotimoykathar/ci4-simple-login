<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?? 'Simple Auth' ?></title>
  <link rel="stylesheet" href="<?= base_url('css/dark.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
</head>

<body>

  <!-- Show flash messages -->
  <?php if (session()->getFlashdata('error')): ?>
    <div class="message error">
      ❌ <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('message')): ?>
    <div class="message success">
      ✅ <?= session()->getFlashdata('message') ?>
    </div>
  <?php endif; ?>
  <header class="header">
    <h1>🏠 Dashboard</h1>
    <a href="/logout" class="logout-btn">Logout</a>
  </header>

  <!-- Main content area -->
  <main class="main">
    <?= $this->renderSection('content') ?>
  </main>
</body>

</html>