<?php

namespace Auth;

use \App\SQLiteConnection;
use MyCLabs\Enum\Enum;

/**
 * Enums for defining how to create a new User object
 */
class NewUserStatus extends Enum
{
    const CREATE = 'create';
    const FETCH = 'fetch';
}

/**
 * Class to represent a user from the database
 * @author Calum Shepherd
 */
class User
{
    /**
     * PDO Connection object
     */
    private $db;
    private $pdo;

    /**
     * User properties
     */
    private $username;
    private $name;
    private $password;

    /**
     * Constructor for new user object instance
     *
     * @param $status NewUserStatus - see class above
     * @param $u String username of user
     * @param $n (Optional - for creating ) String name of new user
     * @param $p (Optional - for creating) String password of new user
     * @return New User object instance
     */
    function __construct(String $status, String $u, String $n = null, String $p = null)
    {
        $this->db = new SQLiteConnection();
        $this->pdo = $this->db->connect();

        if ($status === NewUserStatus::FETCH)
        {   // status implies user already exists - try to fetch info from database
            // check that the name and password parameters are empty
            //  (i.e. that information hasn't been passed to the constructor)
            if (empty($n) || empty($p))
            {
                $stmt = $this->pdo->prepare('SELECT * FROM "users" WHERE "username"=:username');
                $stmt->execute([':username' => $u]);
                $data = $stmt->fetch(\PDO::FETCH_ASSOC);
                $stmt->closeCursor();

                // check if the data exists (i.e. user is registered)
                if (!empty($data))
                {
                    $this->username = $u;
                    $this->name = $data['name'];
                    $this->password = $data['password'];
                }
                else // throw exception if user not found
                    throw new \Exception("User " . $u . "not found!");
            }
            else // throw exception for passing name and password but trying to FETCH user
                throw new \Exception("Can't fetch existing user by name or password");
        }
        else if ($status === NewUserStatus::CREATE)
        {   // status implies user needs registered
            // check that the username and password have been passed
            // (i.e. enough information exists to register the user)
            if (empty($n) || empty($p)) // throw exception for not enough data being passed to constructor
                throw new \Exception("Can't create new user without name and password");
            else
            {
                // set local fields and call the register function
                $this->username = $u;
                $this->name = $n;
                $this->password = password_hash($p, PASSWORD_BCRYPT);
                $this->registerNewUser();
            }
        }
    }

    /**
     * Insert current User object into databse
     *
     * @return boolean True if user registered successfully
     * @throws Exception if not enough data in object
     */
    private function registerNewUser()
    {
        if (empty($this->username) || empty($this->name) || empty($this->password))
            throw new Exception("Cannot register user without all parameters!");
        else
        {
            $stmt = $this->pdo->prepare('
                INSERT INTO users("username","name","password","bio")
                VALUES(:username, :name, :password, "")'
            );
            $stmt->execute([
                ':username' => $this->username,
                ':name'     => $this->name,
                ':password' => $this->password
            ]);
            return true;
        }
    }

    /**
     * Method to get the username of the user
     *
     * @return Username as string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Method to check the inputted password against the object field
     *
     * @param $p Inputted password
     * @return Boolean password validity status
     */
    public function checkPassword(String $p)
    {
        if (password_verify($p, $this->password))
            return true;
        else
            echo password_hash($p, PASSWORD_BCRYPT);
            return false;
    }

    /**
     * Method to get the name of the user
     * @return Name as string
     */
    public function getName()
    {
        return $this->name;
    }
}
