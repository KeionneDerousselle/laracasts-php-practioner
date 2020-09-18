<?php require('partials/head.php');?>
<h1>All Users</h1>

<?php foreach ($users as $user): ?>
<li><?= $user->username; ?>
</li>
<?php endforeach;?>

<h1>Submit Your Name</h1>

<form action="/users" method="POST">
  <input type="text" name="name" id="name">
  <button type="submit" name="submit">Submit</button>
</form>
<?php require('partials/footer.php');
