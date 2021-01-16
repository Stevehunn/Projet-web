<?php
require_once "autoload.php";

/**
 * Class Post
 */
class Post
{
    /**
     * @var string
     */
    private $ID = "";
    /**
     * @var string
     */
    private $userID = "";
    /**
     * @var int
     */
    private $timestamp = 0;
    /**
     * @var string
     */
    private $title = "";
    /**
     * @var string
     */
    private $photo = "";
    /**
     * @var string
     */
    private $content = "";
    /**
     * @var string
     */
    private $username = "";

    /**
     * Post constructor.
     * @param null $data
     * @param string $username
     */
    public function __construct($data = null, $username = "")
    {
        if ($data != null && is_array($data)) {
            $this->ID = $data[0];
            $this->userID = $data[1];
            $this->timestamp = $data[2];
            $this->title = $data[3];
            $this->content = $data[4];
            $this->photo = $data[5];
            $this->username = $username;
        }
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return int
     */
    public function getDateTime()
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        $comments = [];
        // TODO
        return $comments;
    }

    /**
     * @param $bdd
     * @return bool
     */
    public function insert($bdd)
    {
        // Insert a new record to the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $sql = "INSERT INTO post (user_id,timestamp,title,content,photo) VALUES ('$this->userID', '$this->timestamp', '$this->title', '$this->content', '$this->photo');";
        if ($bdd->query($sql)->rowCount()) {
            $this->ID = $bdd->query("SELECT ID from post where user_id='$this->userID' AND timestamp='$this->timestamp';")->fetch()[0];
            return true;
        }
        return false;
    }

    /**
     * @param $bdd
     * @return bool
     */
    public function update($bdd)
    {
        // Update a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $sql = "UPDATE post SET timestamp='$this->timestamp', title='$this->title', content='$this->content', photo='$this->photo' WHERE id='$this->ID';";
        if ($bdd->query($sql)->rowCount()) {
            return true;
        }
        return false;
    }

    /**
     * @param $bdd
     * @return bool
     */
    public function delete($bdd)
    {
        // Delete a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $sql = "DELETE FROM post WHERE id='$this->ID';";
        if ($bdd->query($sql)->rowCount()) {
            return true;
        }
        return false;

    }
}
