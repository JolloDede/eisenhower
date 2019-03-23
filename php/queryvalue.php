<?php
  session_start();
  $user = $_SESSION["user"];
  $pw = $_SESSION["pw"];

  $id = $_GET['q'];

  $mysqli = new mysqli('localhost', $user, $pw, 'eh');
  if ($mysqli -> connect_error) {
    exit('Could not connect');
  }

  $sql = "SELECT etime, link, description, importance FROM eisenhower WHERE id = ?";

  $stmt = $mysqli -> prepare($sql);
  $stmt -> bind_param("s", $_GET['q']);
  $stmt -> execute();
  $stmt -> store_result();
  $stmt -> bind_result($time, $link, $description, $importance);
  $stmt -> fetch();
  $stmt -> close();

  echo "
    <table id='queryvalue--table' class='queryvalue--table'>
    <colgroup><col width='100px'><col width='250px'></colgroup>
      <tr>
        <th>Due Date:</th>
        <td>$time</td>
      </tr>
      <tr>
        <th>Überschrift</th>
        <td>$link</td>
      </tr>
      <tr>
        <th>Beschreibung</th>
        <td>$description</td>
      </tr>
    </table>
    <p id='query--delete' class='query--delete' onclick='queryDelete($id)'>Eintrag löschen</p>";

?>
