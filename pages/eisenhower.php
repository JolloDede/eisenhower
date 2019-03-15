<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="author" content="Dennis & Marcel" />
  <title>Dennis' & Marcel's Projekt</title>
  <link href="../css/main.css" rel="Stylesheet">
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="https://github.com/jollodede" target="_blank">Dennis</a></li>
        <li><a href="https://github.com/thebauzz" target="_blank">Marcel</a></li>
        <?php
          echo "<li><a href='pages/eisenhower.php' target='_blank'>Eisen Hower</a></li>"
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
    }else {
      $u = $_SESSION["user"];
     ?>

    <div class="eh--container">
      <div class="eh--element wnd">
        <h1>w / nd</h1>

        <div class="eh--content">
          <p>1.content</p>
          <?php
            $sel = "SELECT * FROM eisenhower where user='$u'";
            $erg = mysqli_query($conn, $sel);
            if (mysqli_num_rows($erg) > 0) {
              while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)) {
                foreach ($line as $value) {
                  echo "$value";
                }
              }
            }
           ?>
        </div>
      </div>

      <div class="eh--element wd">
        <h1>w / d</h1>
        <div class="eh--content">
          <p>1.content</p>
          <p>2.content</p>
        </div>
      </div>

      <div class="eh--element nwnd">
        <h1>nw / nd</h1>
        <div class="eh--content">
          <p>1.content</p>
          <p>2.content</p>
          <p>3.content</p>
          <p>4.content</p>
          <p>5.content</p>
          <p>1.content</p>
          <p>2.content</p>
          <p>3.content</p>
          <p>4.content</p>
          <p>5.content</p>
          <p>1.content</p>
          <p>2.content</p>
          <p>3.content</p>
          <p>4.content</p>
          <p>5.content</p>
        </div>
      </div>

      <div class="eh--element nwd">
        <h1>nw / d</h1>
        <div class="eh--content">
          <p></p>
        </div>
      </div>
    </div>
    <?php
    mysqli_close($conn);
    }

     ?>
  </main>
  <footer></footer>
</body>

</html>
