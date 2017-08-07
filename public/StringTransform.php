<?php

class StringTransform
{
	public static $stringTest = "test";


	public static function isLetter($character)
	{
		return ctype_alpha($str);

	}


	public static function secondCharCap($string)
	{
		if (is_string($string)) {
			if (isLetter($string[1]) && ctype_lower($string[1]) ) {
				strtolower($string[1]);
				return $string;
			} else {
				return $string;
			}
		} else {
			echo "Please enter a string.".PHP_EOL;
		}

	}

}

