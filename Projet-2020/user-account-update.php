<?php

require_once "session.php";
require_once "autoload.php";

include "connect-to-db.php";
$CAPTION = "Modifier votre profil.";

if (!isset($_SESSION["user"])) {
    header("Location: sign-in.php");
    exit();
}

$user_id = $_SESSION["user"];
$user = new User(connect_to_db()->query("Select * from user where id='$user_id';")->fetch());

$CAPTION = "Modification du profil";
require_once "header.phtml";
require_once "user-account-update.phtml";
require_once "footer.phtml";
