<?php
  session_start();
  $user = $_SESSION["user"];
  $pw = $_SESSION["pw"];
  if (isset($_POST["date"]) && isset($_POST["link"]) && isset($_POST["description"])) {
    $date = htmlentities($_POST["date"]);
    $link = htmlentities($_POST["link"]);
    $desc = htmlentities($_POST["description"]);
    if (isset($_POST["importance"])) {
      $imp = true;
    } else {
      $imp = false;
    }

    $conn = mysqli_connect('localhost', $user, $pw, 'eh');
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
      die("Connection failed");
    } else {
      $sql = "INSERT INTO eisenhower(id, user, etime, link, description, importance)
      VALUES ('', '$user', '$date', '$link', '$desc', '$imp')";
      if (mysqli_query($conn, $sql)){
        header("Location: ../pages/eisenhower.php");
      } else {
        echo "fail<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }
?>