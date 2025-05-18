<?php
  // fetch
  require('./db.php');
  $id = htmlspecialchars($_GET['id']);
  $client = $pdo->prepare("
    SELECT * FROM users
    WHERE id = :id
  ");
  $client->execute([
    ":id" => $id
  ]);
  $user = $client->fetch();
?>

<form method="POST">
  <label for="username">Username</label>
  <input
    name="username"
    type="text"
    value="<?= $user['username']?>"
    required
  />
  <label for="email">Email</label>
  <input
    name="email"
    type="email"
    value="<?= $user['email']?>"
    required
  />
  <button type="submit" name="update">update</button>
</form>

<?php
  // update
  require('./db.php');

  if(isset($_POST['update'])){
    $id = htmlspecialchars($_GET['id']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $client = $pdo->prepare("
      UPDATE users
      SET username = :username,
      email = :email
      WHERE id = :id
    ");
    $client->execute([
      ":id" => $id,
      ":username" => $username,
      ":email" => $email
    ]);
    header("Location: index.php");
    exit;
  }
?>
