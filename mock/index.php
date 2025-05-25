<?php
  session_start();
?>

<html lang="en">
<head>
  <title>Mock Exam</title>
</head>
<body>
  <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      $files = $_FILES['file'];
      // $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
      $path = 'uploads';
      // $maxSize = 2 * 1024 * 1024;
      // $allowed = ['jpg', 'jpeg', 'png'];

      // if(!in_array(strtolower($ext), $allowed)) {
      //   echo "Invalid file extension!";
      //   return;
      // }

      // if($file['size'] > $maxSize) {
      //   echo "File must below 2MB!";
      //   return;
      // }

      if(!is_dir($path)){
        mkdir($path, 0755, true);
      }

      foreach ($files['tmp_name'] as $i => $tmp){
        move_uploaded_file($tmp, $path . '/' . $files['name'][$i]);
      }
    }

    // write files
    $f = fopen("file.txt", "w", true); // filename / mode / exclude path
      for ($i=0; $i<10; $i++) {
        fwrite($f, "Hello World!\n");
      }
      fclose($f);
  ?>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" multiple required>
    <button type="submit">upload</button>
  </form>
</body>
</html>