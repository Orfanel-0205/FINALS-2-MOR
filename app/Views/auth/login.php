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

    <!-- Flash Error Message -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <!-- Login Form -->
    <?= form_open('/login') ?>
      <?= csrf_field() ?>

      <label for="username">Username</label>
      <input type="text" name="username" id="username" value="<?= esc(old('username')) ?>" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>

      <label>
        <input type="checkbox" name="remember" value="1"> Remember Me
      </label>

      <input type="submit" value="Login">
    <?= form_close() ?>
  </div>
</body>
</html>
