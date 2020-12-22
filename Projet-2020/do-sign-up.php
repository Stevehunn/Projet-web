<?php
require_once "autoload.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

session_start();
session_destroy();

if (doSignUp()) {
    session_start();
    $_SESSION["last"] = time();
}

header("Location: index.php");
exit();

function doSignUp()
{
    //TODO

    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    // Exercice 2
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $sql = "INSERT INTO user (username, password, firstname, lastname, email) VALUES ('$username', '$password', '$firstname', '$lastname', '$email')";
    $mysqli = new mysqli("localhost", "pws", "pws", "pws");
    if (!$mysqli->query($sql)) {
        return false;
    }
    // Fin
    return true;
}
