<?php

namespace Auth;

class Game
{
    private $username;
    private $game_id;
    private $kills;
    private $finish_pos;
    private $killed_by;

    public function __construct($username, $game_id, $kills, $finish_pos, $killed_by)
    {
        $this->username = $username;
        $this->game_id = $game_id;
        $this->kills = $kills;
        $this->finish_pos = $finish_pos;
        $this->killed_by = $killed_by;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getGameID()
    {
        return $this->game_id;
    }

    public function getKills()
    {
        return $this->kills;
    }

    public function getFinishPos()
    {
        return $this->finish_pos;
    }

    public function getKilledBy()
    {
        if (!empty($game->killed_by))
            return $game->killed_by;
        else return 'Won!';
    }
}
