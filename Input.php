<?php


class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]);

    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (self::has($key)){
            return $_REQUEST[$key];
        } else {
            return $default;
        }
    }

    public static function getNumeric($key, $default = 0)
    {
        $value = self::get($key, $default);

        if(!is_numeric($value)) {
            return "Value must be numeric!";
        }

        return $value;
    }

    public static function escape($input)
    {
        return htmlspecialchars(strip_tags($input));
    }

    public static function getString ($key)
    {
        $value = self::get($key, $default);

        if(!is_string($value) || is_numeric($value)) {
            throw new Exception ("Value must be a string!");
        } else if (empty($value)) {
            throw new Exception("Cannot be empty");
            
        }

        return $value;
    }

    public static function getNumber ($key)
    {
        $input = self::get($key);
        if (!is_numeric($input)){
            throw new Exception("Must be a number");
        } elseif (empty($input)) {
            threw new Exception("Cannot be empty");
        }
        return input;
    }

    public static function getDate($key){
        $input = self::get($key);
        if (!is_numeric(strtotime($input))) {
            threw new Exception("Must be a valid date");
        } else {
            $date = new DateTime();
            $date->setTimestamp(strtotime($input));
            $date->setTimezone(new DateTimeZone("America/Chicago"));
        }
        return $date;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
