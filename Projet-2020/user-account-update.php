<?php

include "connect-to-db.php";

session_start();
if (!isset($_SESSION["id"])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

$user = $_SESSION["user"];

require_once "header.phtml";

require_once "user-account-update.phtml";

require_once "footer.phtml";
