<?php
require_once "autoload.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

session_start();
session_destroy();

if (doSignIn()) {
    session_start();
    $_SESSION["last"] = time();
}

header("Location: index.php");
exit();

function doSignIn()
{
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // TODO

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $mysqli = new mysqli("localhost", "pws", "pws", "pws");
    if ($result = $mysqli->query($sql)) {
        if ($row = $result->fetch_assoc()) {
            // Session, optionnelle
            session_start();
            foreach ($row as $key => $value) {
                $_SESSION[$key] = $value;
            }
            return true;
        }
    }
    // Fin
    session_destroy();
    return false;
}
