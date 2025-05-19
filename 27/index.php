<html lang="en">
<head>
  <title>27. Prevent SQL Injection</title>
</head>
<body>
  <?php
    require('./db.php'); // => imagine we have db instance
    $client = $db->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
    $client->execute([
      ":username" => $_POST['username'],
      ":email" => $_POST['email'],
      ":password" => $_POST['password'],
    ])
  ?>
</body>
</html>