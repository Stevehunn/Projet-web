<?php
require_once "autoload.php";

include "connect-to-db.php";

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

function doSignUp()
{
    //TODO
    $bdd = connect_to_db();
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $sql2 = "SELECT username from user where username='$username'";
    if (!$bdd->query($sql2)->rowCount()) {
        $sql = "INSERT INTO user (username, password, firstname, lastname, email) VALUES ('$username', '$password', '$firstname', '$lastname', '$email')";
        if (!$bdd->query($sql)->rowCount()) {
            return false;
        }
        return true;
    }
    // Fin
}


if (!doSignUp()) {
    $_SESSION["return value"] = "Echec de l'inscription, identifiant déjà utilisé. Choisiez un nouvel identifiant. ";
    header("Location: sign-up.php");
    exit();
}
header("Location: index.php");
exit();
