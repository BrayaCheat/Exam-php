<?php
  require './db.php';
  $id = htmlspecialchars($_GET['id']);
  $client = $pdo->prepare('DELETE FROM users WHERE id = :id');
  $client->execute([
    ":id" => $id
  ]);
  header("Location: index.php");
  exit;
?>

