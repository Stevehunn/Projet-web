<?php
$CAPTION = "Liste des Annonces";
require_once "autoload.php";
require_once "session.php";

include "connect-to-db.php";

function isOwner($post)
{
    if ($post->getID() == $_SESSION["user"]) {
        return true;
    } else {
        return false;
    }
    // Return true if user is the owner of the $post
}

$posts = [];
$results = connect_to_db()->query("SElect * from post;")->fetchAll();
foreach ($results as $item) {
    $post = new Post($item);
    if ($post != null) {
        array_push($posts, $post);
    }
}
// $posts is an array of Post instances retrieved from the database

$CAPTION = "Liste des annonces";
require_once "header.phtml";
require_once "list.phtml";
require_once "footer.phtml";
