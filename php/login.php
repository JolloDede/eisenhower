<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Hallo</h1>
    <p>  <?php
      if (isset($_POST["uname"]) && isset($_POST["passw"])) {
        $uname = htmlspecialchars($_POST["uname"]);
        $pw = htmlspecialchars($_POST["passw"]);

        $conn = mysqli_connect('localhost', $uname, $pw, 'eh');
        mysqli_set_charset($conn, "utf8");
        if (!$conn){
          die("Wrong Password ");
        }else{
          $sel = "SELECT * FROM `eisenhower`";
          $erg = mysqli_query($conn, $sel);
          if (mysqli_num_rows($erg) > 0){
            echo '<table border="1"\n>';
            while ($line = mysqli_fetch_array($erg, MYSQLI_ASSOC)){
              echo "\t<tr>\n";
              foreach ($line as $value) {
                echo "\t\t<td>$value</td>\n";
              }
              echo "\t</tr>\n";
            }
            echo "</table>\n";
          }
          mysqli_close($conn);
        }
      }
       ?></p>
       <h1>Ende</h1>

  </body>
</html>
