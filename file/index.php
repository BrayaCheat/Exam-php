<html lang="en">

<head>
  <title>File upload</title>
</head>

<body>
  <?php
  if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    $dir = './uploads';
    if (!is_dir($dir)) {
      mkdir($dir, 0755, true);
    }
    move_uploaded_file($file['tmp_name'], $dir . '/' . $file['name']);
  }
  ?>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit" name="upload">upload</button>
  </form>
</body>

</html>