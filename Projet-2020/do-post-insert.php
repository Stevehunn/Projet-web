<?php
require_once "autoload.php";
require_once "session.php";

include "connect-to-db.php";

if (!isset($_SESSION["user"])) {
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
    $time = date_timestamp_get(date_create());
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $data = file_get_contents($file_tmp);
    $base64 = base64_encode($data);
    $post = new Post([0, $_SESSION['user'], $time, $_POST["titreannonce"], $_POST["description"], $base64]);
    return $post->insert($bdd);
}

if (!insert_post()) {
    $_SESSION["return value"] = "Echec de la création de l'annonce";
    header("Location: post-insert.php");
    exit();
} else {
    header("Location: list.php");
    exit();
}
