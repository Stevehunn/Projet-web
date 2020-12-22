<?php
require_once "autoload.php";
require_once "session.php";

$ID = $_SERVER["QUERY_STRING"];

if (empty($ID)) {
    header("Location: index.php");
    exit();
}

// TODO

header("Location: view.php?$ID");
exit();
