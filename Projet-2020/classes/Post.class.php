<?php
require_once "autoload.php";

class Post
{
    private $ID = "";
    private $userID = "";
    private $timestamp = 0;
    private $title = "";
    private $photo = "";
    private $content = "";
    private $username = "";

    public function __construct($data = null)
    {
        $this->timestamp = time();
        if (is_array($data)) {
            // TODO
            // Create a post from an array.
        }
    }

    public function getID()
    {
        // TODO
    }

    public function getUserID()
    {
        // TODO
    }

    public function getDateTime()
    {
        // TODO
    }

    public function getTitle()
    {
        // TODO
    }

    public function getContent()
    {
        // TODO
    }

    public function getUsername()
    {
        // TODO
    }

    public function getComments()
    {
        $comments = [];
        // TODO
        return $comments;
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

    public function delete($dbh)
    {
        // TODO
        // Delete a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
    }
}
