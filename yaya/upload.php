<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $files = $_FILES['file'];
    $path = 'uploads';
    if(!is_dir($path)){
      mkdir($path, 0777, true);
    }
    foreach($files['tmp_name'] as $i => $tmp){
      move_uploaded_file($tmp, $path . '/' . $files['name'][$i]);
    }
  }
?>

<form method="POST" enctype="multipart/form-data">
  <input type="file" name="file[]" multiple required>
  <button type="submit">upload</button>
</form>