<?php
  session_start();
  $user = $_SESSION["user"];
  $pw = $_SESSION["pw"];
  if (isset($_POST["datetime-local"]) && isset($_POST["link"]) && isset($_POST["description"]) && isset($_POST["importance"])) {
    $date = $_POST["datetime-local"];
    $link = $_POST["link"];
    $desc = $_POST["description"];
    $imp = $_POST["importance"];

    $conn = mysqli_connect('localhost', $user, $pw, 'eh');
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
      die("Connection failed");
    }else{
      $sql = "INSERT INTO eisenhower(id, user, etime, link, description, importance)
      VALUES ('', $user, $date, $link, $desc, $imp)";
      if (mysqli_query($conn, $sql)){
        echo "success";
      }else {
        echo "fail";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }
?>
