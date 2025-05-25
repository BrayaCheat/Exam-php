<?php
  require_once('./db.php');
  if(isset($_GET['id'])){
    $client = $pdo->prepare("SELECT * FROM users where id = :id");
    $client->execute([
      ":id" => $_GET['id']
    ]);
    $user = $client->fetch();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = rand(10000000, 99999999);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $client = $pdo->prepare("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id");
    $client->execute([
      ":username"=>$username,
      ":email"=>$email,
      ":password"=>$passwordHash,
      ":id" => $_GET['id']
    ]);

    header("Location: index.php");
  }
?>

<form method="POST">
  <input type="text" name="username" value="<?= $user['username']?>" placeholder="username" required>
  <input type="email" name="email" value="<?= $user['email']?>" placeholder="example@ex.com" required>
  <input type="password" name="password" value="<?= $user['password']?>" placeholder="*********" required>
  <button type="submit">submit</button>
</form>
