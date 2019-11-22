<?php

namespace Auth;

error_reporting(E_ALL);

use \Auth\User;
use \Config;

class Auth
{
    /**
     * Logs the given user in
     *
     * @param      String        $u      Username of user to log in
     * @param      String        $p      Password to attempt to log user in with
     *
     * @return     User|boolean  User object if logged in || false if user not able to be logged in
     */
    public static function logIn($u, $p)
    {
        // check if user already logged in
        $user = Auth::loggedIn();
        if ($user)
            return $user;
        // attempt to fetch user from database
        try
        {
            $user = new User(NewUserStatus::FETCH, $u);
            // if password correct, return user and set logged in data
            if ($user->checkPassword($p))
            {
                $_SESSION['logged_in'] = $u;
                setcookie('logged_in', $u, 0, __DIR__.'/../../', '/');
                return $user;
            }
            else
                return false;
        }
        catch (Exception $e)
        {   // user doesn't exist
            return false;
        }
    }

    /**
     * Checks if a user is currently authenticated
     *
     * @return     User|boolean  User object of logged in user || false if no authenticated user
     */
    public static function loggedIn()
    {
        // check if session variable is set
        if ((isset($_SESSION['logged_in'])))
            return new User(NewUserStatus::FETCH, $SESSION['logged_in']);
        // check if cookie is set
        else if ((isset($_COOKIE['logged_in'])))
            return new User(NewUserStatus::FETCH, $_COOKIE['logged_in']);
        else
            // user is not logged in
            return false;
    }

}
