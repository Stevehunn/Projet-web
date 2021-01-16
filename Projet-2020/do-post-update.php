<?php
require_once "autoload.php";
require_once "session.php";
include "connect-to-db.php";

if (!isset($_POST["id"])) {
    $_SESSION["return value"] = "ID n'est pas set.";
    header("Location: post-update.php");
    exit();
}

function update_post()
{
    $bdd = connect_to_db();
    $time = date_timestamp_get(date_create());
    $img_file = $_FILES['fileToUpload']['tmp_name'];
    $imgData = base64_encode(file_get_contents($img_file));
    $base64 = 'data:' . mime_content_type($img_file) . ';base64,' . $imgData;
    $post = new Post([$_POST["id"], $_SESSION['user'], $time, $_POST["titreannonce"], $_POST["description"], $base64]);
    if ($post->update($bdd)) {
        return true;
    }
    return false;
}

if (!update_post()) {
    $_SESSION["return value"] = "Echec de la modification de l'annonce";
    header("Location: post-update.php");
    exit();
} else {
    $post_id = $_POST["id"];
    header("Location: view.php?id=$post_id");
    exit();

}
