<?php

namespace Auth;

use \App\SQLiteConnection as SQLiteConnection;
use \Auth\Kill as Kill;

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
    public $kills = [];

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
        $this->kills = $this->getKills();
    }

    /**
     * Gets the kills the user has played
     *
     * @return     Kill[]  The kills
     */
    public function getKills()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM "kill_log" WHERE "killer"=:username');
        $stmt->execute([':username' => $this->username]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        $kills = [];
        if ($data)
        {
            foreach ($data as $kill)
            {
                array_push($kills, new Kill($kill[0], $kill[1], $kill[2]));
            }
            return $kills;
        }
        return null;
    }

    /**
     * Gets the kills where the user is the victim
     *
     * @return     Kill[]  The kills
     */
    public function getDeaths()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM "kill_log" WHERE "victim"=:username LIMIT 10');
        $stmt->execute([':username' => $this->username]);
        $data = $stmt->fetchAll();

        $deaths = [];
        if ($data)
        {
            foreach ($data as $death)
            {
                array_push($deaths, new Kill($death[0], $death[1], $death[2]));
            }
            return $deaths;
        }
        return null;
    }

    /**
     * Gets the number of kills for the profile.
     *
     * @return     int  The number of kills.
     */
    public function getNumKills()
    {
        if ($this->kills)
            return sizeof($this->kills);
        return 0;
    }

}
