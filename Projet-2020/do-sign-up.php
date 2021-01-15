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
    $sql2 = "SELECT username from user where username='$username'";
    if (!$bdd->query($sql2)->rowCount()) {
        $user = new User([0, $username, md5($_POST["password"]), $_POST["firstname"], $_POST["lastname"], $_POST["email"]]);
        if ($user->insert($bdd)) {
            $_SESSION["user"] = $user;
            return true;
        }
    }
    return false;
    // Fin
}


if (!doSignUp()) {
    $_SESSION["return value"] = "Echec de l'inscription, identifiant déjà utilisé. Choisiez un nouvel identifiant. ";
    header("Location: sign-up.php");
    exit();
}
header("Location: index.php");
exit();
