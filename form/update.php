<?php
  require('./db.php');

  // fetch
  if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = htmlspecialchars($_GET['id']);
    $client = $pdo->prepare("
      SELECT * FROM users
      WHERE id = :id
    ");
    $client->execute([
      ":id" => $id
    ]);
    $user = $client->fetch();
  }

  // update
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client = $pdo->prepare(
        "UPDATE users SET username = :username, email = :email WHERE id = :id"
    );
    $client->execute([
        ':id'       => $_GET['id'],
        ':username' => $_POST['username'],
        ':email'    => $_POST['email'],
    ]);

    header('Location: index.php');
    exit;
}
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