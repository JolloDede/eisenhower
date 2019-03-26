<?php session_start();
  if (isset($_SESSION["user"])) {
    $login = true;
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
  <link href="img/MD-Logo.png" rel="Icon">
  <link href="css/main.css" rel="Stylesheet">
  <script src="js/main.js"></script>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="https://github.com/jollodede" target="_blank">Dennis</a></li>
        <li><a href="https://github.com/thebauzz" target="_blank">Marcel</a></li>
        <?php
          if ($login) {
            echo "<li><a href='pages/eisenhower.php'>Eisenhower</a></li>";
            echo "<a class='nav--logout' href='php/logout.php'>logout</a>";
          }
         ?>
         <li><a href="pages/snake.php">Snake</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <?php
      if (!$login) {
        echo
        '<form class="login" action="php/login.php" method="post">
          <fieldset>
            <legend>LOGIN</legend>
            <input name="uname" type="text" id="uname" placeholder="&nbsp;" required autofocus>
            <label class="form--label" for="uname">Username</label><br>

            <div onclick="showPW()" class="form--imgholder">
              <span class="form--pw"></span>
              <img src="img/password-icon.png" rel="Show Password" id="pwicon" class="form--pwicon">
            </div>
            <input name="passw" type="password" id="passw" placeholder="&nbsp;" required>
            <label class="form--label" for="passw">Password</label>
            <br>

            <input type="submit" style="position: absolute; left: -9999px;" tabindex="-1" />
          </fieldset>
        </form>';
      } else {
        echo "<p class='main--welcomeUser'>Willkommen, ".$_SESSION["user"]."</p>";
      }
      if (isset($_SESSION['fail'])) {
        if ($_SESSION['fail'] == "Fail") {
          echo "<p class='login--failed'>Login failed !</p>";
        }
      }
      ?>
  </main>
  <!-- <footer>
    <div align="center" class="whatwasused">
      <img class="use1-bild" src="img/use/HTML.svg">
      <img class="use2-bild" src="img/use/CSS.svg">
      <img class="use3-bild" src="img/use/JS.svg">
      <img class="use4-bild" src="img/use/PHP.svg">
      <img class="use5-bild" src="img/use/MySQL.svg">
      <br>
      <div class="use1-text">.html</div>
      <div class="use2-text">.css</div>
      <div class="use3-text">.js</div>
      <div class="use4-text">.php</div>
      <div class="use5-text">.sql</div>
    </div>
  </footer> -->
</body>

</html>
