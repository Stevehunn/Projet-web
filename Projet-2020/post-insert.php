<?php

require_once "session.php";

$message = "";
if (isset($_SESSION["return value"])) {
    $message = $_SESSION["return value"];
    unset($_SESSION["return value"]);
}

require_once "header.phtml";
require_once "post-insert.phtml";
require_once "footer.phtml";