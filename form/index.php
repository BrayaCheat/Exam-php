<html lang="en">
<head>
  <title>Form</title>
</head>

<body>

  <?php
  require('./db.php');
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

  function getGrade($score) {
    if(!is_numeric($score)){
      return $score;
    }
    switch($score){
      case $score < 50:
        return "Failed!";
      case $score >= 51:
        return "E+";
      case $score >= 91:
        return "A+";
      default:
        return "No grade";
    }
  }
  ?>

  <form method="POST">
    <label>username <input type="text" name="username" required></label>
    <label>email <input type="email" name="email" required></label>
    <label>password <input type="password" name="password" required></label>
    <button type="submit" name="create">create user</button>
  </form>

  <table border=1 style="border-collapse: collapse;">
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
          // $username = substr(htmlspecialchars($item['username']), 0, 10);
          $username = getGrade(htmlspecialchars($item['username']));
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