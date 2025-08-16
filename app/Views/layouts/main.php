<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?? 'Simple Auth' ?></title>
  <link rel="stylesheet" href="<?= base_url('css/dark.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
</head>

<body class="body-login">
  <div>
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

    <!-- header content area -->
    <?= $this->renderSection('header') ?>

    <!-- Main content area -->
    <main class="main">
      <?= $this->renderSection('content') ?>
    </main>
  </div>
</body>

</html>