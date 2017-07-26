
<?php include 'stop.php'; ?>

<h2 class="alert alert-danger">Something went wrong!</h2>
<?php if (!empty($error)) : ?>
<h3 class="alert alert-danger"><?= $error ?></h3>
<?php endif ?>

<?php include 'sbot.php'; ?>
