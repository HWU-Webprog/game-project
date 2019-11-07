<?php

namespace App;

class SQLiteConnection
{

    /**
     * PDO object
     */
    protected $pdo;

    /**
     * Connects to sqlite database
     *
     * @return     PDO  ( PDO connection object )
     */
    public function connect()
    {
        if ($this->pdo == null)
            $this->pdo = new \PDO("sqlite:" . Config::SQLITE_PATH);

        return $this->pdo;
    }
}
