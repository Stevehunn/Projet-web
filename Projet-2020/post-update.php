<?php

require_once "session.php";

$message = "";
if (isset($_SESSION["return value"])) {
    $message = $_SESSION["return value"];
}


$post_id = $_GET["post"];
$post = new Post(connect_to_db()->query("Select * from post where id='$post_id';")->fetch());

require_once "header.phtml";
require_once "post-update.phtml";
require_once "footer.phtml";