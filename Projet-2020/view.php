<?php
require_once "autoload.php";
require_once "session.php";
include "connect-to-db.php";

$postID = $_SERVER["QUERY_STRING"];

$post = null;
$post_id = $_GET["id"];
$post = new Post(connect_to_db()->query("SELECT * FROM post where id='$post_id';")->fetch());
// $post is an instance of Post retrieved from the database.

$CAPTION = "Annonce";
require_once "header.phtml";
require_once "view.phtml";
require_once "footer.phtml";

$CAPTION = "Modifier mon compte";
require_once "header.phtml";
require_once "user-account-update.phtml";
require_once "footer.phtml";
