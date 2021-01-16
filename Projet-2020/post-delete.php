<?php
require_once "autoload.php";
require_once "session.php";
include "connect-to-db.php";

$message = "";
if (isset($_SESSION["return value"])) {
    $message = $_SESSION["return value"];
    unset($_SESSION["return value"]);
}


$post_id = $_GET["id"];
$post = new Post(connect_to_db()->query("Select * from post where id='$post_id';")->fetch());

$CAPTION = "Suppression d'une annonce";
require_once "header.phtml";
require_once "post-delete.phtml";
require_once "footer.phtml";