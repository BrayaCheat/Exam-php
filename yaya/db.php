<?php
  $pdo = new PDO("mysql:host=127.0.0.1;port=3311;dbname=exam", "root", "root");
  // $pdo->exec("CREATE DATABASE braya"); -> create db via pdo

  // $sql = "
  // CREATE TABLE braya (
  //   id INT AUTO_INCREMENT PRIMARY KEY,
  //   name VARCHAR(50),
  //   email VARCHAR(100),
  //   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  // )";
  // $pdo->exec($sql); -> create tb via pdo
?>