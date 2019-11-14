<?php

namespace Auth;

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
    private $username;
    private $name;
    private $password;  // TODO: needs salted!!

    /**
     * Constructor for new user object instance
     * @param $u Username
     * @return New User object instance
     */
    function __construct(NewUserStatus $status, String $u, String $n = null, String $p = null)
    {
        if ($status === NewUserStatus::FETCH)
        {
            if ($n === null || $p === null)
            {
                // TODO: Fetch remaining user data from the database
            }
            else
                throw new Exception("Can't fetch existing user by name or password");
        }
        else if ($status === NewUserStatus::CREATE)
        {
            if ($n === null || $p === null)
                throw new Exception("Can't create new user without name and password");
            else
            {
                $this->username = $u;
                $this->name = $n;
                $this->password = password_hash($p, PASSWORD_BCRYPT);
                $this::registerNewUser();
            }
        }
    }

    /**
     * Insert current User object into databse
     */
    public static function registerNewUser()
    {
        // TODO: Insert user data into database
    }

    /**
     * Method to log a user in
     * @param $u Username
     * @param $p Password
     * @return Boolean logged in status
     */
    public static function logIn(String $u, String $p)
    {
        if ($u === $this->getUsername() && $p === $this->password)
        {
            $_SESSION['logged_in'] = true;
            return true;
        }
        else
            return false;
    }

    /**
     * Method to get the username of the user
     * @return Username as string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Method to verify the inputted password against the stored one
     * @param $p Inputted password
     * @return Boolean password validity status
     */
    public function checkPassword(String $p)
    {
        if ($p === $this->password)
            return true;
        else
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
