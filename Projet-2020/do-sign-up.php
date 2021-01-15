<?php
require_once "autoload.php";

include "connect-to-db.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

session_start();
session_destroy();

session_start();
if (doSignUp()) {
    $_SESSION["last"] = time();
    header("Location: index.php");
    exit();
} else {
    $_SESSION["return value"] = "Echec de l'inscription, identifiant déjà utilisé. Choisiez un nouvel identifiant. ";
    header("Location: sign-up.php");
    exit();
}

function doSignUp()
{
    $bdd = connect_to_db();
    $username = $_POST["username"];
    $sql2 = "SELECT username from user where username='$username'";
    if (!$bdd->query($sql2)->rowCount()) {
        $user = new User([0, $username, md5($_POST["password"]), $_POST["firstname"], $_POST["lastname"], $_POST["email"]]);
        if ($user->insert($bdd)) {
            $_SESSION["user"] = $user->getID();
            return true;
        }
    }
    return false;
    // Fin
}


