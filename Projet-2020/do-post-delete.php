<?php
require_once "autoload.php";
require_once "session.php";

include "connect-to-db.php";
$ID = $_SERVER["QUERY_STRING"];


if (!isset($_SESSION["id"])) {
    header("Location: sign-in.php");
    exit();
}

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

if (empty($ID)) {
    header("Location: index.php");
    exit();
}

// TODO

if (!insert_post()) {   // TODO
    $_SESSION["return value"] = "Echec de la suppression de l'annonce";
    header("Location: post-delete.php");
    exit();
}

header("Location: list.php");
exit();
