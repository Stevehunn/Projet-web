<?php
require_once "autoload.php";

/**
 * Class User
 */
class User
{
    /**
     * @var int
     */
    private $ID = "";
    /**
     * @var string
     */
    private $username = "";
    /**
     * @var string
     */
    private $password = "";
    /**
     * @var string
     */
    private $firstname = "";
    /**
     * @var string
     */
    private $lastname = "";
    /**
     * @var string
     */
    private $email = "";

    /**
     * User constructor.
     * @param null $row
     */
    public function __construct($row = null)
    {
        if ($row != null && is_array($row)) {
            // Create a user from an array.
            $this->ID = $row[0];
            $this->username = $row[1];
            $this->password = $row[2];
            $this->firstname = $row[3];
            $this->lastname = $row[4];
            $this->email = $row[5];
        }
    }

    /**
     * @return int
     */
    public function getID()
    {
        return $this->ID;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->firstname . " " . $this->lastname;
        // "Firstname Lastname"
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $bdd
     * @return bool
     */
    public function insert($bdd)
    {
        // Insert a new record to the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.

        $sql = "SELECT * FROM user WHERE username='$this->username'";
        $result = $bdd->query($sql);
        if (!$result->rowCount()) {
            $sql = "INSERT INTO user (username, password, firstname, lastname, email) VALUES ('$this->username', '$this->password', '$this->firstname', '$this->lastname', '$this->email')";
            if ($bdd->query($sql)->rowCount()) {
                $this->ID = $bdd->query("SELECT id FROM user WHERE username='$this->username'")->fetch()[0];
                return true;
            }
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
        $sql = "SELECT * FROM user WHERE username='$this->username'";
        $result = $bdd->query($sql);
        if (!$result->rowCount()) {
            $sql = "UPDATE `user` SET `username`='$this->username',`password`='$this->password',`firstname`='$this->firstname',`lastname`='$this->lastname',`email`='$this->email' WHERE id=$this->ID;";
            if ($bdd->query($sql)->rowCount()) {
                return true;
            }
        }
        return false;
    }
}
