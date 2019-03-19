<?php session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: ..");
    $login = false;
  } else {
    $login = true;
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="author" content="Dennis & Marcel" />
  <title>Dennis' & Marcel's Projekt</title>
  <link href="../css/main.css" rel="Stylesheet">
  <script src="../js/main.js"></script>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="https://github.com/jollodede" target="_blank">Dennis</a></li>
        <li><a href="https://github.com/thebauzz" target="_blank">Marcel</a></li>
        <li><a href="..">Startseite</a></li>
        <?php
          if ($login) {
            echo "<a class='nav--logout' href='../php/logout.php'>logout</a>";
          }
         ?>
      </ul>
    </nav>
  </header>
  <main>

    <?php
    $conn = mysqli_connect('localhost', $_SESSION["user"], $_SESSION["pw"], 'eh');
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        die("Connection failed");
    } else {
        $u = $_SESSION["user"];
        $sel = "SELECT * FROM eisenhower where user='$u'";
        $erg = mysqli_query($conn, $sel);
        if (mysqli_num_rows($erg) > 0) {
            ?>

    <div class="eh--container">
      <div class="eh--element wnd">
        <h1>w / nd</h1>

        <div class="eh--content">
          <?php
          while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
              if ($line["importance"] == 1) {
                echo "<p onclick=javascript:void(0)>";
                echo $line["link"];
                echo "</p><br>";
              }
          }
          ?>
        </div>
      </div>

      <div class="eh--element wd">
        <h1>w / d</h1>
        <div class="eh--content">
          <?php
          $erg = mysqli_query($conn, $sel);
          while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
              if ($line["importance"] == 1) {
                echo "<p onclick=javascript:void(0)>";
                echo $line["link"];
                echo "</p><br>";
              }
          }
          ?>
        </div>
      </div>

      <div class="eh--element nwnd">
        <h1>nw / nd</h1>
        <div class="eh--content">
          <?php
          $erg = mysqli_query($conn, $sel);
          while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
              if ($line["importance"] == 0) {
                echo "<p onclick=javascript:void(0)>";
                echo $line["link"];
                echo "</p><br>";
              }
          }
          ?>
        </div>
      </div>

      <div class="eh--element nwd">
        <h1>nw / d</h1>
        <div class="eh--content">
          <?php
          $erg = mysqli_query($conn, $sel);
          while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
              if ($line["importance"] == 0) {
                echo "<p onclick=javascript:void(0)>";
                echo $line["link"];
                echo "</p><br>";
              }
          }
          ?>
        </div>
      </div>
    </div>
    <?php
        }
        mysqli_close($conn);
      }
     ?>

     <p class="newentry--button" onclick="newEntry()">Neuer Eintrag</p>
     <div id="newentry--modal" class="">
       <form action="" method="post">
         <fieldset>
           <input style="font-size: inherit;" name="date" type="date" id="date" placeholder="&nbsp;" required>
           <label class="form--label" for="date">Due Date</label><br>

           <input name="link" type="text" id="link" placeholder="&nbsp;" required>
           <label class="form--label" for="link">Link</label><br>

           <textarea id="description" name="description" placeholder="&nbsp;"></textarea>
           <label class="form--label" for="description">Beschreibung</label><br>

           <label class="checkbox">
             <input name="importance" class="cbox" id="importance" type="checkbox">
             <span class="span"></span>
           </label>
           <label for="importance" class="checkbox--text">Wichtig</label>

           <input type="submit" style="position: absolute; left: -9999px;" tabindex="-1" />
         </fieldset>
       </form>
       <div class="newentry--exit" onclick="newEntryClose()"></div>
     </div>
     <div id="newentry--bg" class="" onclick="newEntryClose()"></div>

  </main>
  <footer>
    <div align="center" class="whatwasused">
      <img class="use1-bild" src="../img/use/HTML.svg">
      <img class="use2-bild" src="../img/use/CSS.svg">
      <img class="use3-bild" src="../img/use/JS.svg">
      <img class="use4-bild" src="../img/use/PHP.svg">
      <img class="use5-bild" src="../img/use/MySQL.svg">
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
