<?php
  require_once('./db.php');
  if(isset($_GET['id'])){
    $client = $pdo->prepare("DELETE FROM users where id = :id");
    $client->execute([
      ":id" => $_GET['id']
    ]);
    header("Location: index.php");
  }
?>