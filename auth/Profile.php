<?php

namespace Auth;

use \App\SQLiteConnection as SQLiteConnection;

class Profile
{
    /**
     * PDO Connection object
     */
    private $db;
    private $pdo;

    public $username;
    public $name;
    public $bio;
    public $wins;
    public $average_pos;

    /**
     * Constructs a new instance and connects to database
     */
    public function __construct($username)
    {
        $this->db = new SQLiteConnection();
        $this->pdo = $this->db->connect();

        $this->username = $username;
        $this->getProfile($this->username);
    }

    /**
     * Gets the profile for the specified user.
     *
     * @param      string  $username  The username
     */
    public function getProfile($username)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM "users" WHERE "username"=:username');
        $stmt->execute([':username' => $username]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $this->name = $data['name'];
        $this->bio = $data['bio'];
        $this->wins = $data['wins'];
        $this->average_pos = $data['average_pos'];
    }

}
