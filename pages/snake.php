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
            echo "<a class='nav--profile' href='profil.php'>$user</a>";
            echo "<a class='nav--logout' href='../php/logout.php'>logout</a>";
          }
         ?>
      </ul>
    </nav>
  </header>
  <main>
    <div align="center">
      <canvas id="snake" width="608px" height="608px"></canvas>
      <script src="../js/snake.js"></script>
    </div>
    <div id="snake--display">
      <p class="snake--button" onclick="restart()">Neustarten</p>
    </div>
  </main>
</body>

</html>
