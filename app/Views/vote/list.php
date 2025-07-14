<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Vote</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
  <div class="container">
    <h1>Ongoing Elections</h1>

    <?php if (session()->getFlashdata('message')): ?>
      <div class="flash-success"><?= esc(session()->getFlashdata('message')) ?></div>
    <?php endif ?>

    <?php if (empty($elections)): ?>
      <p>No elections are currently ongoing.</p>
    <?php else: ?>
      <?php foreach ($elections as $ele): ?>
        <h2><?= esc($ele['title']) ?></h2>
        <form method="post" action="<?= site_url('vote/cast/'.$ele['id']) ?>">
          <?= csrf_field() ?>

          <?php
            $cands = (new \App\Models\CandidateModel())
                      ->where('election_id',$ele['id'])
                      ->findAll();
          ?>
          <?php foreach ($cands as $c): ?>
            <div class="vote-option">
              <label>
                <input type="radio" name="candidate_id" value="<?= esc($c['id']) ?>">
                <?= esc($c['name']) ?>
              </label>
            </div>
          <?php endforeach ?>

          <input type="submit" value="Submit Vote">
        </form>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</body>
</html>
