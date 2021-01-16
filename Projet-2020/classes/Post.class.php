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
        if ($data != null && is_array($data)) {
            $this->ID = $data[0];
            $this->userID = $data[1];
            $this->timestamp = $data[2];
            $this->title = $data[3];
            $this->content = $data[4];
            $this->photo = $data[5];
        }
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getDateTime()
    {
        return $this->timestamp;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getComments()
    {
        $comments = [];
        // TODO
        return $comments;
    }

    public function insert($bdd)
    {
        // Insert a new record to the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $sql = "INSERT INTO post (user_id,timestamp,title,content,photo) VALUES ('$this->userID', '$this->timestamp', '$this->title', '$this->content', '$this->photo')";
        if ($bdd->query($sql)->rowCount()) {
            $this->ID = $bdd->query("SELECT ID from post where user_id='$this->userID' AND timestamp='$this->timestamp';")->fetch()[0];
            return true;
        }
        return false;
    }

    public function update($bdd)
    {
        // Update a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
            $sql = "UPDATE post SET timestamp='$this->timestamp', title='$this->title', content='$this->content', photo='$this->photo' WHERE id='$this->ID'";
            if ($bdd->query($sql)->rowCount()) {
                return true;
            }
        return false;
    }

    public function delete($bdd)
    {
        // Delete a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
            $sql = "DELETE FROM post WHERE id='$this->ID'";
            if ($bdd->query($sql)->rowCount()) {
                return true;
            }
        return false;

    }
}
