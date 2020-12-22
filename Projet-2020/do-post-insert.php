<?php
require_once "autoload.php";
require_once "session.php";

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

// TODO

header("Location: list.php");
exit();
