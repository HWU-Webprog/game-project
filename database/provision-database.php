<?php

/**
 * Database provisioning script
 * @author Calum Shepherd
 *
 * GET request this page as follows to run the script:
 *      .../provision-database.php?type=
 *          up      to create tables
 *          down    to delete tables
 */

$db = new SQLite3('database.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

if (isset($_GET['type']))
{
    switch ($_GET['type'])
    {
        case "up":
            try {
                $db->exec('CREATE TABLE IF NOT EXISTS users(
                    "id" INTEGER PRIMARY KEY,
                    "username" TEXT,
                    "name" TEXT,
                    "password" TEXT
                )');
                // insert test user
                $stmt = $db->prepare('INSERT INTO users("username","name","password") VALUES(:username,:name,:password)');
                $user = [
                    'username'  => 'test',
                    'name'      => 'Test User',
                    'password'  => password_hash('password', PASSWORD_DEFAULT)
                ];
                $stmt->bindValue(':username', $user['username']);
                $stmt->bindValue(':name', $user['name']);
                $stmt->bindValue(':password', $user['password']);

                $result = $stmt->execute();
                var_dump($result->fetchArray());
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
            break;

        case "down":
            $db->exec('DROP TABLE IF EXISTS "users"');
            break;

        default:
            echo 'That is not a valid provision type. Try "up" or "down".';
    }
}
else echo 'No provision type set. Append "?type=" and then either "up" or "down" to the page URL';
