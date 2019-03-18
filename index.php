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

        <input name="passw" type="text" id="passw" placeholder="&nbsp;" required>
        <label class="form--label" for="passw">Password</label><br>

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
    <div>
      <img class="use-img1" src="" alt="HTML">
      <img class="use-img2" src="" alt="CSS">
      <img class="use-img3" src="" alt="JS">
      <img class="use-img4" src="" alt="PHP">
      <img class="use-img5" src="" alt="MySQL">

      <div class="use-img1">.html</div>
      <div class="use-img2">.css</div>
      <div class="use-img3">.js</div>
      <div class="use-img4">.php</div>
      <div class="use-img5">.sql</div>

    </div>
  </footer>
</body>

</html>
