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

    public function insert($bdd)
    {
        // Insert a new record to the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $date = date_create();
        $time = date_timestamp_get($date);
        $title = $_POST["titreannonce"];
        $content = $_POST["description"];
        $imagedata = file_get_contents($_POST["photo"]);    // TODO check
        $base64 = base64_encode($imagedata);
        $id = $_SESSION["id"];
        $sql = "INSERT INTO post (user_id,timestamp,title,content,photo) VALUES ('$id', '$time', '$title', '$content', '$base64')";
        if (!$bdd->query($sql)->rowCount()) {
            return false;
        }
        return true;
    }

    public function update($bdd)
    {
        // Update a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $date = date_create();
        $time = date_timestamp_get($date);
        $title = $_POST["titreannonce"];
        $content = $_POST["description"];
        $imagedata = file_get_contents($_POST["photo"]);    // TODO check
        $base64 = base64_encode($imagedata);
        $id = $_SESSION["id"];
        $sql = "UPDATE post SET id='$id', timestamp='$time', title='$title', content='$content', photo='$base64'";
        if (!$bdd->query($sql)->rowCount()) {
            return false;
        }
        return true;
    }

    public function delete($bdd)
    {
        // Delete a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $id_annonce = $_POST["id_annonce"];
        $sql = "DELETE FROM post WHERE id = '$id_annonce'";
        if (!$bdd->query($sql)->rowCount()) {
            return false;
        }
        return true;

    }
}
