<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $file = $_FILES['file'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    if(in_array($ext, ['mp4', 'mp3'])){
      echo "allow";
      return;
    }
    echo "file not allow";
  }
?>

<form method="POST" enctype="multipart/form-data">
  <input type="file" name="file" required>
  <button type="submit">upload</button>
</form>