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
    $user = $_SESSION["user"];
    $tmp = new User([$user->getID(), $_POST["username"], md5($_POST["password"]), $_POST["firstname"], $_POST["lastname"], $_POST["email"]]);
    $_SESSION["user"] = $tmp;
    return $tmp->update(connect_to_db());
}

if (doUpdate()) {
    header("Location: home.php");
} else {
    header("Location: user-account-update.php");
}
exit();
