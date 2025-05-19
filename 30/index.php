<html lang="en">
<head>
  <title>30. Search by name & dob</title>
</head>
<body>
  <?php
    $message = "";
    if(
      $_SERVER['REQUEST_METHOD'] === 'POST' &&
      isset($_POST['name']) &&
      isset($_POST['dob'])
    ){
      $client = $pdo->prepare("SELECT * FROM student WHERE name = :name AND dob = :dob");
      $client->execute([
        ":name" => htmlspecialchars($_POST['name']),
        ":dob" => htmlspecialchars($_POST["dob"])
      ]);
      $student = $client->fetch();
      if($student){
        $message = "Found!";
      }else {
        $message = "Not found!";
      }
    }
  ?>

  <div>
    Student
    <?= $message?>
  </div>
</body>
</html>