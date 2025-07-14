<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Results</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
  <div class="container">
    <h1>Election Results</h1>

    <?php if (empty($candidates)): ?>
      <p>No candidates found.</p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>Candidate</th>
            <th>Votes</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($candidates as $c): ?>
            <tr>
              <td><?= esc($c['name']) ?></td>
              <td><?= esc($counts[$c['id']] ?? 0) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>
  </div>
</body>
</html>
