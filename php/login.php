<?php
  session_start();
  $uname = htmlentities($_POST["uname"]);
  $pw = htmlentities($_POST["passw"]);
  if (isset($_POST["uname"]) && isset($_POST["passw"])) {
    $conn = mysqli_connect('localhost', $uname, $pw, 'eh');
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
      $_SESSION["fail"] = "Fail";
      header("location:../index.php");
    } else {
      $_SESSION["user"] = $uname;
      $_SESSION["pw"] = $pw;
      $_SESSION["fail"] = "Success";
      header("location:../index.php");
    }
  }else{
    echo "Geben sie ein Passwort oder ein Usernamen ein";
    session_unset();
    session_destroy();
  }
 ?>
