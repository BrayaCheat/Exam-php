<html lang="en">

<head>
  <title>28. Upload image</title>
</head>

<body>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];
    $dir = './uploads';
    $maxSize = 3 * 1024 * 1024; // 3MB in bytes

    if($file['size'] > $maxSize){
      echo "Failed to upload!, file must be below 3MB";
      return;
    }

    if (!is_dir($dir)) {
      mkdir($dir, 0755, true);
    }

    if(move_uploaded_file($file['tmp_name'], $dir . '/' . uniqid() . $file['name'])) {
      echo "Upload success!";
      header("Location: index.php");
    }
  }
  ?>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit" name="upload">upload</button>
  </form>
</body>

</html>