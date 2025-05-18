<!DOCTYPE html>
<html>

<head>
  <title>Cookie</title>
  <style>
    .red {
      background-color: red;
      color: white;
      padding: 20px;
    }

    .blue {
      background-color: blue;
      color: white;
      padding: 20px;
    }
  </style>
</head>

<body>
  <?php
    setcookie('color', '1', time() + 3, '/');

    $color = '0';
    $class = 'blue';

    if (isset($_COOKIE['color'])) {
      $color = $_COOKIE['color'] ?? '0';
      $class = ($color == '1') ? 'red' : 'blue';
    }

  ?>
  <div class="<?= $class ?>">
    This div is <?= $class ?> because cookie = <?= htmlspecialchars($color) ?>
  </div>
</body>

</html>