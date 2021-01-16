<?php
require_once "autoload.php";
require_once "session.php";

include "connect-to-db.php";

if (!isset($_SESSION["id"])) {
    header("Location: sign-in.php");
    exit();
}

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

function insert_post()
{
    $bdd = connect_to_db();
    $date = date_create();
    $time = date_timestamp_get($date);
    $post = new Post([0, $_SESSION['user'], $time, $_POST["titreannonce"], $_POST["description"], $_POST["photo"]]);
    if ($post->insert($bdd)) {
        return true;
    }
    return false;
}

if (!insert_post()) {
    $_SESSION["return value"] = "Echec de la création de l'annonce";
    header("Location: post-insert.php");
    exit();
}

header("Location: list.php");
exit();
