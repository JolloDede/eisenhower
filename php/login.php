<?php
if (isset($_POST["uname"]) && isset($_POST["passw"])) {
  $uname = htmlspecialchars($_POST["uname"]);
  $pw = htmlspecialchars($_POST["passw"]);

  $conn = mysqli_connect('localhost', $uname, $pw, 'eh');
  $sel = "SELECT * FROM `eh`";
  if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }else{
    if ($erg = mysqli_query($sql, $sel)) {
      //hier sind die daten als array
    }
  }
}
 ?>
