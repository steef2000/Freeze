<?php

  // error functions
  function errorlogin()
  {
      echo "foute invoer";
  }
  function errorpass()
  {
      echo "passwords dont match";
  }
  function usernameError()
  {
      echo "username already in use";
  }
  // einde error functions
  function encrypt($password)
  {
      // encrypt password met sha1 20 character binary format en returnt deze
      // kan ook worden gebruikt voor decrypt
      $password = sha1($password, true);
      return $password;
  }
  function userNameCheck($username, $conn)
  {
      // checkt of username al in gebruik is
      $nameavailible = false;
      $sql = "SELECT * FROM gebruiker WHERE Naam = '$username';";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck == 0) {
          $nameavailible = true;
      }
      return $nameavailible;
  }
 function loginSucces($username, $password)
 {
     $cookieNamePassword = "Password";
     $cookieNameUsername = "Username";
     $password = encrypt($password);
    // set cookie met een encrypted wachtwoord
    setcookie($cookieNamePassword, $password, time()+3600);
     setcookie($cookieNameUsername, $username, time()+3600);
 }
// Remco de Wilde
