<?php

include "connect-to-db.php";

session_start();
if (!isset($_SESSION["id"])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

function injectInHTML()
{
    $bdd = connect_to_db();
    $my_id = $_SESSION["id"];
    $res = $bdd->query("SELECT * FROM user where id=$my_id;");
    return $res->fetch();
}

require_once "header.phtml";

$my_data = injectInHTML();
require_once "user-account-update.phtml";

require_once "footer.phtml";
