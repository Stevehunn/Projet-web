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
