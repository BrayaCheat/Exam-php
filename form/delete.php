<?php
  require './db.php';
  if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = htmlspecialchars($_GET['id']);
    $client = $pdo->prepare('DELETE FROM users WHERE id = :id');
    $client->execute([
      ":id" => $id
    ]);
    header("Location: index.php");
    exit;
  }
?>

