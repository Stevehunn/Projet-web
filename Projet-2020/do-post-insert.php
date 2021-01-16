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
    // Les 3 lignes ci-dessous sont consacrées à l'image.
    $img_file = $_FILES['fileToUpload']['tmp_name'];
    $imgData = base64_encode(file_get_contents($img_file));
    // Le format ci-dessous est directement reconnu par le navigateur ce qui permet ensuite d'être affiché plus facilement.
    $base64 = 'data:' . mime_content_type($img_file) . ';base64,' . $imgData;
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
