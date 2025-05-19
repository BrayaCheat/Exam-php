<html lang="en">
<head>
  <title>26. Send mail</title>
</head>
<body>

  <?php
    function sendMail($to, $subject, $message, $from){
      if(mail($to, $subject, $message, $from)){
        echo "Mail sent!";
        return;
      }
      echo "Failed";
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $to = $_POST['to'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $from = "From: noreply@example.com";

      sendMail($to, $subject, $message, $from);
      header("Location: index.php");
      die();
    }
  ?>

  <form method="POST">
    <input type="email" name="to" placeholder="To"/>
    <input type="text" name="subject" placeholder="Subject"/>
    <textarea name="message"></textarea>
    <br/>
    <button type="submit">Submit</button>
  </form>
</body>
</html>