<html lang="en">
<head>
  <title>25. Connecting to db via PDO</title>
</head>
<body>
  <?php
    $pdo = new PDO("mysql:host=127.0.0.1;port=3311", "root", "root");
    $pdo->exec("CREATE DATABASE braya");
    if($pdo){
      echo "connected";
    }
  ?>
  <h1>HI</h1>
</body>
</html>