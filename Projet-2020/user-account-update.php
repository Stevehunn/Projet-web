<?php

session_start();
if (!isset($_SESSION["id"])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

function connect_to_db()
{
    //connection base de donnée
    $dsn = "mysql:dbname=pws;host=localhost";
    $username = "pws";
    $password = "pws";
    try {
        $dbh = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        throw $e;
    }
    return $dbh;
}

function injectInHTML()
{
    $bdd = connect_to_db();
    $my_id = $_SESSION["id"];
    $res = $bdd->query("SELECT * FROM user where id=$my_id;");
    return $res->fetch();
}

require_once "header.phtml";

$my_data = injectInHTML();
require_once "user-account-update.phtml";

require_once "footer.phtml";
