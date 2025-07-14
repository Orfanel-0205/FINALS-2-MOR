<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
  <div class="container">
    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="flash-error"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif ?>

    <?= form_open('auth/login') ?>
      <?= csrf_field() ?>

      <label for="username">Username</label>
      <input type="text" name="username" id="username" value="<?= esc(old('username')) ?>">

      <label for="password">Password</label>
      <input type="password" name="password" id="password">

      <input type="submit" value="Login">
    <?= form_close() ?>
  </div>
</body>
</html>
