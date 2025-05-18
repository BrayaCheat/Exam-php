<?php
  $host = '127.0.0.1';
  $port = 3311;
  $user = 'root';
  $password = 'root';
  $db = 'exam';
  $dsn = "mysql:host=$host;port=$port;dbname=$db";
  $pdo = new PDO($dsn, $user, $password);
?>
