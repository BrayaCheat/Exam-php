<html lang="en">

<head>
  <title>Form</title>
  <style>
    body,
    * {
      font-size: 14px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      max-width: 300px;
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 10px;
    }
  </style>
</head>

<body>

  <?php
  require('./db.php');
  if (isset($_POST['create'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $client = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $res = $client->execute([
      ':username' => $username,
      ':email' => $email,
      ':password' => $password
    ]);
    if ($res) {
      header("Location: index.php");
      exit;
    }
  }
  ?>

  <form method="POST">
    <label>username <input type="text" name="username" required></label>
    <label>email <input type="email" name="email" required></label>
    <label>password <input type="password" name="password" required></label>
    <button type="submit" name="create">create user</button>
  </form>

  <table>
    <caption>User Table</caption>
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
      require './db.php';
      $client = $pdo->prepare("SELECT * FROM users");
      $client->execute();
      $users = $client->fetchAll();

      foreach ($users as $item):
        $id = htmlspecialchars($item['id']);
        $username = substr(htmlspecialchars($item['username']), 0, 10);
        $email = htmlspecialchars($item['email']);
        $password = substr(htmlspecialchars($item['password']), 0, 10);
      ?>

        <tr>
          <td><?= $id ?></td>
          <td><?= $username ?></td>
          <td><?= $email ?></td>
          <td><?= $password ?></td>
          <td style="display: flex; gap: 30px;">
            <a href="./update.php?id=<?= $id ?>">update</a>
            <a href="./delete.php?id=<?= $id ?>">delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>