<?php

require_once "session.php";

$message = "";
if (isset($_SESSION["return value"])) {
    $message = $_SESSION["return value"];
    unset($_SESSION["return value"]);
}
$CAPTION = "Ajout d'une annonce";
require_once "header.phtml";
require_once "post-insert.phtml";
require_once "footer.phtml";