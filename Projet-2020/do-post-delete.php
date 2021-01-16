<?php
require_once "autoload.php";
require_once "session.php";

include "connect-to-db.php";
$ID = $_SERVER["QUERY_STRING"];


if (!isset($_SESSION["user"])) {
    header("Location: sign-in.php");
    exit();
}

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

/*if (empty($ID)) {
    header("Location: index.php");
    exit();
}*/

function delete_post()
{
    $bdd = connect_to_db();
    $post_id = $_POST["post"];
    $post = new Post(connect_to_db()->query("Select * from post where id='$post_id';")->fetch());
    return $post->delete($bdd);
}

if (!delete_post()) {
    $_SESSION["return value"] = "Echec de la suppression de l'annonce";
    header("Location: post-delete.php");
    exit();
}

header("Location: list.php");
exit();
