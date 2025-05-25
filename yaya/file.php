<?php
  // $f = fopen("file.txt", "w", true); // filename / mode / exclude path
  // for ($i=0; $i<10; $i++) {
  //   fwrite($f, "Hello World!\n");
  // }
  // fclose($f);

  $f = fopen("braya.txt", "w", true);
  for($i = 0; $i < 10; $i++){
    fwrite($f, "Braya smos\n");
  }
  fclose($f);
?>