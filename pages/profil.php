<?php session_start();
  if (isset($_SESSION["user"])) {
    $login = true;
    $user = $_SESSION["user"];
  } else {
    $login = false;
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="author" content="Dennis & Marcel" />
  <title>MD Projekt</title>
  <link href="../img/MD-Logo.png" rel="Icon">
  <link href="../css/main.css" rel="Stylesheet">
  <script src="../js/main.js"></script>
</head>

<body>
  <header>
    <nav>
      <ul>
        <!-- <li><a href="https://github.com/jollodede" target="_blank">Dennis</a></li>
        <li><a href="https://github.com/thebauzz" target="_blank">Marcel</a></li> -->
        <li><a href="..">Startseite</a></li>
        <li><a href="eisenhower.php">Eisenhower</a></li>
        <li><a href="snake.php">Snake</a></li>
        <?php
          if ($login) {
            echo "<a class='nav--profile' href='pages/profil.php'>$user</a>";
            echo "<a class='nav--logout' href='../php/logout.php'>logout</a>";
          }
         ?>

      </ul>
    </nav>
  </header>
  <main>
    <?php
      $user = $_SESSION["user"];
      echo $user." ";
      $conn = mysqli_connect('localhost', $_SESSION["user"], $_SESSION["pw"], 'eh');
      mysqli_set_charset($conn, "utf8");
      if (!$conn) {
        die("Connection failed");
      }else{
        $sel = "SELECT score FROM snake Where user='$user'";
        $erg = mysqli_query($conn, $sel);
        while($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)){
          echo $line["score"];
        }
      }
     ?>
  </main>
</body>

</html>
