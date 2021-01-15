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
    $date = date_create();
    $bdd = connect_to_db();
    $time = date_timestamp_get($date);
    $title = $_POST["titreannonce"];
    $content = $_POST["description"];
    $imagedata = file_get_contents($_POST["photo"]);    // TODO check
    $base64 = base64_encode($imagedata);
    $id = $_SESSION["id"];
    $sql = "INSERT INTO post (user_id,timestamp,title,content,photo) VALUES ('$id', '$time', '$title', '$content', '$base64')";
    if (!$bdd->query($sql)->rowCount()) {
        return false;
    }
    return true;
}

if (!insert_post()) {
    $_SESSION["return value"] = "Echec de la création de l'annonce";
    header("Location: post-insert.php");
    exit();
}

header("Location: list.php");
exit();
