<?php
  include 'connect.inc.php';
  include 'functions.inc.php';
  $errorlogin = false;
  $permision = "001";

// check if the form is filled in correctly
if ($_POST['firstname'] == "") {
    $errorlogin = true;
} else {
    $firstname = $_POST['firstname'];
}
if ($_POST['lastname'] == "") {
    $errorlogin = true;
} else {
    $lastname = $_POST['lastname'];
}
if ($_POST['email'] == "") {
    $errorlogin = true;
} else {
    $email = $_POST['email'];
}
if ($_POST['password'] == "") {
    $errorlogin = true;
} else {
    $password = $_POST['password'];
}
if ($_POST['Rpassword'] == "") {
    $errorlogin = true;
} else {
    $Rpassword = $_POST['Rpassword'];
}
if ($_POST['gender'] == "") {
    $errorlogin = true;
} else {
    $gender = $_POST['gender'];
}
if ($_POST['day'] == "") {
    $errorlogin = true;
} else {
    $day = $_POST['day'];
}
if ($_POST['month'] == "") {
    $errorlogin = true;
} else {
    $month = $_POST['month'];
}
if ($_POST['year'] == "") {
    $errorlogin = true;
} else {
    $year = $_POST['year'];
}

// make birthday string
  $birthday = "$day" . "," . "$month" . "," . "$year";
  $name = $firstname ." ".$lastname;

  // checks of opgegeven naam al in de databse staat
  // en controllert dan of beide ww's overeen komen
  // en voert hierna de query uit
  connect();
  $nameavailible = userNameCheck($name, $conn);
  if ($nameavailible == true) {
      if ($password == $Rpassword) {
          $password = encrypt($password);
          $sql = "INSERT INTO `gebruiker` (`ID`, `Naam`, `Email`, `Wachtwoord`, `Vrienden`, `Rechten`, `gender`, `Birthday`) VALUES (NULL, '$name', '$email', '$password', '', '$permision', '$gender', '$birthday');";
          mysqli_query($conn, $sql);
      } else {
          errorpass();
      }
  } else {
      usernameError();
  }
  // check for false info
  if ($errorlogin == true) {
      errorlogin();
  }
// Remco de Wilde
