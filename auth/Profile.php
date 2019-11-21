<?php

namespace Auth;

use \App\SQLiteConnection as SQLiteConnection;
use \Auth\Game as Game;

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
    public $games = [];

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
        $this->games = getGames();
    }

    /**
     * Gets the games the user has played
     *
     * @return     Game[]  The games
     */
    public function getGames()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM "game_results" WHERE "users.username"=:username');
        $stmt->execute([':username' => $this->username]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        $games = [];
        foreach ($data as $game)
            array_push($games, new Game($data[1], $data[2], $data[3], $data[4], $data[5]));
        return $games;
    }

}
