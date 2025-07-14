<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Election</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
  <div class="container">
    <h1>Create Election</h1>

    <?= form_open('admin/elections/create') ?>
      <?= csrf_field() ?>

      <?php if (isset($validation)): ?>
        <div class="flash-error">
          <?= $validation->listErrors() ?>
        </div>
      <?php endif ?>

      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="<?= esc(old('title')) ?>">

      <label for="description">Description</label>
      <textarea name="description" id="description"><?= esc(old('description')) ?></textarea>

      <label for="start_time">Start Time</label>
      <input type="datetime-local" name="start_time" id="start_time" value="<?= esc(old('start_time')) ?>">

      <label for="end_time">End Time</label>
      <input type="datetime-local" name="end_time" id="end_time" value="<?= esc(old('end_time')) ?>">

      <label for="status">Status</label>
      <select name="status" id="status">
        <?php foreach (['scheduled','ongoing','completed'] as $status): ?>
          <option value="<?= $status ?>" <?= old('status')===$status ? 'selected' : '' ?>>
            <?= ucfirst($status) ?>
          </option>
        <?php endforeach ?>
      </select>

      <input type="submit" value="Create">
    <?= form_close() ?>
  </div>
</body>
</html>
