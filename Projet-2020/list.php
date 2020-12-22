<?php
$CAPTION = "Liste des Annonces";
require_once "autoload.php";
require_once "session.php";

function isOwner($post)
{
    // TODO
    // Return true if user is the owner of the $post
}

$posts = [];
// TODO
// $posts is an array of Post instances retrieved from the database

$CAPTION = "Liste des annonces";
require_once "header.phtml";
require_once "list.phtml";
require_once "footer.phtml";
