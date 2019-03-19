<?php
  $user = $_SESSION["user"];
  $pw = $_SESSION["pw"]
  if (isset($_POST["datetime-local"]) && isset($_POST["link"]) && isset($_POST["description"]) && isset($_POST["importance"])) {
    $conn = mysqli_connect('localhost', $uname, $pw, 'eh');
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
      die("Connection failed");
    }else{
      $sql = "INSER INTO eisenhower(user, etime, link, description, importance)
      VALUES ($user, $_POST['date'], $_POST['link'], $_POST['description'], $_POST['importance'])";
      if (mysqli_query($conn, $sql)){
        echo "success";
      }else {
        echo "fail";
      }
    }
  }
?>
