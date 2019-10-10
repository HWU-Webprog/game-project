<?php

/**
 * Class to represent a user from the database
 * @author Calum Shepherd
 */
class User
{
    private $username;
    private $name;
    private $password;  // needs salted

    /**
     * Constructor for new user object instance
     * @param $u Username
     * @return New User object instance
     */
    function __construct($u)
    {
        $this->username = $u;
        // TODO: Fetch remaining user data from the database
    }

    /**
     * Method to log a user in
     * @param $u Username
     * @param $p Password
     * @return Boolean logged in status
     */
    public static function logIn($u, $p)
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
    public function checkPassword($p)
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
