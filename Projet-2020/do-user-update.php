<?php

require_once "autoload.php";
require_once "session.php";
include "connect-to-db.php";

if (!isset($_SESSION["user"])) {
    header("Location: sign-in.php");
    exit();
}

function doUpdate()
{
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