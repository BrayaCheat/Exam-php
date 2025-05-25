<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $file = $_FILES['file'];
    $path = 'size';
    $maxSize = 1 * 1024; // 1kb
    if($file['size'] > $maxSize){
      echo "File is too large!";
      return;
    }
    if(!is_dir($path)){
      mkdir($path, 0777, true);
    }
    move_uploaded_file($file['tmp_name'], $path . '/' . $file['name']);
    echo "upload!";
  }
?>

<form method="POST" enctype="multipart/form-data">
  <input type="file" name="file" required>
  <button type="submit">upload</button>
</form>