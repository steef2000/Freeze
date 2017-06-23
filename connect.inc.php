<?php

function connect()
{
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "toor";
    $dbname = "Freeze";
    global $conn;
  // Create connection
  $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
}
// Remco de Wilde
