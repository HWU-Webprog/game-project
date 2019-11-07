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
        {
            try
            {
                $this->pdo = new \PDO("sqlite:" . Config::SQLITE_PATH);
            }
            catch (\PDOException $e)
            {
                echo 'PDO Connection error: '.$e->getMessage();
            }
        }
        else
        {
            echo 'No connection object specified';
        }

        return $this->pdo;
    }
}
