<?php
  require_once('./db.php');
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = rand(10000000, 99999999);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $client = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $client->execute([
      ":username"=>$username,
      ":email"=>$email,
      ":password"=>$passwordHash
    ]);
  }
?>

<form method="POST">
  <input type="text" name="username" placeholder="username" required>
  <input type="email" name="email" placeholder="example@ex.com" required>
  <input type="password" name="password" placeholder="*********" required>
  <button type="submit">submit</button>
</form>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Email</th>
      <th>Password</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    <?php
      $client = $pdo->prepare("SELECT * FROM users");
      $client->execute();
      $users = $client->fetchAll();
      foreach($users as $item):
        $id = $item['id'];
        $username = $item['username'];
        $email = $item['email'];
        $password = $item['password'];
    ?>
    <tr>
      <td><?= $id ?></td>
      <td><?= $username ?></td>
      <td><?= $email ?></td>
      <td><?= $password ?></td>
      <td>
        <a href="./update.php?id=<?= $id?>">Update</a>
        <a href="./delete.php?id=<?= $id?>">Delete</a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<style>
  body {
    background-color: #24252a;
    color: whitesmoke;
  }
</style>