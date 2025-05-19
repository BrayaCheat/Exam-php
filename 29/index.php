<html lang="en">
<head>
  <title>29. </title>
</head>
<body>
  <?php
    // 1. connect to db
    $pdo = new PDO("mysql:host=127.0.0.1;port=3311;dbname=mydatabase", "root", "123");

    // 2. insert data
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $name = htmlspecialchars($_POST['name']);
      $gender = htmlspecialchars($_POST['gender']);
      $email = htmlspecialchars($_POST['email']);
      $phone = htmlspecialchars($_POST['phone']);
      $password = rand(10000000, 99999999);

      $client = $pdo->prepare("
        INSERT INTO
        users (name, gender, email, phone, password)
        VALUES (:name, :gender, :email, :phone, :password)
      ");
      $client->execute([
        ":name" => $name,
        ":gender" => $gender,
        ":email" => $email,
        ":phone" => $phone,
        ":password" => $password
      ]);
      header("Location: index.php");
      exit;
    }
  ?>
</body>
</html>