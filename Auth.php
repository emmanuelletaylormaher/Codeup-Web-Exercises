<?php

require_once "Log.php";

/**
 * A utility class for handling common authorization tasks
 */
class Auth
{
    /** @var string a hash of the string 'password' */
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    public static $username = 'guest';

    /**
     * Attempt to log in
     *
     * A login attempt is successful if the passed username matches the static
     * username property and the passed password is verified against the hash in
     * the static password property
     *
     * On a successful attempt, will set the 'LOGGED_IN_USER' key in the session
     *
     * Will log all attempts using an instance of the Log class
     *
     * @param string $username the username to check
     * @param string $password the password to check
     */
    public static function attempt($username, $password)
    {
        $log = new Log();

        if($username == self::$username){
            if (password_verify($password, self::$password)) {
                $log->info("login attempt successful!");
                $__SESSION["LOGGED_IN_USER"] = $username;
                return true;
            } else {
                $log->info("login attempt not successful.");
             return false;
            }
        }
    }

    /**
     * Check whether the user is logged in or not
     *
     * @return bool whether or not the user is logged in
     */
    public static function check()
    {
        return isset($_SESSION["LOGGED_IN_USER"]);
    }

    /**
     * Get the currently logged in user
     *
     * @return string|null
     */
    public static function user()
    {
        // TODO: return the value associated with the 'LOGGED_IN_USER' key in
        //       the session, or null if it is not set
        if (isset($_SESSION["LOGGED_IN_USER"])) {
            return $__SESSION["LOGGED_IN_USER"];
        } else {
            return null;
        }
    }

    /**
     * Log the user out of the applicaiton by recreating the session
     */
    public static function logout()
    {
        session_unset();
        session_destroy();
        session_regenerate_id();
        session_start();
    }
}
