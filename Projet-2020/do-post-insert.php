<?php
require_once "autoload.php";
require_once "session.php";

include "connect-to-db.php";
if (doSignUp()) {
    session_start();
    $_SESSION["last"] = time();
}

if (!isset($_POST["submit"])) {
    header("Location: index.php");
    exit();
}

// TODO
$date = date_create();;
$bdd = connect_to_db();
$session = $_SESSION;
$time = $_POST["date_timestamp_get($date)"];
$title = $_POST["titreannonce"];
$content = $_POST["description"];
$photo = $_POST["photo"];
$sql = "INSERT INTO post (user_id,timestamp,title,content,photo) VALUES ('$session', '$time', '$title', '$content', '$photo')";
if (!$bdd->query($sql)->rowCount()) {
    $messageerreur = "L\'ajout de l\annonce n'a pas réussit à être effectuée";
    echo $messageerreur;
    return false;
}
$message = "L\'annonce a était ajoutée";
echo $message;
return true;

header("Location: list.php");
exit();
