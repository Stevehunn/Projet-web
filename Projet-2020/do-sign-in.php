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
if (doSignIn()) {
    $_SESSION["last"] = time();
}

header("Location: index.php");
exit();

function doSignIn()
{
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $bdd = connect_to_db();
    $result = $bdd->query($sql);
    if ($result->rowCount()) {
        if ($row = $result->fetch()) {
            $user = new User($row);
            $_SESSION["user"] = $user->getID();
            return true;
        }
    }
    session_destroy();
    return false;
}
