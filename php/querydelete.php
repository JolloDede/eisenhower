<?php
  session_start();
  $user = $_SESSION["user"];
  $pw = $_SESSION["pw"];

  $id = $_GET['q'];

  $mysqli = new mysqli('localhost', $user, $pw, 'eh');
  if ($mysqli -> connect_error) {
    exit('Could not connect');
  }

  $sql = "DELETE FROM eisenhower WHERE id = ?";

  $stmt = $mysqli -> prepare($sql);
  $stmt -> bind_param("s", $_GET['q']);
  $stmt -> execute();
  $stmt -> fetch();
  $stmt -> close();
?>
