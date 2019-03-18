<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="author" content="Dennis & Marcel" />
  <title>Dennis' & Marcel's Projekt</title>
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
          if (isset($_SESSION["user"])) {
            echo "<li><a href='pages/eisenhower.php'>Eisen Hower</a></li>";
          }
         ?>
      </ul>
    </nav>
  </header>
  <main>
    <form action="php/login.php" method="post">
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
    </form>
    <?php
    if (isset($_SESSION["user"])) {
        echo "Hallo ". $_SESSION["user"];
    }
     ?>
  </main>
  <footer>
    <h2>Was wurde gebraucht</h2>
    <div align="center" class="whatwasused">
      <img class="use1-bild" src="img/HTML.svg">
      <img class="use2-bild" src="img/CSS.svg">
      <img class="use3-bild" src="img/JS.svg">
      <img class="use4-bild" src="img/PHP.svg">
      <img class="use5-bild" src="img/MySQL.svg">
      <br>
      <div class="use1-text">.html</div>
      <div class="use2-text">.css</div>
      <div class="use3-text">.js</div>
      <div class="use4-text">.php</div>
      <div class="use5-text">.sql</div>
    </div>
  </footer>
</body>

</html>
