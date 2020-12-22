<?php
require_once "autoload.php";

class User
{
    private $ID = "";
    private $username = "";
    private $password = "";
    private $firstname = "";
    private $lastname = "";
    private $email = "";

    public function __construct($row = null)
    {
        if (is_array($row)) {
            // TODO
            // Create a user from an array.
        }
    }

    public function getID()
    {
        // TODO
    }

    public function getUsername()
    {
        // TODO
    }

    public function getPassword()
    {
        // TODO
    }

    public function getName()
    {
        // TODO
        // "Firstname Lastname"
    }

    public function getEmail()
    {
        // TODO
    }

    public function insert($dbh)
    {
        // TODO
        // Insert a new record to the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
    }

    public function update($dbh)
    {
        // TODO
        // Update a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
    }
}
