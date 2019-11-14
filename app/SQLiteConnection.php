<?php

namespace App;

class SQLiteConnection
{

    /**
     * PDO object
     */
    public $pdo;

    /**
     * Connects to sqlite database
     *
     * @return     PDO  ( PDO connection object )
     */
    public function connect()
    {
        try
        {
            $this->pdo = new \PDO("sqlite:" . __DIR__.'/'.Config::SQLITE_PATH);
        }
        catch (\PDOException $e)
        {
            echo 'PDO Connection error: '.$e->getMessage();
        }

        return $this->pdo;
    }
}
