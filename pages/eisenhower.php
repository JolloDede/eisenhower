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
        <?php
          if ($login) {
            echo "<a class='nav--logout' href='../php/logout.php'>logout</a>";
          }
         ?>
         <li><a href="snake.php">Snake</a></li>
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
        $temp = 0; $counter = 0;
        if (mysqli_num_rows($erg) >= 0) {
          while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
            $temp += strtotime($line["etime"]);
            $counter++;
          }
          $average = $temp / $counter;
    ?>

    <div class="eh--container">
      <div class="eh--element wnd">
        <h1>w / nd</h1>

        <div class="eh--content">
          <?php
          $erg = mysqli_query($conn, $sel);
          while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
            if ($line["importance"] == 1) {
              $d1 = strtotime($line["etime"]);
              $d2 = ceil(($d1-time())/60/60/24);
              if ($d1 > $average) {
                echo "<p onclick='getInformations(".$line["id"].")'>".$line["link"]."<strong> - ".$d2." Tage</strong></p><br>";
              }
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
              $d1 = strtotime($line["etime"]);
              $d2 = ceil(($d1-time())/60/60/24);
              if ($d1 <= $average && $d2 >= 0) {
                if ($d2 < 2) { $days = "Tag"; }
                else { $days = "Tage"; }
                echo "<p onclick='getInformations(".$line["id"].")'>".$line["link"]."<strong> - $d2 $days</strong></p><br>";
              }
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
              $d1 = strtotime($line["etime"]);
              $d2 = ceil(($d1-time())/60/60/24);
              if ($d1 > $average) {
                echo "<p onclick='getInformations(".$line["id"].")'>".$line["link"]."<strong> - ".$d2." Tage</strong></p><br>";
              }
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
              $d1 = strtotime($line["etime"]);
              $d2 = ceil(($d1-time())/60/60/24);
              if ($d1 <= $average && $d2 >= 0) {
                if ($d2 < 2) { $days = "Tag"; }
                else { $days = "Tage"; }
                echo "<p onclick='getInformations(".$line["id"].")'>".$line["link"]."<strong> - $d2 $days</strong></p><br>";
              }
            }
          }
          ?>
        </div>
      </div>
    </div>

     <p class="newentry--button" onclick="newEntry()">Neuer Eintrag</p>
     <div id="newentry--form" class="">
       <form action="../php/data.php" method="post">
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

           <input type="submit" class="newentry--button" value="Hinzufügen">
         </fieldset>
       </form>
       <div class="newentry--exit" onclick="newEntryClose()">
         <div class="exit--1"></div>
         <div class="exit--2"></div>
       </div>
     </div>

     <div id="queryvalue--display">
       <div class="newentry--exit" onclick="queryvalueClose()">
         <div class="exit--1"></div>
         <div class="exit--2"></div>
       </div>
     </div>
     <div id="queryvalue--bg" class="" onclick="queryvalueClose()"></div>
     <div id="newentry--bg" class="" onclick="newEntryClose()"></div>

     <?php
     $erg = mysqli_query($conn, $sel);
     while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
       $d1 = strtotime($line["etime"]);
       $d2 = ceil(($d1-time())/60/60/24);
       if ($d2 < 0) {
         if ($d2 < 2) { $days = "Tag"; }
         else { $days = "Tage"; }
         echo "<p onclick='getInformations(".$line["id"].")'>".$line["link"]."<strong> - $d2 $days</strong></p><br>";
       }
     }
   }
   mysqli_close($conn);
 }
     ?>

  </main>
</body>

</html>
