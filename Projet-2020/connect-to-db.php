<?php
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
