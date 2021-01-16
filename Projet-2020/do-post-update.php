<?php
require_once "autoload.php";
require_once "session.php";

$ID = $_SERVER["QUERY_STRING"];

if (empty($ID)) {
    header("Location: index.php");
    exit();
}

function update_post()
{
    $bdd = connect_to_db();
    $date = date_create();
    $time = date_timestamp_get($date);
    $post = new Post([$_POST["id"], $_SESSION['user'], $time, $_POST["titreannonce"], $_POST["description"], $_POST["photo"]]);
    if ($post->update($bdd)) {
        return true;
    }
    return false;
}

if (!update_post()) {
    $_SESSION["return value"] = "Echec de la modification de l'annonce";
    header("Location: post-update.php");
    exit();
}

header("Location: view.php?$ID");
exit();
