<?php
include 'connect.inc.php';
include 'functions.inc.php';
{
    // check of beide invoer velden ingevult zijn.
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = isset($_POST['password']);
        connect();
        $sql = "SELECT * FROM gebruiker WHERE naam = '$username';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck == 0) {
            errorlogin();
            exit();
        } elseif ($resultCheck == 1) {
            // continue
            $row = mysqli_fetch_assoc($result);
            $userPassword = $row['Wachtwoord'];
            $dehash = encrypt($userPassword);
            if ($dehash != $password) {
                errorlogin();
            } else {
                echo "login succes";
                loginSucces($username, $password);
            }
        } else {
            errorlogin();
            exit();
        }
    } else {
        errorlogin();
        exit();
    }
}
// Remco de Wilde
