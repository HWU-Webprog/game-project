<?php

namespace App;

use App\SQLiteConnection as SQLiteConnection;

class SQLiteProvision
{
    /**
     * PDO Connection object
     */
    private $db;
    private $pdo;

    /**
     * Constructs a new instance and connects to database
     */
    public function __construct()
    {
        $this->db = new SQLiteConnection();
        $this->pdo = $this->db->connect();
    }

    /**
     * Creates tables
     */
    public function createTables()
    {
        $commands = [
            'CREATE TABLE IF NOT EXISTS users(
                "username" TEXT PRIMARY KEY,
                "name" TEXT,
                "password" TEXT
                "wins" INTEGER,
                "average_pos" REAL
            )',
            'CREATE TABLE IF NOT EXISTS games(
                "id" INTEGER PRIMARY KEY,
                "started" INTEGER,
                "ended" INTEGER
            )',
            'CREATE TABLE IF NOT EXISTS game_results(
                "users.username" TEXT,
                "games.id" INTEGER,
                "kills" INTEGER,
                "finish_pos" INTEGER,
                "killed_by" TEXT,
                PRIMARY KEY ("users.username", "games.id")
            )'
        ];
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }

    /**
     * Inserts test data into created tables
     */
    public function insertTestData()
    {
        // test users
        $this->pdo->exec('INSERT INTO users("username","name","password") VALUES("testUser","Test User",'.password_hash('test', PASSWORD_DEFAULT).')');
        $this->pdo->exec('INSERT INTO users("username","name","password") VALUES("testUser2","Test User2",'.password_hash('test2', PASSWORD_DEFAULT).')');
    }

    /**
     * Drops all data tables from the database
     */
    public function dropTables()
    {
        $this->pdo->exec('DROP TABLE IF EXISTS "users"');
    }

    /**
     * Provisions database up from scratch
     */
    public function up()
    {
        try
        {
            $this->createTables();
            $this->insertTestData();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Deletes all data from the database
     */
    public function down()
    {
        $this->dropTables();
    }
}
