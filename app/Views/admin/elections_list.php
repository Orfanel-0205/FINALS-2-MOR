<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Manage Elections</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
  <div class="container">
    <h1>All Elections</h1>

    <p><a href="<?= site_url('admin/elections/create') ?>">+ Create New Election</a></p>

    <?php if (empty($elections)): ?>
      <p>No elections found.</p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Start</th>
            <th>End</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($elections as $e): ?>
            <tr>
              <td><?= esc($e['title']) ?></td>
              <td><?= esc($e['start_time']) ?></td>
              <td><?= esc($e['end_time']) ?></td>
              <td><?= esc($e['status']) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>
  </div>
</body>
</html>
